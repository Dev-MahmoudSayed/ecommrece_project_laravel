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





      <div class="col-sm-6 col-md-4 col-lg-4 " style="margin: auto; width:50%; padding:30px" >
          <div class="box">
              <div class="option_container">

              </div>
              <div class="img-box p-2">
                  <img src="{{asset("storage/$product->image")}}"  alt="" >

              </div>
              <div class="detail-box">
                 <h5>
                    Product Name:   {{$product->name}}
                  </h5>
                  <h6>
                   Product Descraption: {{$product->desc}}
                 </h6>
                 <h6>
                    Product price:   ${{$product->price}}
                 </h6>
                 <h6>
                    Product quantity:  {{$product->qty}}
                 </h6>
                 <form action="{{url('cart',$product->id)}}" method="Post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4" style="width: 100px">
                            <input type="number" name="qty" value="1" min="1">

                        </div>
                        <div class="col-md-4">

                            <input type="submit" value="Add To Cart">
                        </div>

                    </div>

                 </form>
              </div>
           </div>
          </div>






      <!-- footer start -->
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
