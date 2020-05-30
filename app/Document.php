<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable=[
        'title',
        'document1',
        'document2'
    ];
}
