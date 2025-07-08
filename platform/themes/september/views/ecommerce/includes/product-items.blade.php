@if ($products->isNotEmpty())
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 col-sm-6">
                {!! Theme::partial('product-item', compact('product')) !!}
            </div>
        @endforeach
    </div>
    <div class="shop__pagination">
        {!! $products->withQueryString()->links() !!}
    </div>
@else
    <br>
    <p class="text-center">{{ __('No products!') }}</p>
@endif
