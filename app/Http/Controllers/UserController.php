<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    //ham tra ve list user
    public function list()
    {
        $users = $this->user->list();

      //  return view('user/list')->with('users',$users);
    }

    //ham tra ve view dang ky
    public function createView()
    {
        return view('user/create');
    }

    //ham dang ky
    public function create(Request $request)
    {
        if($this->user->create($request))
        {
            Session::flash('success','thanh cong');
            return view('welcome');
        }
        else 
            Session::flash('error','that bai');
        
    }

    //ham tra ve view dang nhap
    public function loginView()
    {
        return view('user/login');
    }

    //ham login
    // public function login(LoginRequest $request)
    // {
        
    //     $username = $request->username;
    //     $password = $request->password;
        
    //         if(Auth::attempt(['username' => $username, 'password' => $password]))
    //         {
    //             return view('welcome');
    //         }
    //         else
    //         {
    //             return redirect()->back()->with('status', 'Username hoac Password khong dung');
            
    //         }
        
    // }
}