@extends('auth.layouts.master')

@section('title', 'Catalog ' . $catalog->name)

@section('content')
    <div class="col-md-12">
        <h1>SubCatalog {{ $catalog->name }}</h1>
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
                <td>{{ $catalog->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $catalog->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $catalog->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $catalog->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img style="height=240px" src="{{ Storage::url($catalog->image) }}"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
