<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function item()
    {
        return $this->belongsto(Item::class);
    }
}
