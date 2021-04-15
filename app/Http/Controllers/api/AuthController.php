<?php
// app/Http/Controllers/AuthController.php
 
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
 
class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user,201);
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }
 
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
 
        $user->save();
 
        return response()->json([
            'status' => 'success',
        ]);
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
 
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'status' => 'success',
        ]);
    }
 
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}