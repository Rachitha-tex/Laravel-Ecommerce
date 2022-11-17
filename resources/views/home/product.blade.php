<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       @include('sweetalert::alert')
       <div class="row">
       @foreach ($products as $product)
   
          <div class="col-sm-6 col-md-4 col-lg-4">
           
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ route('home.product_details',$product->id) }}" class="option1">
                    Product Details
                     </a>
                     <form action="{{ route('add.cart',$product->id) }}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-md-4" style="width: 100px">
                              <input type="number" name="quantity" value="1" min="1" >

                           </div>
                           <div  class="col-md-4">
                           <input type="submit" value="Add To Cart" >
                         
                           </div>
                        </div>
                    
                     </form>
                  </div>
               </div>
               <div class="img-box">
                  <img src="/products/{{ $product->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $product->title }}
                  </h5>

                  @if ($product->discount_price != null)
                  <h6 style="color: red;">
                 Discount Price:   Rs.{{ $product->discount_price }}
                  </h6>

                  <h6 style="text-decoration:line-through; color:blue; ">
                     Rs.{{ $product->price }}
                  </h6>
                  @else
                  
                  <h6 style="color: blue;">
                     Rs.{{ $product->price }}
                  </h6>
                  @endif
                 
              
               </div>
            </div>
         
      
          </div>
    
       @endforeach
       <div style="margin-top: 10px;">
         {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
       </div>
      </div>
    </div>
 </section>