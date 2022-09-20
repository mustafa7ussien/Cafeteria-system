<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ["status" , "notes" , "price" , "room" , "user_id"];

    function user(){
        return $this->belongsTo(User::class);   //this relation will return with object
    }
    function product(){
        return $this->belongsToMany(Product::class)->withPivot(['amount']);   //this relation will return with object
    }
    // belongsToMany
}

