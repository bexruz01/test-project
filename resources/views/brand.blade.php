@extends('layouts.master')

{{-- @section('title', __('main.category') . $brand_products->name) --}}

@section('content')
    <h1>
        {{$brand_products->name}}
    </h1>
    <p>
        {{ $brand_products->description }}
    </p>
    <div class="row">
        @foreach($brand_products->products->map->skus->flatten() as $sku)
            @include('layouts.card', compact('sku'))
        @endforeach
    </div>
@endsection
