        <footer class="footer">
            <div class="container">
                <div class="row">
                    @if (0)
                        <div class="col-md-4 col-sm-6 col-12">
                            {!! dynamic_sidebar('footer_sidebar') !!}
                        </div>
                    @endif
                    @if (theme_option('address') || theme_option('hotline') || theme_option('email'))
                        <div class="col-md-6 col-sm-6 col-12">
                            <aside class="widget widget--footer" id="widget--about-us">
                                <h3 class="widget__title">{{ theme_option('site_title') }}</h3>
                                <div class="widget__content">
                                    
                                    @if (theme_option('seo_description'))
                                        <p><pre
                                                class="d-inline-block">{{ theme_option('seo_description') }}</pre></p>
                                    @endif
                                    @if (theme_option('address'))
                                        <p><strong class="d-inline-block">{{ __('Address') }}:</strong>&nbsp;<span
                                                class="d-inline-block">{{ theme_option('address') }}</span></p>
                                    @endif
                                    @if (theme_option('hotline'))
                                        <p><strong class="d-inline-block">{{ __('Hotline') }}:</strong>&nbsp;<span
                                                class="d-inline-block">{{ theme_option('hotline') }}</span></p>
                                    @endif
                                    @if (theme_option('email'))
                                        <p><strong class="d-inline-block">{{ __('Email') }}:</strong>&nbsp;<span
                                                class="d-inline-block">{{ theme_option('email') }}</span></p>
                                    @endif
                                </div>
                            </aside>
                        </div>
                    @endif
                    <ul class="col-md-6 col-sm-6 col-12" >
                        @if (is_plugin_active('newsletter'))
                            <aside class="widget widget--footer" >
                                <h3 class="widget__title">{{ __('Subscribe & Receive 10% off your first order') }}</h3>
                                <form class="generic-form" method="POST"
                                    action="{{ route('public.newsletter.subscribe') }}">
                                    @csrf
                                    <div class="form--subscribe">
                                        <input class="form-control" type="email" name="email"
                                            placeholder="{{ __('Please enter your email address') }}">
                                        <button type="submit">{{ __('Go') }}</button>
                                    </div>

                                    {!! apply_filters('form_extra_fields_render', null, \Botble\Newsletter\Forms\Fronts\NewsletterForm::class) !!}

                                    <br>
                                    <div class="success-message text-success" style="display: none;">
                                        <span></span>
                                    </div>
                                    <div class="error-message text-danger" style="display: none;">
                                        <span></span>
                                    </div>
                                </form>
                            </aside>
                        @endif

                        @if ($socialLinks = Theme::getSocialLinks())
                            <aside class="widget widget--footer">
                                <h3 class="widget__title">{{ __('Connect with us') }}</h3>
                                <ul class="list--social">
                                    @foreach ($socialLinks as $socialLink)
                                        @continue(!$socialLink->getUrl() || !$socialLink->getIconHtml())

                                        <li>
                                            <a {!! $socialLink->getAttributes() !!}>{{ $socialLink->getIconHtml() }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                        @elseif (theme_option('social_links'))
                            <aside class="widget widget--footer">
                                <h3 class="widget__title">{{ __('Connect with us') }}</h3>
                                <ul class="list--social">
                                    @foreach (json_decode(theme_option('social_links'), true) as $socialLink)
                                        @if (count($socialLink) == 3)
                                            <li>
                                                <a href="{{ $socialLink[2]['value'] }}"
                                                    title="{{ $socialLink[0]['value'] }}">
                                                    <i
                                                        class="{{ Str::contains($socialLink[1]['value'], 'icon-') ? 'feather icon ' : '' }}{{ str_replace('fab ', 'fa ', $socialLink[1]['value']) }}"></i>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </aside>
                        @endif
                </div>
            </div>
            </div>

            @if ($copyright = Theme::getSiteCopyright())
                <div class="copyright mt-3 text-center">
                    <div class="container">
                        <p>{!! $copyright !!}</p>
                    </div>
                </div>
            @endif
        </footer>
        <div class="site-mask"></div>
        <div class="panel--search" id="site-search"><a class="panel__close" href="#"><i
                    class="feather icon icon-x"></i></a>
            <div class="container">
                <form class="form--primary-search"
                    action="{{ is_plugin_active('ecommerce') ? route('public.products') : (is_plugin_active('blog') ? route('public.search') : '#') }}"
                    method="GET">
                    <input class="form-control" name="q" type="text"
                        value="{{ BaseHelper::stringify(request()->query('q')) }}"
                        placeholder="{{ __('Search for') }}...">
                    <button><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        @if (is_plugin_active('ecommerce') && EcommerceHelper::isCartEnabled())
            <aside class="panel--sidebar" id="panel-cart">
                <div class="panel__header">
                    <h4>{{ __('Shopping Cart') }}</h4><span class="panel__close"></span>
                </div>
                <div class="panel__content">
                    {!! Theme::partial('cart-panel') !!}
                </div>
            </aside>
        @endif
        <aside class="panel--sidebar" id="panel-menu">
            <div class="panel__header">
                <h4>{{ __('Menu') }}</h4><span class="panel__close"></span>
            </div>
            <div class="panel__content">
                {!! Menu::renderMenuLocation('main-menu', [
                    'options' => ['class' => 'menu menu--mobile'],
                    'view' => 'main-menu',
                ]) !!}
            </div>
        </aside>

        <script>
            window.trans = {
                "No reviews!": "{{ __('No reviews!') }}",
                "days": "{{ __('days') }}",
                "hours": "{{ __('hours') }}",
                "mins": "{{ __('mins') }}",
                "sec": "{{ __('sec') }}",
            };
        </script>

        {!! Theme::footer() !!}

        {!! Theme::place('footer') !!}
        </body>

        </html>
