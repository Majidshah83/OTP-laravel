<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function send_otp()
    {
        if(Auth::id()){
            // $user = new User;
            $id = Auth::id();
            $user = User::find($id);
            $randomString = Str::random(30);
            $user['otp_token'] = $randomString;
            $user->save();
            $otp_token = ($user['otp_token']);
            $email = "mudasirriaz1793@gmail.com";
            \Mail::to($email)->send( new \App\Mail\MyTestMail($otp_token));
            return view('otp');
        }
    }

    public function check_form(Request $request)
    {
        if(Auth::id()){
            $id = Auth::id();
            $user = User::find($id);
            $otp_token = $user['otp_token'];
            if($otp_token == $request->otp){
                return view('home');
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function null_token()
    {
        if(Auth::id()){
            $id = Auth::id();
            $user = User::find($id);
            $user['otp_token'] = "null";
            $user->save();
            return response()->json([
                'status'=>200,
                'message'=>'token is null now',
            ]);
        }
    }

}
