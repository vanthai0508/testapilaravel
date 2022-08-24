<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\cv;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('cv/list', 'App\Http\Controllers\CVController@list');

Route::get('user/create', 'App\Http\Controllers\UserController@createView');

//Route::post('user/create', 'App\Http\Controllers\AuthController@signup');

//Route::post('user/create', 'App\Http\Controllers\UserController@create');

Route::get('user/login', 'App\Http\Controllers\UserController@loginView');

//Route::post('user/login', 'App\Http\Controllers\UserController@login');

//Route::post('user/login', 'App\Http\Controllers\AuthController@login');

Route::get('cv/create', 'App\Http\Controllers\CVController@applyView');

Route::post('cv/create', 'App\Http\Controllers\CVController@create');

Route::get('cv/{id}/reject', 'App\Http\Controllers\CVController@reject');

Route::get('cv/{idcv}/{iduser}/approve', 'App\Http\Controllers\XNController@approve');

Route::get('confirm/confirm', 'App\Http\Controllers\XNController@confirmview');

Route::post('confirm/confirm', 'App\Http\Controllers\XNController@confirm');

Route::get('confirm/doneconfirm', 'App\Http\Controllers\XNController@listDoneConfirm');

Route::DELETE('logout', 'App\Http\Controllers\AuthController@logout');

//Route::post('reset-password', 'App\Http\Controllers\ResetPasswordController@sendMail');

// Route::post('reset-password', 'App\Http\Controllers\ResetPasswordController@sendMail');

//   Route::put('reset-password/{token}', 'App\Http\Controllers\ResetPasswordController@reset');

Route::group([
    'middleware' => 'auth:api'
  ], function() {
      Route::DELETE('logout', 'App\Http\Controllers\AuthController@logout');
      Route::get('me', 'App\Http\Controllers\AuthController@user');
  });

//Route::get('change-language/{language}', 'App\Http\Controllers\HomeController@changeLanguage')->name('user.change-language');

// middleware quyen admin
Route::group(['middleware' => 'User-Account-Admin'], function()
{
    Route::get('cv/list', 'App\Http\Controllers\CVController@list');
    
    Route::get('cv/{id}/reject', 'App\Http\Controllers\CVController@reject');

    Route::get('cv/{idcv}/{iduser}/approve', 'App\Http\Controllers\XNController@approve');

    Route::get('confirm/doneconfirm', 'App\Http\Controllers\XNController@listDoneConfirm');

    
});

Route::group(['middleware' => 'User-Account'], function()
{
    Route::get('cv/create', 'App\Http\Controllers\CVController@applyView');

    Route::post('cv/create', 'App\Http\Controllers\CVController@create');

    Route::get('confirm/confirm', 'App\Http\Controllers\XNController@confirmview');

    Route::post('confirm/confirm', 'App\Http\Controllers\XNController@confirm');


});

Route::get('user/login', 'App\Http\Controllers\UserController@loginView');

Route::post('user/login', 'App\Http\Controllers\AuthController@login');

// middleware da ngon ngu giao dien
Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'App\Http\Controllers\HomeController@changeLanguage')
        ->name('user.change-language');
});



Route::get('forget-password', [App\Http\Controllers\auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');


Route::post('forget-password', [App\Http\Controllers\auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 


Route::get('reset-password/{token}', [App\Http\Controllers\auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');


Route::post('reset-password', [App\Http\Controllers\auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');






Route::get('/test', function()
{
    // $cvs=cv::all();
    // $users=User::all();
 
    
    
    
    // foreach($cvs as $cv)
    // {
    //     echo $cv->user->username;
    //   //  echo $user->cv->phone;
         
    //      echo '<br>';
    //     // if($user->cv()!=null)
    //     // {
    //     //     dd($user);
    //     // }
       
        
    // }
    // foreach($users as $user)
    // {
    //     echo $user->cv;
    //   //  echo $user->cv->phone;
         
    //      echo '<br>';
    //     // if($user->cv()!=null)
    //     // {
    //     //     dd($user);
    //     // }
       
    //     break;
    // }   
});