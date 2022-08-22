<?php
// routes/api.php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('user/login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');
   
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::delete('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('me', 'App\Http\Controllers\AuthController@user');
    });
});