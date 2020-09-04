<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_succes extends Model
{
    protected $fillable = [
        'name','category_id','img','price'
    ];
}
