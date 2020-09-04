<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    protected $fillable = [
        'name','category_id','count','price'
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
