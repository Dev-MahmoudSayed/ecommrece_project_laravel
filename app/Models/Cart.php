<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','price','product_id','phone','qty','image','address','user_id','email','product_name'
    ];
    public function Category()
    {
        return $this->belongTo(Category::class);
    }
    public function Product()
    {
        return $this->belongTo(Product::class);
    }
    public function order()
    {
        return $this->belongTo(Order::class);
    }
}
