<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;
        $data = Cart::where('user_id','=',$userId)->get();

        foreach($data as $data)
        {
            $order = Order::create([
                'name'=>$data->name,
                'email'=>$data->email,
                'phone'=>$data->phone,
                'address'=>$data->address,
                'user_id'=>$user->id,

                'product_name'=>$data->product_name,
               'price'=>$data->price,
               'image'=>$data->image,
               'product_id'=>$data->id,

               'qty'=>$data->qty,
               'payment_status'=>'cash on deliver',
               'delivery_status'=>'processing'
            ]);

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','We have received your order');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = Order::all();
        return view('admin.Order.index',compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            'delivery_status'=>'delivered'
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
