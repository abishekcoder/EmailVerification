<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }

    public function showLoginform(){
        return view(  'auth.admin-login');
    }
    public function login(Request $request){
        //4 steps required to make login
        //validate the user
        //attempt to login the user
        //if successfull then redirect to intended location
        //if unsuccessfull then redirect in the login form

        $this->validate($request,[
            'email' => 'required|email',
            'password'=>'required|min:6'
        ]);

        $credentials = [
            'email' =>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::guard('admin')->attempt($credentials,$request->remember))
        {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withinput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();


        return redirect('/');
    }
    //
}
