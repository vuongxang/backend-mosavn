<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user);
    }

    public function login(LoginRequest $request){
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ])){
                $user = User::where('email',$request->email)->first();
                $user->token = $user->createToken('App')->accessToken;
                return response()->json($user);
        }else{
            return response()->json(['error'=>'Sai email hoặc mật khẩu'],401);
        }
    }

    public function userinfo(Request $request){
        return response()->json($request->user('api'));
    }
}
