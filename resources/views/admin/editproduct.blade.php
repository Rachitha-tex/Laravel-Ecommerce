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
                    <h1 class="text-white text-header">Update Products</h1>
                </div>
                @include('sweetalert::alert')
                <div class="conatiner">
                    <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                     <input type="hidden" name="id" value="{{ $product->id }}" >

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Name </label>
                                    <input type="text" name="title" class="form-control" placeholder="title...." value="{{ $product->title }}">
                                </div>
                          
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Description </label>
                                    <input type="text" name="description" class="form-control" placeholder="description...." value="{{ $product->description }}">
                                </div>
                 
                            </div>
    
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Discount Price </label>
                                    <input type="number" name="discount_price" class="form-control" placeholder="Discount.... " value="{{ $product->discount_price }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category </label>
                                    <select name="category" id="" class="form-control">
                                        <option value="{{ $product->category }}" selected="">{{  $product->category }}</option> 
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                        </div>
    
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Quantity </label>
                                    <input type="number" name="quantity" class="form-control" placeholder="quantity...."value="{{ $product->quantity }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Price </label>
                                    <input type="number" name="price" class="form-control" placeholder="description...."value="{{ $product->price }}">
                                </div>
                     
                            </div>
    
                        </div>
    
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Uploaded Image</label>
                                    <img src="/products/{{$product->image}}" alt="" srcset="" height="100px" width="100px">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Image </label>
                                    <input type="file" name="image" class="form-control" placeholder="title....">
                                </div>
                            </div>
                        </div>
    
                        <button class="btn btn-primary w-50" type="submit">Update Product</button>
                    </form>
                   
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.js')
  </body>
</html>