@php
    $menu = Menu::generateMenu([
            'slug'    => $config['menu_id'],
            'options' => ['class' => 'widget__links'],
        ]);
@endphp

@if ($menu)
    <aside class="widget widget--footer">
        <h3 class="widget__title">{{ $config['name'] }}</h3>
        <div class="widget__content">
            {!! $menu !!}
        </div>
    </aside>
@endif
