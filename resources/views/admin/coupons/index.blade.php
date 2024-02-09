@extends('admin.layouts.layout')

@section('body')

@include('admin.errors.erorrs')
@include('admin.success.success')


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Coupon Code</th>
        <th scope="col">Coupon type</th>
        <th scope="col">Coupon value</th>
        <th scope="col">Coupon Percent off</th>

        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($coupon as $coupon )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$coupon->code}}</td>
        <td>{{$coupon->type}}</td>
        <td>{{$coupon->value}}</td>
        <td>{{$coupon->percent_off}} %</td>

        <td>
            <form action="{{ route('coupons.delete',['coupon'=>$coupon->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>

        </td>
    </tr>
    @endforeach

    </tbody>
  </table>





@endsection
