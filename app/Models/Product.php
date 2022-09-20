<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["name","price", "quantity", "image", "category_id"];




    function category(){
        return $this->belongsTo(Category::class)->withPivot(['amount']);   //this relation will return with object
    }



}
