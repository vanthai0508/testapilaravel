<?php
// routes/api.php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
  'middleware' => 'api'
], function() {
//    Route::delete('logout', 'App\Http\Controllers\AuthController@logout');
      Route::get('me', 'App\Http\Controllers\AuthController@user');

     
});
Route::group([
    'prefix' => 'auth'
], function () {
  //  Route::post('user/login', 'App\Http\Controllers\AuthController@login');

    Route::get('user/create', 'App\Http\Controllers\UserController@createView');

  // Route::get('user/login', 'App\Http\Controllers\UserController@loginView');
    Route::post('user/create', 'App\Http\Controllers\AuthController@signup');
  // Route::post('user/login', 'App\Http\Controllers\AuthController@login');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
    //    Route::delete('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('me', 'App\Http\Controllers\AuthController@user');
    });
});