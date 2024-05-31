<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products\Countries;
use App\Models\Products\Products;
use Illuminate\Http\Request;

class CountryAdminController extends Controller
{
    public function countries()
    {
        $countries = Countries::with('products')->get();
        return view('admin.country.list', compact('countries'));
    }

    public function countryDelete($id)
    {
        $country = Countries::where('id', $id)->first();
        Products::where('country_id', $country->id)->update(['country_id' => null]);
        $country->delete();
        return redirect()->back();
    }
}
