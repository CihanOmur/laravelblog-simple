<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Admin;



class AuthController extends Controller
{




    public function login(){
        return view('back.auth.login');
    }

    public function loginPost(Request $request){
        
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            
          return redirect()->route('admin.dashboard');
        }
          
           return redirect()->back()->withErrors('Email or password is incorrect');
      }


      public function logout(){

         Auth::logout();
         return redirect()->route('admin.login');
      }
  }
  
  

  // dd(); ve print_r  içindeki datayı ekrana basan bir helper
  

