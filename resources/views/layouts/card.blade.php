{{-- @dd(asset($sku->product->image)) --}}

<div class="col-sm-6 col-md-4">

    <div class="thumbnail">
        <div class="labels">
            @if ($sku->product->isNew() ?? null)
                <span class="badge badge-success">@lang('main.properties.new')</span>
            @endif

            @if ($sku->product->isRecommend() ?? null)
                <span class="badge badge-warning">@lang('main.properties.recommend')</span>
            @endif

            @if ($sku->product->isHit() ?? null)
                <span class="badge badge-danger">@lang('main.properties.hit')</span>
            @endif
        </div>
        <img src="{{ Storage::url($sku->product?->image) }}" alt="{{ $sku->product?->name }}">
        <div class="caption">
            <h3>{{ $sku->product->name ?? null }}</h3>
            @isset($sku->product->properties)
                @foreach ($sku->propertyOptions as $propertyOption)
                    <h4>{{ $propertyOption->property->name }}: {{ $propertyOption->name }}</h4>
                @endforeach
            @endisset
            <p>{{ $sku->price }} $</p>
            <p>
                {{-- @dd($sku->product->category->code) --}}
            <form action="{{ route('basket-add', $sku) }}" method="POST">
                @if ($sku->isAvailable())
                    <button type="submit" class="btn btn-primary" role="button">@lang('main.add_to_basket')</button>
                @else
                    @lang('main.not_available')
                @endif
                @if ($sku->product && $sku->product->category)
                    <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku->id]) }}"
                        class="btn btn-default" role="button">@lang('main.more')</a>
                @endif
                @csrf
            </form>
            </p>
        </div>
    </div>
</div>
