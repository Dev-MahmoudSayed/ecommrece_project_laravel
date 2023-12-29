@extends('admin.layouts.layout')

@section('body')

@include('admin.errors.erorrs')
@include('admin.success.success')

<form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" name="price" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product quantity</label>
        <input type="text" name="qty" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">category Name</label>
        <select name="category_id" id ="Select1" class=" form-control text-white input-small">

          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach

      </select>

      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product image</label>
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection
