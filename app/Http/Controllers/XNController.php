<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\XNRepository;
use Illuminate\Support\Facades\DB;
use App\Models\cv;
use App\Models\User;
use App\Models\xn;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class XNController extends Controller
{
    protected $xn;
    public function __construct(XNRepository $xn)
    {
        $this->xn = $xn;
    }

    //ham approve
    public function approve($idcv, $iduser)
    {
   
        $cv = cv::find($idcv);


        $user = User::find($iduser);
        $date = date('y-m-d h:i:s');

        $dateInter = strtotime ('+2 day', strtotime ( $date) ) ;

        $dateInterview = date("y-m-d h:i:s", $dateInter);

      
        DB::table('xn')->insert(
            [ 'dateinterview' => $dateInterview, 'id_user' => $iduser, 'id_cv' => $idcv, 'name' => $cv->name, 'position' => $cv->position, 'phone' => $cv->phone, 'status' => 1 ]
        );

        if(DB::table('cv')->where('id', $idcv)->update(['status' => 0]))
        {
            Session::flash('success', 'Approve thanh cong');
        }
        else Session::flash('error', 'Aprove that bai');


        $this->sendEmail($user->email, "cv/mailapprove");

        return redirect()->back();
    }

    //ham tra ve don confirm cho user
    public function confirmview()
    {
        $user = Auth::user();
        

        $confirm = DB::table('xn')->where('id_user', $user->id)->where('status', 1)->orderBy('dateInterview', 'desc')->limit(1)->get();
       
   
        if( $confirm->count() == 0)
        {
           Session::flash('error','CV của bạn chưa được duyệt !!!');

           return view('confirm/confirm');
            
          

        }
        else
        {
            $cv = cv::find($confirm[0]->id_cv);
            return view('confirm/confirm', ['cv' => $cv], ['confirm' => $confirm[0]] );
        }

        
    }

    // ham confirm cho user
    public function confirm()
    {
        $user = Auth::user();

        if (DB::table('xn')->where('id_user', $user->id)->update(['status' => 0]))
        {
            return view('welcome');
        }
    }

    // ham tra ve list user tham gia phong van
    public function listDoneConfirm()
    {
        $confirms = DB::table('xn')->where('status', 0)->distinct()->get();
     
        return view('confirm/doneconfirm', ['confirms' => $confirms]);
    }
}
