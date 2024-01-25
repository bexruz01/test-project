<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Sku;
use App\Models\SubCatalog;


class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
        $skusQuery = Sku::with(['product', 'product.category']);

        if ($request->filled('price_from')) {
            $skusQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $skusQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $skusQuery->whereHas('product', function ($query) use ($field) {
                    $query->$field();
                });
            }
        }

        $skus = $skusQuery->paginate(15)->withPath("?" . $request->getQueryString());


        return view('index', compact('skus'));
    }


    public function categories($code = 'mobiles')
    {
        $rel_category = Category::where('code', $code)->first();
        $subCatalogs = SubCatalog::with(['categories'])->get();
        $catalogs = Catalog::with(['subCatalogs'])->get();
        return view('categories', compact('rel_category', 'subCatalogs','catalogs'));
    }

    public function category($code)
    {
        $rel_category = Category::where('code', $code)->first();
        $subCatalogs = SubCatalog::with(['categories'])->get();
        $catalogs = Catalog::with(['subCatalogs'])->get();
        return view('categories', compact('rel_category', 'subCatalogs','catalogs'));
    }

    public function sku($categoryCode, $productCode, Sku $skus)
    {
        if ($skus->product->code != $productCode) {
            abort(404, 'Product not found');
        }

        if ($skus->product->category->code != $categoryCode) {
            abort(404, 'Category not found');
        }

        return view('product', compact('skus'));
    }

}
