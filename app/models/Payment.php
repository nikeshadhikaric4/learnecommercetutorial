<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[
        'total',
        'payment_type',
        'customer_id',
        'status'
    ];

    public function customer(){
        return $this->belongsTo('App\models\CustomerDetail');
    }

}
