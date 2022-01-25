<?php

use Illuminate\Support\Facades\Route;

Route::group([
        'prefix'     => 'blog',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('/', 'Mrshiam\Blog\Http\Controllers\Shop\blogController@index')->defaults('_config', [
            'view' => 'blog::shop.blog.index',
        ])->name('shop.blog.index');

        Route::get('show/{id}', 'Mrshiam\Blog\Http\Controllers\Shop\blogController@show')->name('shop.blog.show');

});