<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function AllBrand()
    {
      $brands = Brand::latest()->paginate(5);
      return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
      $validatedData = $request->validate([
        'brand_name' => 'required|unique:brands|min:4',
        'brand_image' => 'required|mimes:jpg,jpeg,png',
      ],
      [
        'brand_name.required' => 'Please Input Brand Name',
        'brand_name.min' => 'Brand Name not Less than 4 Charachters',
      ]);

      $brand_image = $request->file('brand_image');
    }
}
