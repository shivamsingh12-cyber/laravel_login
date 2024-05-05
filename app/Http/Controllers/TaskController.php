<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function insert(Request $req)
    {
        
            $userdata = auth()->user();
        // $submit=$req['submit'];
        // if($submit=="submit")
        // {
            $req->validate([
                'task'=>'required',
               ]);
            // if ($userdata==true) { 
            $data = new Task;
            Task::create([
                'user_id'=>$req->user,
                'status'=>"pending",
                'task'=>$req->task,
            ]);
            return response()->json([
                'task'=>'taskObject',
                'status'=>"1",
                'message'=>"Marked task as pending",
            ]);
          
            // }
            // throw ValidationException::withMessages([
            //     'status'=>"0",
            //     "message"=>"Invalid API key"
            // ]);
            // return response()->json([
            //     "Status"=>"0",
            //     "message"=>"Invalid API Key",
            // ]);
             
           

        
        
          
            // }
                
               
             
              
                //    return redirect('/dashboard')->with('message','successfully created task');
             
            // }
           
            // else{
            //     return response()->json([
            //         'status'=>"0",
            //         'message'=>"Invalid API KEY",
            //     ]);
            // }
          
        // }
    }
        public function update(Request $req,$id)
        {
            $userdata = auth()->user();      
            // $submit=$req['submit'];
            // if($submit=="submit")
            // {
            //    $req->validate([
            //     'task'=>'required',
            //    ]);
    
               $data = new Task;
               Task::find($id)->update([
                   'status'=>$req->input("status"),
               ]);
            //    return redirect('/dashboard')->with('message','successfully created task');
            return response()->json([
                'task'=>'taskObject',
                'status'=>"1",
                'message'=>"Marked task as done",
            ]);

    
        }
    // public function task(){
    //      $tasks = User::with('task')->get();
    //      return $tasks; 
    // }
}
