<?php
// routes/api.php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api' ], function() 
  {
    Route::get('me', 'App\Http\Controllers\AuthController@user');

  });


Route::group([ 'prefix' => 'auth' ], function () 
  {
  
    Route::get('user/create', 'App\Http\Controllers\UserController@createView');
    
    Route::post('user/create', 'App\Http\Controllers\AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
    
        Route::get('me', 'App\Http\Controllers\AuthController@user');
    });
});