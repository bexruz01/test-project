@extends('auth.layouts.master')

@section('title', 'Catalog')

@section('content')
    <div class="col-md-12">
        <h1>Catalog</h1>
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
            @foreach($catalogs as $catalog)
                <tr>
                    <td>{{ $catalog->id }}</td>
                    <td>{{ $catalog->code }}</td>
                    <td>{{ $catalog->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('catalogs.destroy', $catalog) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('catalogs.show', $catalog) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('catalogs.edit', $catalog) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $catalogs->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('catalogs.create') }}">Добавить Catalog</a>
    </div>
@endsection
