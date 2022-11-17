<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends Controller
{
    public function viewCategory(){
        if(Auth::id()){
            $categories=Category::where('status','=',0)->get();
            return view('admin.viewcategory',compact('categories'));
        }else{
            return redirect('login');
        }
      
    }
    public function storeCategory(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories'
        ]);

        $category=new Category();
        $category->category_name=$request->category_name;
        $category->save();

        Alert::success('Category Added Successfully','We have added category to the list!!!!');
        return redirect()->back();
    }
    public function deleteCategory($id){
        $category=Category::find($id);
        $category->status='1';
        $category->save();
        Alert::success('Category Deleted Successfully','We have deleted category from the list!!!!');
        return redirect()->back();

    }

    public function addProduct(){
        $categories=Category::where('status','=',0)->get();
        return view('admin.addproduct',compact('categories'));
    }
    public function storeProduct(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
            'category'=>'required',
            'quantity'=>'required',
            'price'=>'required',
        ]);


        $product=new Product();
        $product->title=$request->title;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->product_id=Helper::IDGenerator(new Product,'product_id',5,'PROD');

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imagename);
        $product->image=$imagename;

        $product->save();
        Alert::success('Product Added Successfully','We have added new product to the list!!!!');
        return redirect()->back();


    }

    public function showProduct(){
        $products=Product::where('status','=',0)->get();
        return view('admin.showproduct',compact('products'));
    }

    public function deleteProduct($id){
        $product=Product::find($id);
        $product->status='1';
        $product->save();
        Alert::success('Product Deleted Successfully','We have deleted selected product from the list!!!!');
        return redirect()->back();

    }
    public function editProduct(Request $request,$id){
        
        $product=Product::find($id);
        $categories=Category::where('status','=',0)->get();
        return view('admin.editproduct',compact('product','categories'));
    }

    public function updateProduct(Request $request,$id){

        $product=Product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;

        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $product->image=$imagename;
        }
        $product->save();
        Alert::success('Product Updated Successfully','We have updated product to the list!!!!');
        return redirect()->back();
    }

    public function orderProducts(){
        $order=Order::all();
        return view('admin.orders',compact('order'));
    }
    public function orderDeliver($id){
        $order=Order::find($id);
        $order->delivery_status='delivered';
        $order->payment_status='Paid';
        $order->save();
        Alert::success('Product Delivered Successfully','We have delivered product to the list!!!!');
        return redirect()->back();

    }
    public function downloadDeliver($id){

        $order=Order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }
    public function searchOrder(Request $request){
        $searchText=$request->search;

        $order=Order::where('cust_name','LIKE',"%$searchText%")->
        orWhere('cust_phone','LIKE',"%$searchText%")->orWhere('prod_title','LIKE',"%$searchText%")->
        get();
        return view('admin.orders',compact('order'));

    }
}
