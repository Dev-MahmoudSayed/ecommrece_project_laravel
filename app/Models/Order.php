<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','price','product_id','phone','qty','image','address','user_id','email','product_name', 'delivery_status','payment_status'
    ];
     public function Product()
    {
        return $this->hasMany(Product::class);
    }
    public function Category()
    {
        return $this->belongTo(Category::class);
    }
    public function User()
    {
        return $this->belongTo(User::class);
    }
}

