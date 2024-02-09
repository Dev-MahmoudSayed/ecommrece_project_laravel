@extends('admin.layouts.layout')

@section('body')

@include('admin.errors.erorrs')
@include('admin.success.success')

<form method="POST" action="{{ route('coupons.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Coupon Code</label>
      <input type="text" name="code" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">type</label>
        <select name="type" id ="Select1" class=" form-control text-white input-small">
            @foreach(\App\Enums\Type::cases() as $type)
            <option value="{{ $type->value }}">{{ $type->name }}</option>
            @endforeach

        </select>


    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Coupon Value</label>
        <input type="number" name="value" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Coupon percent_off</label>
        <input type="text" name="percent_off" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection
