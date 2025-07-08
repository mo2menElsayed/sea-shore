@php
    Theme::layout('full-width');
@endphp

<main class="page--shop">
    <div class="page__hero bg--cover" data-background="{{ theme_option('product_page_banner_image') ? RvMedia::getImageUrl(theme_option('product_page_banner_image')) : Theme::asset()->url('img/bg/shop.jpg') }}">
        <h1>{{ theme_option('product_page_banner_title') ?: __('Enjoy Shopping with us') }}</h1>
    </div>
    <div class="page__content">
        <div class="container">
            <div class="shop shop--sidebar">
                <div class="container">
                    <div class="shop__header">
                        @include(Theme::getThemeNamespace() . '::views.ecommerce.includes.sort')
                        <a class="panel-trigger btn--custom btn--rounded btn--outline" href="#filter-product">{{ __('Filter Products') }}</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="shop__content">
                        <div class="shop__left">
                            @include(Theme::getThemeNamespace() . '::views.ecommerce.includes.filters')
                        </div>
                        <div class="shop__right" data-bb-toggle="product-list">
                            <div class="shop__products bb-product-items-wrapper">
                                @include(Theme::getThemeNamespace('views.ecommerce.includes.product-items'))
                            </div>
                        </div>
                    </div>

                    @include(Theme::getThemeNamespace() . '::views.ecommerce.includes.filters-modal')
                </div>
            </div>
        </div>
    </div>
</main>
