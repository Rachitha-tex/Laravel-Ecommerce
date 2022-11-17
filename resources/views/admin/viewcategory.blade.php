<!DOCTYPE html>
<html lang="en">

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
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   @include('admin.css')
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


                <div class="text-center">
                    <h1 class="text-white text-header">Add Category</h1>
                </div>
                <div class="container">
                    @include('sweetalert::alert')
                    <div class="row mt-5">
                        <div class="col-md-10">
                            <form action="{{ route('category.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="">Category Name :</label>
                                    <input type="text" name="category_name" placeholder="Enter category name..." class="form-control">
                                    @error('category_name')
                                       <p class="text-danger my-3">{{ $message }}</p> 
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>


                    <h1 class="text-center text-header">All Categories</h1>

                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                  <a href="{{ route('category.delete',$category->id) }}" onclick="confirmation(event)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                          
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
            title:'Are you sure to cancel this category?',
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