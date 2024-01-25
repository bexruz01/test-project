@extends('auth.layouts.master')

@section('title', 'Brand ' . $product_brand->name)

@section('content')
    <div class="col-md-12">
        <h1>Brand {{ $product_brand->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product_brand->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $product_brand->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product_brand->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product_brand->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img style="height=240px" src="{{ Storage::url($product_brand->image) }}"></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{ $product_brand->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
