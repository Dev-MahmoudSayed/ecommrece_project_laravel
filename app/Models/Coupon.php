<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table ='coupons';
    protected $fillable = ['code','type','value','percent_off'];


    public static function findByCode($code) {
        return self::where('code', $code)->first();
    }

    public function discount($total) {
        if($this->type == 'fixed') {
            return $this->value;
        } else if($this->type == 'percent') {
            return ($this->percent_off / 100) * $total;
        } else {
            return 0;
        }
    }
   public function product()
   {
    return $this->belongsToMany(Product::class);
   }
   public function cart()
   {
    return $this->belongsToMany(Cart::class);
   }

}

