@extends('admin.layouts.layout')

@section('body')

@include('admin.errors.erorrs')
@include('admin.success.success')



<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Desc</th>
        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->qty}}</td>
        <td>{{$product->desc}}</td>
        <td><img src="{{asset("storage/$product->image")}}" width="100px" alt="" srcset=""></td>
        <td>
            <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
            <h1>
                <a class="btn btn-success" href="{{ route('product.edit', ['product' => $product->id]) }}" >edit</a>
            </h1>
        </td>
    </tr>
    @endforeach

    </tbody>
  </table>




@endsection
