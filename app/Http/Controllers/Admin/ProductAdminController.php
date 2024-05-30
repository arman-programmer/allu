<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Products\Category;
use App\Models\Products\Countries;
use App\Models\Products\Manufacturers;
use App\Models\Products\ProductDetail;
use App\Models\Products\ProductImages;
use App\Models\Products\ProductReviews;
use App\Models\Products\Products;
use App\Models\Products\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{
    public function products()
    {
        $products = Products::with(['Category', 'images'])->paginate(20);
        return view('admin.products', compact('products'));
    }

    public function add()
    {
        $cities = City::all();
        $countries = Countries::all();
        $manufacturers = Manufacturers::all();
        $categories = Category::all();
        return view('admin.product.add', compact(
            'cities',
            'countries',
            'manufacturers',
            'categories'

        ));
    }

    public function edit($id)
    {
        $product = Products::where('id', $id)->with(['category', 'size', 'details', 'images'])->first();
        $categories = Category::all();
        $cities = City::all();
        $countries = Countries::all();
        $manufacturers = Manufacturers::all();
        return view('admin.product.edit', compact(
            'product',
            'categories',
            'cities',
            'countries',
            'manufacturers'
        ));
    }

    public function editSave(Request $request, $id)
    {
        if ($id == "new") {
            $product = new Products();
        } else {
            $product = Products::where('id', $id)->first();
        }
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category');
        $product->country_id = $request->input('country');
        $product->city_id = $request->input('city');
        $product->thumb = $request->input('thumb_id');
        $product->manufacturer_id = $request->input('manufacturer');
        $product->status = $request->input('status');
        $product->save();


        $attributes = [];

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'attr') === 0) {
                $attributeName = $value;
                $attributeValueKey = str_replace('attr', 'val', $key);
                $attributeValue = $request->input($attributeValueKey);
                if ($attributeName !== null && $attributeValue !== null) {
                    $attributes[$attributeName] = $attributeValue;
                }
            }
        }

        foreach ($attributes as $attributeName => $attributeValue) {
            $existingAttribute = ProductDetail::where('product_id', $product->id)
                ->where('name', $attributeName)
                ->where('value', $attributeValue)
                ->first();

            if ($existingAttribute) {
                continue;
            }

            $productAttribute = new ProductDetail();
            $productAttribute->product_id = $product->id;
            $productAttribute->name = $attributeName;
            $productAttribute->value = $attributeValue;
            $productAttribute->save();
        }


        $size = ProductSize::where('product_id', $product->id)->first();
        if (!$size) {
            $size = new ProductSize();
            $size->product_id = $product->id;
        }
        $size->length = $request->input('length');
        $size->width = $request->input('width');
        $size->height = $request->input('height');
        $size->weight = $request->input('weight');
        $size->save();


        $requestData = $request->all();

        $maxCount = ProductImages::where('product_id', $product->id)->max('count');
        $count = ($maxCount !== null) ? $maxCount + 1 : 1;
        foreach ($requestData as $key => $value) {
            if (strpos($key, 'image-') === 0) {
                // Получение ссылки на изображение
                $imageLink = $value;

                // Проверка наличия изображения в базе данных
                $existingImage = ProductImages::where('product_id', $product->id)
                    ->where('link', $imageLink)
                    ->first();

                // Если изображение уже существует, переход к следующему
                if ($existingImage) {
                    continue;
                }

                // Создание новой записи для изображения
                $productImage = new ProductImages();
                $productImage->product_id = $product->id;
                $productImage->link = $imageLink;
                $productImage->count = $count++; // увеличение счетчика и его присвоение
                $productImage->save();
            }
        }

        return redirect()->route('admin.products');
    }

    public function on($id)
    {
        $product = Products::find($id);
        $product->status = 1;
        $product->save();
        return redirect()->back();
    }

    public function off($id)
    {
        $product = Products::find($id);
        $product->status = 0;
        $product->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $product = Products::find($id);
        $product->delete();
        $images = ProductImages::where('product_id', $id)->get();
        if ($images) {
            foreach ($images as $image) {
                $image->delete();
            }
        }
        $details = ProductDetail::where('product_id', $id)->get();
        if ($details) {
            foreach ($details as $detail) {
                $detail->delete();
            }
        }
        $reviews = ProductReviews::where('product_id', $id)->get();
        if ($reviews) {
            foreach ($reviews as $review) {
                $review->delete();
            }
        }
        $sizes = ProductSize::where('product_id', $id)->get();
        if ($sizes) {
            foreach ($sizes as $size) {
                $size->delete();
            }
        }
        return redirect()->back()->with('success', 'Продукт успешно удален');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($request->file()) {
            $file = $request->file('file');
            $fileHash = md5_file($file->getPathname());
            $fileName = $fileHash . '.' . $file->getClientOriginalExtension();
            $filePath = 'public/productImages/' . $fileName;

            if (Storage::exists($filePath)) {
                $url = Storage::url($filePath);
                return response()->json(['success' => 'File already exists', 'file' => $url]);
            } else {
                $file->storeAs('public/productImages', $fileName);
                $url = Storage::url($filePath);
                return response()->json(['success' => 'File uploaded successfully', 'file' => $url]);
            }
        }
        return response()->json(['error' => 'File not uploaded'], 400);
    }
}
