<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class ProductBrandController extends Controller
{

    public function index()
    {
        $product_brands = Brand::paginate(10);
        return view('auth.product_brands.index', compact('product_brands'));
    }


    public function create()
    {
        return view('auth.product_brands.form');
    }


    public function store(ProductBrandRequest $request)
    {

        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('product_brands');
        }
        Brand::create($params);
        return redirect()->route('product_brands.index');
    }


    public function show(Brand $brand)
    {
        return view('auth.product_brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('auth.product_brands.form');
    }


    public function update(ProductBrandRequest $request, Brand $brand)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($brand->image);
            $params['image'] = $request->file('image')->store('product_brands');
        }

        $brand->update($params);
        return redirect()->route('product_brands.index');
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('product_brands.index');
    }
}
