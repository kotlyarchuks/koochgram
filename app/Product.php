<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/products/{$this->id}";
    }

    public function getPriceAttribute($value)
    {
        return $value / 100;
    }
}
