<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function latestOrder()
    {
        return $this->hasOne(Order::class)->latestOfMany();
    }

    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}
