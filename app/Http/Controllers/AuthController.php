<?php
// app/Http/Controllers/AuthController.php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
 
class AuthController extends Controller
{

    // ham register
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }
 
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 1,
        ]);
 
        $user->save();
        // return response()->json([
        //     'status' => 'success',
        // ]);
 
        return redirect('user/login');
    }

    //ham login
 
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
 
        if ($validator->fails()) 
        {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }
 
        $credentials = request(['email', 'password']);
 
        if (!Auth::attempt($credentials)) 
        {
            return response()->json([
                'status' => 'fails',
                'message' => 'Unauthorized'
            ], 401);

            
        }
 
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
 
        if ($request->remember_me) 
        {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
 
        $token->save();
        
        return view('welcome');
        // return response()->json([
        // ]);
    }
 
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        // return response()->json([
        //     'status' => 'success',
        // ]);
        return view("user/login");
    }
 
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}