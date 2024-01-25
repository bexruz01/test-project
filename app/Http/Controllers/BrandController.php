<?php

namespace App\Http\Controllers;

use App\Models\Brand;


class BrandController extends Controller
{
    public function index(){
        $brands = Brand::paginate(5);
        return view('brands', compact('brands'));
    }

    public function brand($code){
        $brand_products = Brand::where('code', $code)->first();
        return view('brand', compact('brand_products'));
    }
}
