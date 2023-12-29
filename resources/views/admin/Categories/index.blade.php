@extends('admin.layouts.layout')

@section('body')

@include('admin.errors.erorrs')
@include('admin.success.success')



<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        
        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$category->name}}</td>

        <td>
            <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
            <h1>
                <a class="btn btn-success" href="{{ route('category.edit', ['category' => $category->id]) }}" >edit</a>
            </h1>
        </td>
    </tr>
    @endforeach

    </tbody>
  </table>




@endsection
