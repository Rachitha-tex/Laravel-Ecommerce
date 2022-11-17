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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   </head>
   <body>
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
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
      

      <div class="conatiner"> 
        <h1 class="text-center text-header">Cart Details</h1>

        @include('sweetalert::alert')
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                <?php  
                    $totalprice=0;
                    
                    ?>
                @foreach ($cart as $item)
                <tr>
                    <td>{{ $item->prod_title}}</td>
                    <td>{{ $item->prod_quantity }}</td>
                    <td>{{ number_format($item->prod_price,2)  }}</td>
                    <td><img src="/products/{{ $item->prod_image }}" alt="" width="70px"></td>
                    <td>
                        <a href="{{ route('remove.cart',$item->id) }}" onclick="confirmation(event)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> 
                    </td>
                </tr>
                <?php $totalprice=$totalprice + $item->prod_price  ?>
                @endforeach
               
            </tbody>
        </table>

        <div class="my-4">
            <h1 class="float-right m-4" style="font-size: 1.3rem;">Total Price : {{ $totalprice }}.00</h1>
        </div>

     

      </div>
      <div class="m-4">
        <h1 class="text-header">Order Products :</h1>
        <a href="{{ route('cash.order') }}" class="btn btn-danger">Cash on Delivery</a>
        <a href="" class="btn btn-danger">Pay using Card </a>
    </div>
      <!-- why section -->
          
      <!-- footer start -->
    @include('home.footer')
      <!-- footer end -->
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
                title:'Are you sure to cancel this product?',
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