<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class apiexception extends Exception
{
    //
    public function register(){
        $this->renderable(function (\Illuminate\Auth\AuthenticationException $e,Request $request){
                if ($request->is('api/*')) {
                    return response()->json([
                        "status"=>"0",
                        "messages"=>"Invalid api"
                    ],401);
                }
        });
    }
}
