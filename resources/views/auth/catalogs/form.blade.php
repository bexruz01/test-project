@extends('auth.layouts.master')

@isset($catalog)
    @section('title', 'Редактировать Catalog ' . $catalog->name)
@else
@section('title', 'Создать Catalog')
@endisset

@section('content')
<div class="col-md-12">
    @isset($catalog)
        <h1>Редактировать Catalog <b>{{ $catalog->name }}</b></h1>
    @else
        <h1>Добавить Catalog</h1>
    @endisset

    <form method="POST" enctype="multipart/form-data"
        @isset($catalog)
                      action="{{ route('catalogs.update', $catalog) }}"
                      @else
                      action="{{ route('catalogs.store') }}"
                    @endisset>
        <div>
            @isset($catalog)
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
                        value="{{ old('code', isset($catalog) ? $catalog->code : null) }}">
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
                        value="@isset($catalog){{ $catalog->name }}@endisset">
                </div>
            </div>
            {{-- <br>
            <div class="input-group row">
                <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'category_id'])
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @isset($catalog)
                                                @if ($catalog->category_id == $category->id)
                                                selected
                                            @endif
                                            @endisset>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}

            <br>
            <div class="input-group row">
                <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                <div class="col-sm-6">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea name="description" id="description" cols="72" rows="7">
@isset($catalog)
{{ $catalog->description }}
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
