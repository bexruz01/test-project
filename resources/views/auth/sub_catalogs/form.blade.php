@extends('auth.layouts.master')

@isset($sub_catalog)
    @section('title', 'Редактировать SubCatalog ' . $sub_catalog->name)
@else
@section('title', 'Создать SubCatalog')
@endisset

@section('content')
<div class="col-md-12">
    @isset($sub_catalog)
        <h1>Редактировать SubCatalog <b>{{ $sub_catalog->name }}</b></h1>
    @else
        <h1>Добавить SubCatalog</h1>
    @endisset

    <form method="POST" enctype="multipart/form-data"
        @isset($sub_catalog)
                      action="{{ route('sub_catalogs.update', $sub_catalog) }}"
                      @else
                      action="{{ route('sub_catalogs.store') }}"
                    @endisset>
        <div>
            @isset($sub_catalog)
                @method('PUT')
            @endisset
            @csrf
            <div class="input-group row">
                <label for="code" class="col-sm-2 col-form-label">Код: </label>
                <div class="col-sm-6">
                    @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" name="code" id="code"
                        value="{{ old('code', isset($sub_catalog) ? $sub_catalog->code : null) }}">
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Название: </label>
                <div class="col-sm-6">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" name="name" id="name"
                        value="@isset($sub_catalog){{ $sub_catalog->name }}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="catalog_id" class="col-sm-2 col-form-label">Catalog: </label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'catalog_id'])
                    <select name="catalog_id" id="catalog_id" class="form-control">
                        @foreach ($catalogs as $catalog)
                            <option value="{{ $catalog->id }}"
                                @isset($sub_catalog)
                                                @if ($sub_catalog->catalog_id == $catalog->id)
                                                selected
                                            @endif
                                            @endisset>
                                {{ $catalog->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>
            <div class="input-group row">
                <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                <div class="col-sm-6">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea name="description" id="description" cols="72" rows="7">
@isset($sub_catalog)
{{ $sub_catalog->description }}
@endisset
</textarea>
                </div>
            </div>
            <br>

            <div class="input-group row">
                <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                <div class="col-sm-10">
                    <label class="btn btn-default btn-file">
                        Загрузить <input type="file" style="display: none;" name="image" id="image">
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Сохранить</button>
        </div>
    </form>
</div>
@endsection
