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
    </style>
   @include('admin.css')
  </head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
       @include('admin.sidebar')
      <!-- partial -->
  @include('admin.header')
        <!-- partial -->
        
        @include('sweetalert::alert')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="conatiner"> 
                    <h1 class="text-center text-header">Total Orders</h1>

                    <form action="{{ route('order.search') }}" method="GET" class="float-right my-4">
                        @csrf
                        <input type="text" name="search" placeholder="Search for anything...." style="color: black;">
                        <input type="submit" value="Search" class="btn btn-outline-primary" height="100px">
                    </form>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                             
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Delivered</th>
                                <th>Print PDF</th>
    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order as $item)
                            <tr>
                              <td>{{ $item->cust_name }}</td>
                              <td>{{ $item->cust_email }}</td>
                 
                              <td>{{ $item->prod_title }}</td>
                              <td>{{ $item->prod_quantity }}</td>
                              <td>{{ $item->prod_price }}</td>
                              <td>{{ $item->payment_status }}</td>
                              <td>{{ $item->delivery_status }}</td>
                              <td>
                                @if ($item->delivery_status == 'delivered')
                              
                                <p>Delivered</p>

                                @else
                                <a href="{{ route('prod.deliver',$item->id) }}" onclick="confirmation(event)" class="btn btn-primary">Delivered</a>
                                @endif
                                </td>
                                <td>
                                 <a href="{{ route('download.order',$item->id) }}" class="btn btn-secondary">Download PDF</a>   
                                </td>
                            </tr> 

                            @empty
                          <tr>
                            <td colspan="16">No data found</td>
                          </tr>
                            @endforelse
                     
                        
                      
                          
                        </tbody>
                    </table>

                </div>
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
            title:'Are you sure to deliver this product?',
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