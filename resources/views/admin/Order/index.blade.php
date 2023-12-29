@extends('admin.layouts.layout')

@section('body')

@include('admin.errors.erorrs')
@include('admin.success.success')


<h1>All Orders</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Phone</th>
        <th scope="col">Product Name</th>
        <th scope="col">Image</th>
        <th scope="col">price</th>
        <th scope="col">Quantity</th>
        <th scope="col">payment_status</th>
        <th scope="col">delivery_status</th>
        <th scope="col">Delivered</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($order as $order )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$order->name}}</td>
        <td>{{$order->email}}</td>
        <td>{{$order->address}}</td>
        <td>{{$order->phone}}</td>
        <td>{{$order->product_name}}</td>
        <td><img src="{{asset("storage/$order->image")}}" width="100px" alt="" srcset=""></td>
        <td>{{$order->price}}</td>
        <td>{{$order->qty}}</td>
        <td>{{$order->payment_status}}</td>
        <td>{{$order->delivery_status}}</td>
        <td>

        <form action="{{ route('order.update', ['order' => $order->id]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary">Delivered</button>
        </form>
        </td>
    </tr>
    @endforeach

    </tbody>
  </table>




@endsection

