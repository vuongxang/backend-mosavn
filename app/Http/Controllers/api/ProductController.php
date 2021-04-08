<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $models = Product::orderBy('created_at','DESC')->paginate(10);
        $models->load('category');
        return response()->json($models);
    }
}
