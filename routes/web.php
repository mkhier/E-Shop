<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('category/{slug}', [FrontendController::class, 'view_category']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'view_product']);

Route::get('product-cart', [FrontendController::class, 'product_list_ajax']);
Route::post('search-product', [FrontendController::class, 'search_product']);

Auth::routes();

Route::get('load-cart-data', [CartController::class, 'cart_count']);
Route::get('load-wishlist-count',[WishlistController::class,'wishlist_count']);


Route::post('add-to-cart', [CartController::class, 'add_product']);
Route::post('delete-cart-item', [CartController::class, 'delete_product']);
Route::post('update-cart', [CartController::class, 'update_cart']);

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item',[WishlistController::class,'delete']);

Route::middleware('auth')->group(function () {
    Route::get('cart', [CartController::class, 'view_cart']);

    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'place_order']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::get('wishlist', [WishlistController::class, 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'view_user']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('create-category', [CategoryController::class, 'create']);
    Route::post('store-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('create-product', [ProductController::class, 'create']);
    Route::post('store-product', [ProductController::class, 'store']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'show']);
    Route::put('update-order/{id}', [OrderController::class, 'update']);
    Route::get('order-history', [OrderController::class, 'order_history']);
});
