<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('front.home',compact('products'));
    }

    public function redirect()
    {
        $user_type = Auth::user()->user_type;
        if($user_type =='1')
        {
            return view('admin.home');
        }else
        {
            $products = Product::paginate(3);
            return view('front.home',compact('products'));
        }


    }

    public function product_details($id)
   {
        $product = Product::find($id);
       return view('front.product_details',compact('product'));
   }
   public function add_cart( Request $request ,$id)
   {
        if(Auth::id())
        {
           $user = Auth::user();
           $product = Product::find($id);
            $cart = Cart::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'phone'=>$user->phone,
                'address'=>$user->email,
                'user_id'=>$user->id,

                'product_name'=>$product->name,
               'price'=>$product->price * $request->qty ,
               'image'=>$product->image,
               'product_id'=>$product->id,

               'qty'=>$request->qty,
            ]);
            return redirect()->back();


        }else
        {
            return redirect('login');
        }
   }
   public function show_cart()
   {

    if(Auth::id())
    {

        $id = Auth::user()->id;
        $cart = Cart::where('user_id',"=",$id)->get();

        return view('front.cart',compact('cart'));
    }else
    {
        return redirect('login');
    }


   }
   public function remove_cart($id)
   {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
   }








}
