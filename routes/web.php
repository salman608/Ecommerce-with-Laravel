<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/','FontendController@index')->name('homepage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout','AdminController@Logout')->name('admin.logout');
// =====================Admin route  Category================
Route::get('admin/category','Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories-store','Admin\CategoryController@storeCat')->name('store.category');
Route::get('admin/categories-edit/{cat_id}','Admin\CategoryController@editCat')->name('category.edit');
Route::post('admin/categories-update','Admin\CategoryController@updateCat')->name('update.category');
Route::get('admin/categories-delete/{cat_id}','Admin\CategoryController@deleteCat')->name('category.delete');
Route::get('admin/categories-inactive/{cat_id}','Admin\CategoryController@inactiveCat')->name('category.inactive');
Route::get('admin/categories-active/{cat_id}','Admin\CategoryController@activeCat')->name('category.active');


// =====================Admin route  Brand================
Route::get('admin/brand','Admin\BrandController@index')->name('admin.brand');
Route::post('admin/brands-store','Admin\BrandController@storeBrand')->name('store.brand');
Route::get('admin/brands-edit/{brand_id}','Admin\BrandController@editBrand')->name('edit.brand');
Route::post('admin/brands-update','Admin\BrandController@updateBrand')->name('update.brand');
Route::get('admin/brands-delete/{brand_id}','Admin\BrandController@deleteBrand')->name('delete.brand');
Route::get('admin/brands-inactive/{brand_id}','Admin\BrandController@inactiveBrand')->name('inactive.brand');
Route::get('admin/brands-active/{brand_id}','Admin\BrandController@activeBrand')->name('active.brand');

// =====================Admin route  Products================
Route::get('admin/product','Admin\ProductController@addProduct')->name('admin.add-product');
Route::post('admin/product-store','Admin\ProductController@storeProduct')->name('store.product');
Route::get('admin/product-menage','Admin\ProductController@menageProduct')->name('admin.menage-product');
Route::get('admin/product-edit/{product_id}','Admin\ProductController@editProduct')->name('edit.product');
Route::post('admin/product-update','Admin\ProductController@updateProduct')->name('update.product');
Route::get('admin/product-delete/{product_id}','Admin\ProductController@deleteProduct')->name('delete.product');
Route::get('admin/product-inactive/{product_id}','Admin\ProductController@inactiveProduct')->name('inactive.product');
Route::get('admin/product-active/{product_id}','Admin\ProductController@activeProduct')->name('active.product');

// =============Coupon Route==============
Route::get('admin/coupon','Admin\CouponController@index')->name('admin.coupon');
Route::Post('admin/coupon-store','Admin\CouponController@couponStore')->name('coupon.store');
Route::get('admin/coupon-edit/{coupon_id}','Admin\CouponController@couponEdit')->name('coupon.edit');
Route::post('admin/coupon-update','Admin\CouponController@couponUpdate')->name('coupon.update');
Route::get('admin/coupon-inactive/{coupon_id}','Admin\CouponController@couponInactive')->name('coupon.inactive');
Route::get('admin/coupon-active/{coupon_id}','Admin\CouponController@couponActive')->name('coupon.active');

//================Admin Order Route============
Route::get('admin/order','Admin\orderController@index')->name('admin.orders');
Route::get('admin/order/view/{id}','Admin\orderController@viewOrder')->name('orders-view');

// =====================cart Route================
Route::post('add/to-cart/{product_id}','CartController@addToCart');
Route::get('cart-page','CartController@cartPage')->name('cart-page');
Route::get('cart-remove/{cart_id}','CartController@cartRemove')->name('cart-remove');
Route::post('cart-update/{cart_id}','CartController@cartUpdate')->name('cart-update');
Route::post('coupon-apply','CartController@couponApply')->name('coupon-apply');
Route::get('coupon-remove','CartController@couponDestroy')->name('coupon-remove');

// =====================Wishlist Route================
Route::get('add/wishlist/{product_id}','WishlistController@addWishlist')->name('add-wishlist');
Route::get('wishlist','WishlistController@wishPage')->name('wishlist-page');
Route::get('wishlist-remove/{wishlist_id}','WishlistController@wishDestroy')->name('wishlist-destroy');

// =====================Product Details Route================
Route::get('product-details/{product_id}','FontendController@productDetails')->name('product.details');

// =====================Checkout Route==============
Route::get('checkout','CheckoutController@index')->name('checkout');
Route::post('place/order','OrderController@storeOrder')->name('place-order');
Route::get('order/complete','OrderController@orderComplete')->name('order-complete');

//=============User Controller route=============
Route::get('user/order','UserController@order')->name('user.order');
Route::get('user/order/view/{order_id}','UserController@orderView')->name('user-order-view');


//================Shop Pge Setup==============
Route::get('shop/page','FontendController@shopPage')->name('shop.page');

//===============Categoriwise product show==========
Route::get('category/show/{cat_id}','FontendController@categoryByProduct')->name('categoryByProduct');
