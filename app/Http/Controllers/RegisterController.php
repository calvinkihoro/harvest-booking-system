<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
  public function showRegister(){
      return view('auth.register');
  }
    public function showLogin(){
        return view('auth.login');
    }


    public function processRegister(Request $request){
      $validator=$this->validate($request,[
          'fname' => ['required', 'string','min:2', 'max:255'],
          'lname' => ['required', 'string','min:2', 'max:255'],
          'mname' => ['required', 'string','min:2', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:12'],
          'role' => ['required','string'],
          'gender' => ['required'],
          'password' => ['required', 'min:8','string'],
          'password_confirmation' => ['required', 'same:password'],

      ]);
      $user=User::create([
          'name' => $request->fname.' '.$request->mname.' '.$request->lname,
          'fname'=>$request->fname,
          'lname'=>$request->lname,
          'mname'=>$request->mname,
          'gender'=>$request->gender,
          'email' =>$request->email,
          'phone' =>$request->phone,
          'onlineUser'=>'1',
          'password' =>Hash::make($request->password),
      ]);
      if(!$user){
          Session::flash('status','The connection not available');
      }else{
          Auth::attempt($request->only('email', 'password'));
          return view('dashboard');
      }
    }

    public function processLogin(Request $request){
        $this->validate($request,[
            'email' => ['required', 'string', 'email'],
            'password' => ['required','string'],

        ]);
        $user=User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->route('login')->with('status','There is no such email');
        }else{
           $auth= Auth::attempt($request->only('email', 'password'),$request->remember);

           if($auth){
               if(Auth::user()->role==='user'){
                   return redirect()->route('/');
               }else{
                   return view('admin/dashboard');
               }
           }else{

             return redirect()->route('login')->with('status','wrong password...');
           }



        }
    }

}