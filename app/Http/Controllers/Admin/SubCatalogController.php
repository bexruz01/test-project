<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCatalogRequest;
use App\Models\Catalog;
use App\Models\SubCatalog;
use Illuminate\Support\Facades\Storage;

class SubCatalogController extends Controller
{

    public function index()
    {
        $sub_catalogs = SubCatalog::paginate(10);
        return view('auth.sub_catalogs.index', compact('sub_catalogs'));
    }


    public function create()
    {
        $catalogs = Catalog::get();
        return view('auth.sub_catalogs.form', compact('catalogs'));
    }


    public function store(SubCatalogRequest $request)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('sub_catalogs');
        }
        SubCatalog::create($params);
        return redirect()->route('sub_catalogs.index');
    }


    public function show(SubCatalog $sub_catalog)
    {
        return view('auth.sub_catalogs.show', compact('sub_catalog'));
    }


    public function edit(SubCatalog $sub_catalog)
    {
        $catalogs = Catalog::get();
        return view('auth.sub_catalogs.form', compact('sub_catalog', 'catalogs'));
    }


    public function update(SubCatalogRequest $request, SubCatalog $sub_catalog)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($sub_catalog->image);
            $params['image'] = $request->file('image')->store('sub_catalogs');
        }

        $sub_catalog->update($params);
        return redirect()->route('sub_catalogs.index');
    }


    public function destroy(SubCatalog $sub_catalog)
    {
        $sub_catalog->delete();
        return redirect()->route('sub_catalogs.index');
    }
}
