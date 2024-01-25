<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\SubCatalog;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);
        return view('auth.categories.index', compact('categories'));
    }


    public function create()
    {
        $sub_catalogs = SubCatalog::get();
        return view('auth.categories.form', compact('sub_catalogs'));
    }


    public function store(CategoryRequest $request)
    {

        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('categories');
        }
        Category::create($params);
        return redirect()->route('categories.index');
    }


    public function show(Category $category)
    {
        return view('auth.categories.show', compact('category'));
    }


    public function edit(Category $category)
    {
        $sub_catalogs = SubCatalog::get();
        return view('auth.categories.form', compact('category','sub_catalogs'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($category->image);
            $params['image'] = $request->file('image')->store('categories');
        }

        $category->update($params);
        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
