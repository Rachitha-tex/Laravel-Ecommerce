<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;


use RealRashid\SweetAlert\Facades\Alert;



class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype == '1'){
            $totalProducts=Product::all()->count();
            $totalOrders=Order::all()->count();
            $totalUsers=User::where('usertype','=',0)->count();
            $order=Order::all();

            $orderDelivered=Order::where('delivery_status','=','delivered')->get()->count();
            $orderProcessing=Order::where('delivery_status','=','processing')->get()->count();


            $total_revenue=0;

            foreach($order as $order)
            {
                $total_revenue=$total_revenue + $order->prod_price;
            }

            return view('admin.home',compact('totalProducts','totalUsers','totalOrders','total_revenue','orderDelivered','orderProcessing'));
        }else{
            $products=Product::where('status','=','0')->paginate(9);
            return view('home.userpage',compact('products'));
        }
    }
    public function index(){
        $products=Product::where('status','=','0')->paginate(9);
        return view('home.userpage',compact('products'));
    }
    public function productDetails($id){

        $product=Product::find($id);
        return view('home.productdetails',compact('product'));
    }
    public function addToCart(Request $request,$id){

        if(Auth::id()){

            $user=Auth::user();
            $userID=$user->id;

            $product=Product::find($id);

            $product_exist=Cart::where('prod_id','=',$id)->where('user_id','=',$userID)->get('id')->first();

            if($product_exist){

                $cart=Cart::find($product_exist)->first();
                $quantity=$cart->prod_quantity;
                $cart->prod_quantity=$quantity+$request->quantity;

                if($product->discount_price != null){
                    $cart->prod_price=$product->discount_price * $cart->prod_quantity;
                  }else{
                      $cart->prod_price=$product->price  * $cart->prod_quantity;
                  }
         

                $cart->save();

                Alert::success('Product Added to cart Successfully','We have added product to the cart!!!!');
                return redirect()->back();
            }
            else{
                $cart=new Cart();

                $cart->cust_name=$user->name;
                $cart->cust_email=$user->email;
                $cart->cust_address=$user->address;
                $cart->cust_phone=$user->phone;
                $cart->prod_title=$product->title;
                $cart->prod_quantity=$request->quantity;
    
                if($product->discount_price != null){
                  $cart->prod_price=$product->discount_price * $request->quantity;
                }else{
                    $cart->prod_price=$product->price  * $request->quantity;
                }
       
                $cart->prod_image=$product->image;
                $cart->prod_id=$product->id;
                $cart->user_id=$user->id;
    
                $cart->save();
    
                Alert::success('Product Added to cart Successfully','We have added product to the cart!!!!');
                return redirect()->back();
    
            }
        }else{

            return redirect('login');
        }


    }

    public function showCart(){
        if(Auth::id()){
            $id = Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
    
            return view('home.showcart',compact('cart'));
        }else{
            return redirect('login');
        }
     
    }
    public function removeCart($id){
        $cart=Cart::find($id);
        $cart->delete();

        Alert::success('Product Deleted from cart Successfully','We have deleted product from the cart!!!!');
        return redirect()->back();
    }

    public function cashDelivery(){

        $user=Auth::user();

        $userID=$user->id;

        $data=Cart::where('user_id','=',$userID)->get();

        foreach($data as $data){
            $order=new Order();
            $order->cust_name=$data->cust_name;
            $order->cust_email=$data->cust_email;
            $order->cust_address=$data->cust_address;
            $order->cust_phone=$data->cust_phone;
            $order->prod_title=$data->prod_title;
            $order->prod_quantity=$data->prod_quantity;
            $order->prod_price=$data->prod_price;
            $order->prod_image=$data->prod_image;
            $order->prod_id=$data->prod_id;
            $order->user_id=$data->user_id;
            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;

            $cart=Cart::find($cart_id);
            $cart->delete();
        }
        Alert::success('Product ordered Successfully','We have ordered product from the cart!!!!');
        return redirect()->back();
    }

    public function showOrder(){
        if(!Auth::id()){
            return redirect('login');
        }else{

            $user=Auth::user();

            $userId=$user->id;
        
            $order=Order::where('user_id','=',$userId)->get();
            return view('home.order',compact('order'));

        }
    }

    public function cancelOrder($id){
        $order=Order::find($id);
        $order->delivery_status='canceled';
        $order->save();

        Alert::success('Product order canceled Successfully','We have canceled product from the order!!!!');
        return redirect()->back();
    }

    public function product(){


        return view('home.all_products');
    }
}
