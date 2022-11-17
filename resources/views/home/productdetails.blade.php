<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         
         <!-- end slider section -->
     

       <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <img src="/products/{{ $product->image }}" alt="">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h2>{{ $product->title }}</h2>
                   
                </div>
                <div class="row">
                    <h6>Category : {{ $product->category }}</h6>
                </div>
                @if ($product->discount_price != null)
                <div class="row">
                    <h2 class="text-danger">Rs.{{ number_format($product->discount_price,2) }}</h2>
                </div>
                <div class="row">
                    <h2 class="text-primary" style="text-decoration: line-through;">Rs.{{ number_format($product->price,2) }}</h2>
                </div>
                @else
                <div class="row">
                    <h2 class="text-danger">Rs .{{  number_format($product->price,2) }}</h2>
                </div>
                @endif

                <div class="row">
                    Description : <p class="text-default" style="font-weight:bold;">{{ $product->description }}</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                     <p>   Available :<span style="font-weight: bold;"> {{ $product->quantity }}</span></p>
                    </div>
                    <div class="col-md-6">
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
              
            </div>
        </div>
       </div>

      <!-- why section -->
      <!-- end why section -->
      
      <!-- arrival section -->
      <!-- end arrival section -->
      
      <!-- product section -->
      <!-- end product section -->

      <!-- subscribe section -->
      <!-- end subscribe section -->
      <!-- client section -->
      <!-- end client section -->
      <!-- footer start -->
    @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
   </body>
</html>