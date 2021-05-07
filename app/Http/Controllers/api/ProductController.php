<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $models = Product::orderBy($request->sort,$request->order)->where('name','like','%'.$request->keyword.'%')->paginate($request->pagesize);
        $models->load('category');
        $models->load('productGallaries');
        return response()->json($models);
    }

    public function store(Request $request){
        $model = new Product();
        $model->fill($request->all());
        $model->save();
        return response()->json($model);
    }

    public function detail($id){
        $model = Product::find($id);
        $model->load('category');
        $model->load('productGallaries');
        return response()->json($model);
    }

    public function remove($id){
        ProductGallery::where('pro_id', $id)->delete();
        $model = Product::find($id);
        
        $model->delete();
        return response()->json($model);
    }

    public function update($id,Request $request){
        $model = Product::find($id);
        $model->fill($request->all());
        $model->save();
        return response()->json($model);
    }
}
