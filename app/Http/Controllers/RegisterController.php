<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function register(Request $req)
    {
        $submit=$req['submit'];
        if($submit=="submit")
        {
           $req->validate([
            'name'=>'required|alpha',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
           ]);

          User::create([
                'name'=> $req->name,
                'email'=> $req->email,
                'password'=>Hash::make($req->password),
          ]);
           return redirect('/');
        }
        return view('registration');
    }

    public function login(Request $req)
    {
        $submit=$req->submit;
        if($submit=="submit")
        {
            // return $req;
            // return $req->only(['email', 'password']);
           
           $req->validate([
            "email"=>'required',
            "password"=>'required'
           ]);
           if(Auth::attempt($req->only(["email", "password"])))
           {
            
            Session()->put('data',Auth::user());
            return redirect('/dashboard');
           }
           else{
               return redirect('/')->withError('Incorrect Username or Password');
           }
        }
        return view('login');
    }
    public function home()
    {
        return view('dashboard');
    }

    public function logout(){
        \Session::flush();
        return redirect('/');
     }
}
