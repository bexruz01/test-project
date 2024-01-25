@extends('auth.layouts.master')

@section('title', 'SubCatalog ' . $sub_catalog->name)

@section('content')
    <div class="col-md-12">
        <h1>SubCatalog {{ $sub_catalog->name }}</h1>
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
                <td>{{ $sub_catalog->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $sub_catalog->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $sub_catalog->name }}</td>
            </tr>
            <tr>
                <td>Catalog</td>
                <td>{{ $sub_catalog->catalog->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $sub_catalog->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img style="height=240px" src="{{ Storage::url($sub_catalog->image) }}"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
