<?php

use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Theme\September\Http\Controllers', 'middleware' => 'web'], function (): void {
    Theme::registerRoutes(function (): void {
        Route::get('ajax/cart', [
            'as' => 'public.ajax.cart',
            'uses' => 'SeptemberController@ajaxCart',
        ]);
    });
});

Theme::routes();
