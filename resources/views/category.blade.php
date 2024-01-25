{{-- @extends('layouts.master')

@section('title', __('main.category') . $rel_category->__('name'))

@section('content')
    <h1>
        {{$rel_category->__('name')}}
    </h1>
    <p>
        {{ $rel_category->__('description') }}
    </p>
    <div class="row">
        @foreach($rel_category->products->map->skus->flatten() as $sku)
            @include('layouts.card', compact('sku'))
        @endforeach
    </div>
@endsection --}}
