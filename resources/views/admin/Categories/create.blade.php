@extends('admin.layouts.layout')

@section('body')

@include('admin.errors.erorrs')
@include('admin.success.success')

<form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name</label>
      <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
    </div>




    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection
