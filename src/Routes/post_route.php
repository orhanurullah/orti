<?php
namespace Orti\Blogger\Routes;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function(){
    Route::group(['prefix' => 'post'], function(){
        Route::get('/all', [PostController::class, 'index'])
            ->name('posts');
    });
});
