@extends('auth.layouts.master')

@section('title', 'SubCatalog')

@section('content')
    <div class="col-md-12">
        <h1>SubCatalog</h1>
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
                    Catalog
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($sub_catalogs as $sub_catalog)
                <tr>
                    <td>{{ $sub_catalog->id }}</td>
                    <td>{{ $sub_catalog->code }}</td>
                    <td>{{ $sub_catalog->name }}</td>
                    <td>{{ $sub_catalog->catalog->name ?? null }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('sub_catalogs.destroy', $sub_catalog) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('sub_catalogs.show', $sub_catalog) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('sub_catalogs.edit', $sub_catalog) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $sub_catalogs->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('sub_catalogs.create') }}">Добавить категорию</a>
    </div>
@endsection
