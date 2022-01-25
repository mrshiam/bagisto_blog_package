<?php
use Illuminate\Support\Facades\Route;

Route::group([
        'prefix'        => 'admin/blog',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('/index', 'Mrshiam\Blog\Http\Controllers\Admin\blogController@index')->defaults('_config', [
            'view' => 'blog::admin.blog.index',
        ])->name('admin.blog.index');

        Route::get('/create', 'Mrshiam\Blog\Http\Controllers\Admin\blogController@create')->defaults('_config', [
            'view' => 'blog::admin.blog.create',
        ])->name('blog.create');
        Route::post('/store', 'Mrshiam\Blog\Http\Controllers\Admin\blogController@store')->name('blog.store');

        Route::get('/show/{id}', 'Mrshiam\Blog\Http\Controllers\Admin\blogController@show')->name('blog.show');

        Route::get('{id}/edit', 'Mrshiam\Blog\Http\Controllers\Admin\blogController@edit')->name('blog.edit');

        Route::put('/update/{id}', 'Mrshiam\Blog\Http\Controllers\Admin\blogController@update')->name('blog.update');

        Route::delete('/delete/{id}', 'Mrshiam\Blog\Http\Controllers\Admin\blogController@destroy')->name('blog.delete');

});