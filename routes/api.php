<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::get('user',[UserController::class,'userInfo'])->middleware('auth:api');


Route::get('category',[CategoryController::class,'index']);
Route::get('category/{id}',[CategoryController::class,'detail']);
Route::post('category',[CategoryController::class,'store']);
Route::put('category/{id}',[CategoryController::class,'update']);
Route::delete('category/{id}',[CategoryController::class,'remove']);

Route::get('product',[ProductController::class,'index']);
