<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','price','category_id','desc','qty','image'
    ];

    public function Category()
    {
        return $this->belongTo(Category::class);
    }
}
