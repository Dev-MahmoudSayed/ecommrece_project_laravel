@extends('admin.layouts.layout')

@section('body')

@include('admin.errors.erorrs')
@include('admin.success.success')


<form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->name}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" >{{$product->desc}}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" name="price" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->price}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product quantity</label>
        <input type="text" name="qty" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->qty}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">old image</label>
        <img src="{{asset("storage/$product->image")}}" width="100" alt="" srcset="">
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">category Name</label>
        <select name="category_id" id ="Select1" class=" form-control text-white input-small">

          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach

      </select>

      </div>

    <button type="submit" class="btn btn-primary">Updates</button>
  </form>

@endsection
