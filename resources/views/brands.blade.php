@extends('layouts.master')

@section('title', __('main.All Brands'))

@section('content')
    @foreach ($brands as $brand)
        <div class="panel">
            <a href="{{ route('brand', $brand->code) }}">
                <img src="{{ Storage::url($brand->image) }}">
                <h2>{{ $brand->name }}</h2>
            </a>
            <p>
                {{ $brand->description }}
            </p>
        </div>
    @endforeach
@endsection
