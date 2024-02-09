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
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function order()
    {
        return $this->belongTo(Order::class);
    }
    public function coupons()
   {
    return $this->belongsToMany(Coupon::class);
   }
   public function getTotalPrice()
{
    $total = 0;

    // Loop through each product in the cart
    foreach ($this->products as $product) {
        // Add the product's price multiplied by its quantity to the total
        $total += $product->price * $product->quantity;
    }

    return $total;
}
}
