<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class RegisterController extends Controller
{
    public function register(Request $req)
    {
        // $validator = Validator::make($request->all(),
        // [
        //         'name'=>'required|alpha',
        //         'email'=>'required|email|unique:users',
        //         'password'=>'required|min:8'
        // ]);
        // if($validator->fails())
        // {
        //     return response()->json([
        //         "status"=>"0",
        //         "message"=>"task has not been created",
        //         "task"=>"taskObject"
        //     ]);
        // }
        // $users=User::create([
        //         'name'=> $req->name,
        //         'email'=> $req->email,
        //         'password'=>Hash::make($req->password),
        //     ]);
        // return response()->json([
        //             "status"=>"1",
        //             "message"=>"successfully created a task",
        //             "task"=>"taskObject"
        //            ]);

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
            "email"=>'required|email',
            "password"=>'required'
           ]);

            if(Auth::attempt($req->only(["email", "password"]))){
            // if(Hash::check($req->password,$user->password))
            // {
                Session()->put('data',Auth::user());
                Session()->put('userid',Auth::id());
                $user = User::where("email",$req->email)->first();
                $token=$user->createToken("helloatg")->plainTextToken;
                return redirect('/dashboard');
            // }
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

