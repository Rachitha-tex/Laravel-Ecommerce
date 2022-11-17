<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified')->name('admin.home');

Route::get('/',[HomeController::class,'index']);


Route::get('/view-category',[AdminController::class,'viewCategory'])->name('admin.view_category');
Route::post('/view-catgeory',[AdminController::class,'storeCategory'])->name('category.store');
Route::get('/delete-category/{id}',[AdminController::class,'deleteCategory'])->name('category.delete');

Route::get('/add-product',[AdminController::class,'addProduct'])->name('add.product');
Route::post('/add-product',[AdminController::class,'storeProduct'])->name('product.store');
Route::get('/show-product',[AdminController::class,'showProduct'])->name('show.product');
Route::get('/delete-product/{id}',[AdminController::class,'deleteProduct'])->name('delete.product');
Route::get('/edit-category/{id}',[AdminController::class,'editProduct'])->name('edit.product');
Route::post('/update-category/{id}',[AdminController::class,'updateProduct'])->name('product.update');
Route::get('/order-data',[AdminController::class,'orderProducts'])->name('admin.orders');
Route::get('/order-deliver/{id}',[AdminController::class,'orderDeliver'])->name('prod.deliver');
Route::get('/download-deliver/{id}',[AdminController::class,'downloadDeliver'])->name('download.order');
Route::get('/search-order',[AdminController::class,'searchOrder'])->name('order.search');



Route::get('/get-productdetails/{id}',[HomeController::class,'productDetails'])->name('home.product_details');
Route::post('/add-cart/{id}',[HomeController::class,'addToCart'])->name('add.cart');
Route::get('/show-cart',[HomeController::class,'showCart'])->name('show.cart');
Route::get('/remove-cart/{id}',[HomeController::class,'removeCart'])->name('remove.cart');
Route::get('/cash-order',[HomeController::class,'cashDelivery'])->name('cash.order');
Route::get('/show-order',[HomeController::class,'showOrder'])->name('show.order');
Route::get('/cancel-order/{id}',[HomeController::class,'cancelOrder'])->name('order.cancel');
Route::get('/products',[HomeController::class,'product']);