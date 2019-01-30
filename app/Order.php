<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function table()
    {
        return $this->belongsTo('App\Table', 'table_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
