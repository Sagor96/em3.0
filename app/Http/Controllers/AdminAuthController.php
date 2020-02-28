<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use App\Admin;


class AdminAuthController extends Controller
{
    //Auth Zone
    public function login(){
        return view('admin.auth.login');
    }

    public function home(){
        return view('admin.home');
    }
    

    public function register(){
        return view('admin.auth.register');
    }

    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6|confirmed'
        ]);
        $admin=new Admin();
        if($validators->fails()){
            return redirect()->route('admin.register')->withErrors($validators)->withInput();
        }else{
            $admin->name=$request->name;
            $admin->email=$request->email;
            $admin->password=Bcrypt($request->password);
            $admin->save();
            return redirect()->route('admin.login');
        }
    }

    public function authenticate(Request $request){
        $validators=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validators->fails()){
            return redirect()->route('admin.login')->withErrors($validators)->withInput();
            
        }else{
            $email=$request->email;
            $password=$request->password;
            if(Auth::guard('admin')->attempt(['email'=>$email,'password'=>$password])){

                return redirect()->route('admin.dashboard');
            }else{
                session()->flash('type', 'success');
                 session()->flash('message', 'Invalid Email or Password!!');
                return redirect()->route('admin.login');
            }             
        }
    }

    public function logoutAdmin(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
