<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'short_desc',
        'content',
        'price',
        'sale_price',
        'cate_id',
    ];

    public function category(){
        return $this->BelongsTo(Category::class,'cate_id');
    }
    public function productGallaries(){
        return $this->hasMany(ProductGallery::class,'pro_id');
    }
}
