<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\ProductGaleryController;
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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup',  [AuthController::class,'signup']);
    Route::post('register',[AuthController::class,'register']);
   
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::delete('logout', [AuthController::class,'loguot']);
        Route::get('me', [AuthController::class,'user']);
    });
});

// Route::post('register',[UserController::class,'register']);
// Route::post('login',[UserController::class,'login']);
// Route::get('user',[UserController::class,'userInfo'])->middleware('auth:api');
// Route::get('logout',[UserController::class,'logout'])->middleware('auth:api');

Route::get('category',[CategoryController::class,'index'])->middleware('auth:api');
Route::get('category/list',[CategoryController::class,'getAll']);
Route::get('category/{id}',[CategoryController::class,'detail']);
Route::post('category',[CategoryController::class,'store'])->middleware('auth:api');;
Route::put('category/{id}',[CategoryController::class,'update'])->middleware('auth:api');;
Route::delete('category/{id}',[CategoryController::class,'remove'])->middleware('auth:api');;

Route::get('product',[ProductController::class,'index']);
Route::delete('product/{id}',[ProductController::class,'remove']);
Route::get('product/{id}',[ProductController::class,'detail']);
Route::post('product',[ProductController::class,'store']);
Route::put('product/{id}',[ProductController::class,'update']);

Route::post('product-galery',[ProductGaleryController::class,'store']);
Route::delete('product-galery/{id}',[ProductGaleryController::class,'remove']);

