<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{

   //ham chuyen doi ngon ngu
   public function changeLanguage($language)
   {
     

      Session::put('website_language', $language);

      return view('welcome');
   } 
}
