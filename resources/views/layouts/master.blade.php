<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('main.online_shop'): @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/chosen.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/color-01.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('index') }}">@lang('main.online_shop')</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_products')</a></li>
                    <li @routeactive('categor*')><a href="{{ route('categories') }}">@lang('main.categories')</a>
                    </li>
                    <li @routeactive('basket*')><a href="{{ route('basket') }}">@lang('main.cart')</a></li>
                    <li @routeactive('brand*')><a href="{{ route('brands') }}">Brands</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li><a href="{{ route('login') }}">@lang('main.login')</a></li>
                    @endguest

                    @auth
                        @admin
                            <li><a href="{{ route('home') }}">@lang('main.admin_panel')</a></li>
                        @else
                            <li><a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a></li>
                        @endadmin
                        <li><a href="{{ route('get-logout') }}">@lang('main.logout')</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="starter-template">
            @if (session()->has('success'))
                <p class="alert alert-success">{{ session()->get('success') }}</p>
            @endif
            @if (session()->has('warning'))
                <p class="alert alert-warning">{{ session()->get('warning') }}</p>
            @endif
            @yield('content')
        </div>
    </div>

    {{-- <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6"><p>Категории товаров</p>
                <ul>
                    @foreach ($categories as $category)
                        <li><a href="{{ route('category', $category->code) }}">{{ $category->__('name') }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6"><p>Самые популярные товары</p>
                <ul>
                    @foreach ($bestSkus as $bestSku)
                        <li><a href="{{ route('sku',
                [$bestSku->product->category->code, $bestSku->product->code, $bestSku]) }}">
                                {{ $bestSku->product->__('name') }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer> --}}

    <footer id="footer">
        <div class="wrap-footer-content footer-style-1">


            <!--End function info-->

            <div class="main-footer-content">

                <div class="container">

                    <div class="row">

                    </div>
                </div>
            </div>


        </div>
    </footer>

    <script src="assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4"></script>
    <script src="assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>
