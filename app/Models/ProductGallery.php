<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'pro_id',
    ];

    public function product(){
        return $this->BelongsTo(Product::class,'pro_id');
    }
}
