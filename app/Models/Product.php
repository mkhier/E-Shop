<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [

        'cat_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'quantity',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_description',
        'meta_keywords',

    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }
}