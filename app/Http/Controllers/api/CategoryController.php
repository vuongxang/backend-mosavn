<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $cates = Category::orderBy('created_at','DESC')->paginate($request->pagesize);
        $cates->load('products');
        return response()->json($cates);
    }

    public function getAll(){
        $cates = Category::orderBy('created_at','DESC')->get();
        $cates->load('products');
        return response()->json($cates);
    }

    public function detail($id){
        $model = Category::find($id);
        $model->load('products');
        return response()->json($model);
    }

    public function store(Request $request){
        $model = new Category();
        $model->fill($request->all());
        $model->save();
        return response()->json($model);
    }

    public function update($id,Request $request){
        $model = Category::find($id);
        $model->fill($request->all());
        $model->save();
        return response()->json($model);
    }

    public function remove($id){
        Product::where('cate_id', $id)->delete();
        $model = Category::find($id);
        Category::destroy($id);
        
        return response()->json($model);
    }
}
