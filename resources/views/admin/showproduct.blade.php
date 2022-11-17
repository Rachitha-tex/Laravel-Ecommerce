<!DOCTYPE html>
<html lang="en">
  <head>
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
        table th{
            color: white;
            font-weight: bold;
        }
        table td{
            color: white;
        }
        .img-size{
            width: 200px
        }
    </style>
   @include('admin.css')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
       @include('admin.sidebar')
      <!-- partial -->
  @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="text-center text-header">All Products</h1>

                @include('sweetalert::alert')
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Image</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($products as $product)
                       <tr>
                           <td>{{ $product->id }}</td>
                           <td>{{ $product->title }}</td>
                           <td>{{ $product->description }}</td>
                           <td>{{ $product->quantity }}</td>
                           <td>{{ $product->category }}</td>
                           <td>{{ $product->price }}</td>
                           <td>{{ $product->discount_price }}</td>
                           <td><img src="products/{{ $product->image }}" class="img-size"></td>
                        <td>
                          <a href="{{ route('edit.product',$product->id) }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square "></i></a> 
                          <a href="{{ route('delete.product',$product->id) }}" onclick="confirmation(event)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> 
                        </td>
                    </tr>  
                       @endforeach
                    
                  
                      
                    </tbody>
                </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.js')
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
  </body>
</html>