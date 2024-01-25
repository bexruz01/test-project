@extends('auth.layouts.master')

@section('title', 'Brands')

@section('content')
    <div class="col-md-12">
        <h1>Категории</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($product_brands as $product_brand)
                <tr>
                    <td>{{ $product_brand->id }}</td>
                    <td>{{ $product_brand->code }}</td>
                    <td>{{ $product_brand->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('product_brands.destroy', $product_brand) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('product_brands.show', $product_brand) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('product_brands.edit', $product_brand) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $product_brands->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('product_brands.create') }}">Добавить категорию</a>
    </div>
@endsection
