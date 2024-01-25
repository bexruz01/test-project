<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatalogRequest;
use App\Models\Catalog;

use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{

    public function index()
    {
        $catalogs = Catalog::paginate(10);
        return view('auth.catalogs.index', compact('catalogs'));
    }


    public function create()
    {
        return view('auth.catalogs.form');
    }


    public function store(CatalogRequest $request)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('catalogs');
        }
        Catalog::create($params);
        return redirect()->route('catalogs.index');
    }


    public function show(Catalog $catalog)
    {
        return view('auth.catalogs.show', compact('catalog'));
    }


    public function edit(Catalog $catalog)
    {
        return view('auth.catalogs.form', compact('catalog'));
    }


    public function update(CatalogRequest $request, Catalog $catalog)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($catalog->image);
            $params['image'] = $request->file('image')->store('catalogs');
        }
        $catalog->update($params);
        return redirect()->route('catalogs.index');
    }


    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return redirect()->route('catalogs.index');
    }
}
