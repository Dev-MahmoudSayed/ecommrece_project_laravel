<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('front/image')}}s/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/css')}}/bootstrap.css" />
      <!-- font awesome style -->
      <link href="{{asset('front/css')}}/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('front/css')}}/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('front/css')}}/responsive.css" rel="stylesheet" />

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('front.inc.header')
         <!-- end header section -->

       @include('front.success.success')
         <table  class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Image</th>
                <th scope="col">Aciton</th>
              </tr>
            </thead>
            <tbody>
                @php $total =0; @endphp

                @foreach ($cart as $cart )


                <tr>
                    <th>{{$loop->iteration}}</th>

                    <td>{{$cart->product_name}}</td>
                    <td>{{$cart->qty}}</td>
                    <td>{{$cart->price}}</td>
                    <td><img src="{{asset("storage/$cart->image")}}" width="100px" alt="" srcset=""></td>
                    <td>

                      <a href="{{url('remove_cart',$cart->id)}}"  class="btn btn-danger">Remove Product</a>

                    </td>


                </tr>

                @php $total +=$cart->price*$cart->qty; @endphp
                @endforeach

               </tbody>
            </table>

            <div class="ml-5"><a class="btn btn-info">Total Cart Price :{{ $total  }}</a></div>
            <div class="container text-center">


                               <h1>proceed to order</h1>

                               <form action="{{ route('order.store') }}" method="post">
                                @csrf

                                <button type="submit" class="btn btn-danger">Cash On Delivery</button>
                            </form>
                            <h1>
                             <form action="{{ route('paypal') }}" method="post">
                                @csrf
                                <input type="hidden" name="amount" value="{{ $total }}">
                                <button type="submit" class="btn btn-success">Pay Using Card</button>
                            </form>

                            </h1>



            </div>
            <div>





      </div>


      @include('front.inc.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="{{asset('front/js')}}/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="{{asset('front/js')}}/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="{{asset('front/js')}}/bootstrap.js"></script>
      <!-- custom js -->
      <script src="{{asset('front/js')}}/custom.js"></script>
   </body>
</html>

