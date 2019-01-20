<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
