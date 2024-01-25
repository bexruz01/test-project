<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;

class PropertyController extends Controller
{

    public function index()
    {
        $properties = Property::paginate(10);
        return view('auth.properties.index', compact('properties'));
    }


    public function create()
    {
        return view('auth.properties.form');
    }


    public function store(PropertyRequest $request)
    {
        Property::create($request->all());
        return redirect()->route('properties.index');
    }


    public function show(Property $property)
    {
        return view('auth.properties.show', compact('property'));
    }


    public function edit(Property $property)
    {
        return view('auth.properties.form', compact('property'));
    }


    public function update(PropertyRequest $request, Property $property)
    {
        
        $property->update($request->all());
        return redirect()->route('properties.index');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index');
    }
}
