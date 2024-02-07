<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','price','category_id','desc','qty','image','id'
    ];

    public function Category()
    {
        return $this->belongTo(Category::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
