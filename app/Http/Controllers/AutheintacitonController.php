<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutheintacitonController extends Controller
{

    public function init(){
        $user = Auth::user();
        $photo = $user->photo;
        return response()->json(['user' => $user, $photo], 200);
    }


    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6'
        ];

        $this->validate($request, $rules);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json(Auth::user(), 200);
        }else {
            return response()->json([ 'message' => 'Some error occurred, Please try again'], 401);
        }


    }


    public function logout(){

        Auth::logout();
    }
}
