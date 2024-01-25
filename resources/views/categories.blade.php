@extends('layouts.master')

@section('content')
    <!--main area-->
    <main id="main" class="main-site left-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="row">
                        <ul class="product-list grid-products equal-container">
                            {{-- @include('category', compact('rel_category')); --}}
                            @isset($rel_category)
                                <h1 style="display: flex; align-item:center;justify-content:center;">
                                    {{ $rel_category->name }}
                                </h1>
                                @foreach ($rel_category->products->map->skus->flatten() as $sku)
                                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                        <div class="product product-style-3 equal-elem ">
                                            <div class="labels">
                                                @if ($sku->product->isNew())
                                                    <span class="badge badge-success">@lang('main.properties.new')</span>
                                                @endif

                                                @if ($sku->product->isRecommend())
                                                    <span class="badge badge-warning">@lang('main.properties.recommend')</span>
                                                @endif

                                                @if ($sku->product->isHit())
                                                    <span class="badge badge-danger">@lang('main.properties.hit')</span>
                                                @endif
                                            </div>
                                            <div class="product-thumnail">
                                                <a href="{{ route('sku', [
                                                    isset($rel_category) ? $rel_category->code : $sku->product->category->code,
                                                    $sku->product->code,
                                                    $sku->id,
                                                ]) }}"
                                                    title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img src="{{ Storage::url($sku->product->image) }}"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="#"
                                                    class="product-name"><span>{{ $sku->product->name }}</span></a>
                                                @isset($sku->product->properties)
                                                    @foreach ($sku->propertyOptions as $propertyOption)
                                                        <h4>{{ $propertyOption->property->name }}:
                                                            {{ $propertyOption->name }}</h4>
                                                    @endforeach
                                                @endisset
                                                <div class="wrap-price"><span class="product-price">{{ $sku->price }} $
                                                    </span></div>
                                                {{-- <a href="#" class="btn add-to-cart">Add To Cart</a> --}}
                                                <form action="{{ route('basket-add', $sku) }}" method="POST">
                                                    @if ($sku->isAvailable())
                                                        <button type="submit" class="btn btn-primary"
                                                            role="button">@lang('main.add_to_basket')</button>
                                                    @else
                                                        @lang('main.not_available')
                                                    @endif
                                                    <a href="{{ route('sku', [
                                                        isset($rel_category) ? $rel_category->code : $sku->product->category->code,
                                                        $sku->product->code,
                                                        $sku->id,
                                                    ]) }}"
                                                        class="btn btn-default" role="button">@lang('main.more')</a>
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endisset

                        </ul>

                    </div>
                    {{-- @dd($rel_category->products->map->skus) --}}
                    {{-- {{ $rel_category->products->map->skus->links() }} --}}
                    <div class="wrap-pagination-info">
                        <ul class="page-numbers">
                            <li><span class="page-number-item current">1</span></li>
                            <li><a class="page-number-item" href="#">2</a></li>
                            <li><a class="page-number-item" href="#">3</a></li>
                            <li><a class="page-number-item next-link" href="#">Next</a></li>
                        </ul>
                        <p class="result-count">Showing 1-8 of 12 result</p>
                    </div>
                </div><!--end main products area-->

                {{-- All Categories --}}
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">All Catalog</h2>
                        <div class="widget-content">
                            <ul class="list-category">
                                @foreach ($catalogs as $catalog)
                                    {{-- <li class="category-item has-child-cate">
                                        <a href="#" class="cate-link">{{ $subCatalog->name }}</a>
                                        <span class="toggle-control">+</span>
                                        <ul class="sub-cate">
                                            @foreach ($subCatalog->categories as $category)
                                                <li class="category-item"><a
                                                        href="{{ route('category', $category->code) }}"
                                                        class="cate-link">{{ $category->name }}
                                                        (22)
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </li> --}}
                                    <li class="category-item has-child-cate">
                                        <a href="#" class="cate-link">{{ $catalog->name}}</a>
                                        <span class="toggle-control">+</span>
                                        <ul class="sub-cate">
                                            @foreach ($catalog->subCatalogs as $subCatalog)
                                            <li class="category-item">
                                                <a href="#" class="cate-link">{{ $subCatalog->name }}</a>
                                                <span class="toggle-controls">+</span>
                                                <ul class="sub-cate sub__categories-list">
                                                    @foreach ($subCatalog->categories as $category)
                                                <li class="category-item"><a
                                                        href="{{ route('category', $category->code) }}"
                                                        class="cate-link">{{ $category->name }}
                                                        (22)
                                                    </a></li>
                                            @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                {{-- <li class="category-item has-child-cate">
                                    <a href="#" class="cate-link">Test</a>
                                    <span class="toggle-control">+</span>
                                    <ul class="sub-cate">
                                        <li class="category-item">
                                            <a href="#" class="cate-link">Batteries (22)</a>
                                            <span class="toggle-controls">+</span>
                                            <ul class="sub-cate sub__categories-list">
                                                <li class="category-item"><a href="#" class="cate-link">Batteries
                                                        (22)</a></li>
                                                <li class="category-item"><a href="#" class="cate-link">Headsets
                                                        (16)</a></li>
                                                <li class="category-item"><a href="#" class="cate-link">Screen
                                                        (28)</a></li>
                                            </ul>

                                        </li>
                                        <li class="category-item"><a href="#" class="cate-link">Headsets
                                                (16)</a></li>
                                        <li class="category-item"><a href="#" class="cate-link">Screen (28)</a>
                                        </li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </div>
                    </div><!-- Categories widget-->
                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="assets/images/products/digital_01.jpg" alt="">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="assets/images/products/digital_17.jpg" alt="">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="assets/images/products/digital_18.jpg" alt="">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="assets/images/products/digital_20.jpg" alt="">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div><!-- brand widget-->

                </div><!--end sitebar-->

            </div><!--end row-->

        </div><!--end container-->

    </main>
@endsection
<!--main area-->
