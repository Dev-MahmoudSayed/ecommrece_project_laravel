<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
        @foreach ($products as $product )

        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_details',$product->id)}}" class="option1">
                     Product Details
                      </a>
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
                <div class="img-box">
                    <img src="{{asset("storage/$product->image")}}"  alt="" >

                </div>
                <div class="detail-box">
                   <h5>
                       {{$product->name}}
                    </h5>
                    <h6>
                      ${{$product->price}}
                   </h6>

                </div>
             </div>
            </div>


            @endforeach
            <div class="d-flex justify-content-center mx-auto">
            {{$products->links()}}
        </div>
        </div>
 </section>
