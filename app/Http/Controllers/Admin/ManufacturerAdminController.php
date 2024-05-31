<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products\Manufacturers;
use App\Models\Products\Products;
use Illuminate\Http\Request;

class ManufacturerAdminController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturers::with('products')->get();
        return view('admin.manufacturer.list', compact('manufacturers'));
    }

    public function delete($id)
    {
        $manufacturer = Manufacturers::where('id', $id)->first();
        Products::where('manufacturer_id', $manufacturer->id)->update(['manufacturer_id' => null]);
        $manufacturer->delete();
        return redirect()->back();
    }

    public function add()
    {
        return view('admin.manufacturer.add');
    }
}
