<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\StoreCouponRequest;

class CouponController extends Controller
{
    public function index()
    {
        $coupon = Coupon::all();
        return view('admin.coupons.index',compact('coupon'));
    }
    public function create()
    {
        return view('admin.coupons.create');
    }
    public function store(StoreCouponRequest $request)
    {
        $coupon = $request->validated();
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->percent_off = $request->percent_off;
        $coupon->save();
        return redirect()->route('coupons')->with('success','data inserted success');

    }
    public function delete(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons')->with('success','data deleted success');
    }
    public function check(Request $request)
    {
        $couponCode = $request->input('code');

        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon) {
            // The coupon code is invalid
            return redirect()->back()->with('success' , 'The coupon code is invalid.');
        }

        // The coupon code is valid, you can now apply the discount
        $value = $coupon->value;

        // Calculate the order total after applying the discount
        $cart = Cart::where('user_id',auth()->id())->first();

        $totalPrice = $cart->price;
       $totalPriceWithDiscount = $totalPrice - $value;

        $totalPriceWithDiscount;

        $discount = $value;
        $code = $coupon->code;
        $newTotal = $totalPriceWithDiscount;
       
        session()->put('coupon', [
            'code' => $coupon->code,
            'discount' => $totalPriceWithDiscount,
        ]);
        if ($newTotal < 0) {
            $newTotal = 0;
        }
        return view('front.cart',with(['discount' => $discount,'code' => $code,'newTotal' => $newTotal]));
    }

}
