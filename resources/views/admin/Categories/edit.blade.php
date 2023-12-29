@extends('admin.layouts.layout')

@section('body')

@include('admin.errors.erorrs')
@include('admin.success.success')


<form method="POST" action="{{route('category.update',['category'=>$category->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name</label>
      <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->name}}">
    </div>




    <button type="submit" class="btn btn-primary">Updates</button>
  </form>

@endsection
