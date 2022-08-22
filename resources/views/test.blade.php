

<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;


// echo Auth::User()->role;
// echo '<br>';
// echo Auth::check();
// echo '<br>';
//  //   echo 'test';

//     if( Auth::check() && Auth::user()->role == 0)
//         {
//             echo "pass";

//         }
//         else  
//         echo "fail";

   // echo $lang;
  //  echo $lang;
  //  echo "ở đây";
   // App::setLocale($lang);

   // $locale = App::currentLocale();
    // if(App::isLocal('en'))
    // {
    //     echo 'en';
    // }
    echo Lang::get('message.welcome');
    ?>
    {{ trans('message.welcome') }};
    <br>

    {{ trans('message.hello', ['name' => 'My Name']) }}

   
    <img src="cv/Trafalgar-Law-full.jpg">
    <a href="{!! route('user.change-language', ['en']) !!}">English</a>
    <a href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a>

