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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   </head>
   <style>
    .text-header{
        font-size: 2rem;
        font-weight: bold;
        margin-top:10px;
    }
    label{
        font-size: 1.3rem;
        font-weight: bold;s
    }
    .form-group input{
        color:black;
    }
</style>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        
      <!-- end arrival section -->
         <div class="container">
            <h1 class="text-center text-header">Order List</h1> 

            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delivery Status</th>
                        <th>Action</th>
    
                    </tr>
                </thead>
    
                <tbody>
               @foreach ($order as $item)
                   <tr>
                    <td>{{ $item->prod_title }}</td>
                    <td>{{ $item->prod_quantity }}</td>
                    <td>{{ $item->prod_price }}</td>
                    <td><img src="products/{{ $item->prod_image }}" width="100px"></td>
                    <td>{{ $item->delivery_status }}</td>
                    <td>
                        @if ($item->delivery_status == 'delivered')
                            <p class="text-success">Already delivered</p>
                            @elseif($item->delivery_status == 'canceled')
                           <p class="text-danger">Already canceled</p>
                           @else
                            <a href="{{ route('order.cancel',$item->id) }}" onclick="confirmation(event)" class="btn btn-danger">Cancel Order</a>
                        @endif
                    </td>

                   </tr>
               @endforeach
                   
                </tbody>
            </table>
         </div>
      <!-- product section -->
  
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <script>
        function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect=ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect)
    
            swal({
                title:'Are you sure to cancel this order?',
                text:'You will not be able to recover this!',
                icon:"warning",
                buttons:true,
                dangerMode:true
            })
            .then((willCancel)=>{
                if(willCancel){
                    window.location.href=urlToRedirect
                }
            });
        }
       </script>
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