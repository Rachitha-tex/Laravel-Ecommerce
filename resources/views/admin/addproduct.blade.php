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
                    <h1 class="text-white text-header">Add Products</h1>
                </div>
                @include('sweetalert::alert')
                <div class="conatiner">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Name </label>
                                    <input type="text" name="title" class="form-control" placeholder="title....">
                                </div>
                                @error('title')
                                   <p class="text-danger my-3">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Description </label>
                                    <input type="text" name="description" class="form-control" placeholder="description....">
                                </div>
                                @error('description')
                               <p class="text-danger my-3">{{ $message }}</p> 
                            @enderror
                            </div>
    
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Image </label>
                                    <input type="file" name="image" class="form-control" placeholder="title....">
                                </div>
                                @error('image')
                               <p class="text-danger my-3">{{ $message }}</p> 
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category </label>
                                    <select name="category" id="" class="form-control">
                                        <option value="">----choose category----</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option> 
                                        @endforeach
                                    </select>
                                    @error('category')
                                   <p class="text-danger my-3">{{ $message }}</p> 
                                @enderror
                                </div>
                            </div>
    
                        </div>
    
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Quantity </label>
                                    <input type="number" name="quantity" class="form-control" placeholder="quantity....">
                                </div>
                                @error('quantity')
                               <p class="text-danger my-3">{{ $message }}</p> 
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Price </label>
                                    <input type="number" name="price" class="form-control" placeholder="description....">
                                </div>
                                @error('price')
                               <p class="text-danger my-3">{{ $message }}</p> 
                            @enderror
                            </div>
    
                        </div>
    
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Discount Price </label>
                                    <input type="number" name="discount_price" class="form-control" placeholder="Discount....">
                                </div>
                            </div>
                        </div>
    
                        <button class="btn btn-primary w-50" type="submit">Add Product</button>
                    </form>
                   
                </div>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.js')
  </body>
</html>