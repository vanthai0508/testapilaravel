<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyRequest;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Models\cv;
use PhpParser\Node\Expr\FuncCall;
use App\Repositories\Eloquent\CVRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\User;

class CVController extends Controller
{

    protected $cv;
    public function __construct(CVRepository $cv)
    {
        $this->cv=$cv;
    }

    // ham tra ve list cv chua duyet
    public function list()
    {
        $cvs = $this->cv->list();

        $cvs=DB::table('cv')->Where('status', '1')->get();
       
        return view('cv/list')->with('cvs',$cvs);
    }
    

    //ham tra ve view apply
    public function applyView()
    {
        return view('cv/create');
    }
    
    // ham apply 
    public function create(ApplyRequest $request)
    {   
        $user=Auth::user();

        if ($request->hasFile('file')) 
        {
            $file = $request->file;

            $file->move('cv', $file->getClientOriginalName());

            $link = $file->getClientOriginalName();

            $id = $user->id;
        
            DB::table('cv')->insert(
            ['name' => $request->name, 'position' => $request->position, 'created_at' => date('Y-m-d h:i:s'), 'file' => null, 'phone' => $request->phone, 'file' => $link, 'id_user' =>$id, 'status' =>1 ]
            );

        }
        return view('welcome');
    }

    // ham reject ung vien
    public function reject($id)
    {
        
        $result = $this->cv->find($id);

        

        $user = User::find($result->id_user);

        $this->sendEmail($user->email,"cv/mail");

         
         if(DB::table('cv')->where('id', $id)->update(['status' => 0]))
        {
            Session::flash('success','Reject thanh cong');
        }
        else Session::flash('error','Reject that bai');

         return redirect('cv/list');
    }

}