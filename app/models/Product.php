<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'product_name',
        'price',
        'slug',
        'status',
        'category_id',
        'product_desc'

    ];

    public function category(){
        return $this->belongsTo('App\models\ProductCategory');
    }

    public function productImage(){
        return $this->hasMany('App\models\ProductImage');
    }
}
