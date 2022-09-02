<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
<<<<<<< HEAD
use App\Models\Orders;
=======
>>>>>>> 9588aa0576a12669146d76fe2177423079ed6232

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["name","price", "quantity", "image", "category_id"];

<<<<<<< HEAD
    function category(){
        return $this->belongsTo(Category::class);   //this relation will return with object
    }
    function Orders(){
        return $this->belongsToMany(Orders::class);   //this relation will return with object
    }


=======



    function category(){
        return $this->belongsTo(Category::class);   //this relation will return with object
    }
>>>>>>> 9588aa0576a12669146d76fe2177423079ed6232
}
