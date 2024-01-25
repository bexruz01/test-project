@extends('auth.layouts.master')

@isset($product_brand)
    @section('title', 'Редактировать Brand ' . $product_brand->name)
@else
    @section('title', 'Создать Brand')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product_brand)
            <h1>Редактировать Brand <b>{{ $product_brand->name }}</b></h1>
                @else
                    <h1>Добавить Brand</h1>
                @endisset

                <form method="POST" enctype="multipart/form-data"
                      @isset($product_brand)
                      action="{{ route('product_brands.update', $product_brand) }}"
                      @else
                      action="{{ route('product_brands.store') }}"
                    @endisset
                >
                    <div>
                        @isset($product_brand)
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
                                       value="{{ old('code', isset($product_brand) ? $product_brand->code : null) }}">
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
                                       value="@isset($product_brand){{ $product_brand->name }}@endisset">
                            </div>
                        </div>

                        {{-- <br>
                        <div class="input-group row">
                            <label for="product_brand_id" class="col-sm-2 col-form-label">SubCatalog: </label>
                            <div class="col-sm-6">
                                @include('auth.layouts.error', ['fieldName' => 'sub_catalog_id'])
                                <select name="sub_catalog_id" id="product_brand_id" class="form-control">
                                    @foreach($sub_catalogs as $sub_catalog)
                                        <option value="{{ $sub_catalog->id }}"
                                                @isset($category)
                                                @if($category->sub_catalog_id == $sub_catalog->id)
                                                selected
                                            @endif
                                            @endisset
                                        >{{ $sub_catalog->name }}</option>
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
							<textarea name="description" id="description" cols="72"
                                      rows="7">@isset($product_brand){{ $product_brand->description }}@endisset</textarea>
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

