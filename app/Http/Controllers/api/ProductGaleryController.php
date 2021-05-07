<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ProductGaleryController extends Controller
{
    public function store(Request $request){
        $model = new ProductGallery();
        $model->fill($request->all());
        $model->save();
        return response()->json($model);
    }

    public function remove($id){
        $model = ProductGallery::find($id);
        
        $model->delete();
        return response()->json($model);
    }
}
