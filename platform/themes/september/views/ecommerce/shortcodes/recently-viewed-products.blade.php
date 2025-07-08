@if ($products->isNotEmpty())
    <section class="section--homepage home-products">
        <div class="container">
            <div class="section__header">
                @if($title = $shortcode->title)
                    <h3>{!! BaseHelper::clean($title) !!}</h3>
                @endif
                @if ($description = $shortcode->description)
                    <p>{!! BaseHelper::clean($description) !!}</p>
                @endif
                @if ($subtitle = $shortcode->subtitle)
                    <p>{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
            </div>
            <div class="section__content">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-6">
                            {!! Theme::partial('product-item', compact('product')) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>
@endif
