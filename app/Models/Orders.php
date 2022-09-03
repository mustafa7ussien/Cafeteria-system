<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Orders extends Model
{
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class);   //this relation will return with object
    }
    function products(){
        return $this->belongsToMany(Product::class);   //this relation will return with object
    }
}

