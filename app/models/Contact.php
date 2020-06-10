<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=[
        'location',
        'email',
        'address',
        'phone'
    ];

}
