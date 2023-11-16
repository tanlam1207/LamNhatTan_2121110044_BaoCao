<?php

use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\backend\ProductSaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\Backend\ImportController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PagesController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SlideController;
use App\Http\Controllers\backend\TopicController;
use App\Models\Orderdetail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[SiteController::class,'index'])->name('site.home');
Route::get('/san-pham',[SiteController::class,'product'])->name("site.product");
Route::get('/get-products-by-category/{categoryId}', [SiteController::class,'getProductsByCategory'])->name('getProductsByCategory');
Route::get('/get-products-by-brand/{brandId}', [SiteController::class,'getProductsByBrand'])->name('getProductsByBrand');
Route::get('/get-products-by-price', [SiteController::class,'getProductsByPrice'])->name('getProductsByPrice');

Route::get('/get-all-products', [SiteController::class, 'getAllProducts'])->name('getAllProducts');
//Admin Login
Route::get('/admin/login',[AuthController::class,'getlogin'])->name('admin.login');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('admin.postLogin');
Route::prefix('admin')->middleware('loginAdmin')->group(function () { 
    Route::get('/get-product-price/{id}', [ProductController::class,'getProductPrice'])->name('get-product-price');

    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/admin/logout',[AuthController::class,'logout'])->name('admin.logout');
    Route::get('brand/trash',[BrandController::class,'trash'])->name('brand.trash');
    Route::get('brand/destroys/{brand}',[BrandController::class,'destroys'])->name('brand.destroys');
    Route::get('brand/delete/{brand}',[BrandController::class,'delete'])->name('brand.delete');
    Route::get('brand/restore/{brand}',[BrandController::class,'restore'])->name('brand.restore');
    Route::get('brand/status/{brand}',[BrandController::class,'status'])->name('brand.status');
    Route::resource('category', CategoryController::class);
    Route::get('category/trash/trash',[CategoryController::class,'trashh'])->name('category.trash');
    Route::get('category/destroys/{category}',[CategoryController::class,'destroys'])->name('category.destroys');
    Route::get('category/delete/{category}',[CategoryController::class,'delete'])->name('category.delete');
    Route::get('category/restore/{category}',[CategoryController::class,'restore'])->name('category.restore');
    Route::get('category/status/{category}',[CategoryController::class,'status'])->name('category.status');
    Route::resource('contact', ContactController::class);
    Route::get('contact/trash/trash',[ContactController::class,'trash'])->name('contact.trash');
    Route::get('contact/destroys/{contact}',[ContactController::class,'destroys'])->name('contact.destroys');
    Route::get('contact/delete/{contact}',[ContactController::class,'delete'])->name('contact.delete');
    Route::get('contact/restore/{contact}',[ContactController::class,'restore'])->name('contact.restore');
    Route::get('contact/status/{contact}',[ContactController::class,'status'])->name('contact.status');
    Route::resource('customer', CustomerController::class);
    Route::get('customer/trash/trash',[CustomController::class,'trash'])->name('customer.trash');
    Route::get('customer/destroys/{customer}',[CustomController::class,'destroys'])->name('customer.destroys');
    Route::get('customer/delete/{customer}',[CustomController::class,'delete'])->name('customer.delete');
    Route::get('customer/restore/{customer}',[CustomController::class,'restore'])->name('customer.restore');
    Route::get('customer/status/{customer}',[CustomController::class,'status'])->name('customer.status');
    Route::resource('product', ProductController::class);   
   
    Route::get('product/trash/trash',[ProductController::class,'trash'])->name('product.trash');
    Route::get('product/destroys/{product}',[ProductController::class,'destroys'])->name('product.destroys');
    Route::get('product/delete/{product}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('product/restore/{product}',[ProductController::class,'restore'])->name('product.restore');
    Route::get('product/status/{product}',[ProductController::class,'status'])->name('product.status');

    Route::resource('page', PagesController::class);
    Route::resource('slider', SlideController::class);
    Route::get('slider/trash/trash',[SlideController::class,'trash'])->name('slider.trash');
    Route::get('slider/destroys/{slider}',[SlideController::class,'destroys'])->name('slider.destroys');
    Route::get('slider/delete/{slider}',[SlideController::class,'delete'])->name('slider.delete');
    Route::get('slider/restore/{slider}',[SlideController::class,'restore'])->name('slider.restore');
    Route::get('slider/status/{slider}',[SlideController::class,'status'])->name('slider.status');
    Route::resource('menu', MenuController::class);
    Route::get('menu/trash/trash',[MenuController::class,'trash'])->name('menu.trash');
    Route::get('menu/destroys/{menu}',[MenuController::class,'destroys'])->name('menu.destroys');
    Route::get('menu/delete/{menu}',[MenuController::class,'delete'])->name('menu.delete');
    Route::get('menu/restore/{menu}',[MenuController::class,'restore'])->name('menu.restore');
    Route::get('menu/status/{menu}',[MenuController::class,'status'])->name('menu.status');
    Route::resource('post', PostController::class);
    Route::get('post/trash/trash',[PostController::class,'trash'])->name('post.trash');
    Route::get('post/destroys/{post}',[PostController::class,'destroys'])->name('post.destroys');
    Route::get('post/delete/{post}',[PostController::class,'delete'])->name('post.delete');
    Route::get('post/restore/{post}',[PostController::class,'restore'])->name('post.restore');
    Route::get('post/status/{post}',[PostController::class,'status'])->name('post.status');
    Route::resource('order', OrderController::class);
    Route::get('order/trash/trash',[OrderController::class,'trash'])->name('order.trash');
    Route::get('order/destroys/{order}',[OrderController::class,'destroys'])->name('order.destroys');
    Route::get('order/delete/{order}',[OrderController::class,'delete'])->name('order.delete');
    Route::get('order/restore/{order}',[OrderController::class,'restore'])->name('order.restore');
    Route::get('order/status/{order}',[OrderController::class,'status'])->name('order.status');
    Route::resource('orderdetail', Orderdetail::class);
    Route::resource('topic', TopicController::class);
    Route::get('topic/trash/trash',[TopicController::class,'trash'])->name('topic.trash');
    Route::get('topic/destroys/{topic}',[TopicController::class,'destroys'])->name('topic.destroys');
    Route::get('topic/delete/{topic}',[TopicController::class,'delete'])->name('topic.delete');
    Route::get('topic/restore/{topic}',[TopicController::class,'restore'])->name('topic.restore');
    Route::get('topic/status/{topic}',[TopicController::class,'status'])->name('topic.status');
    Route::resource('banner', BannerController::class);
    Route::get('banner/trash/trash',[BannerController::class,'trash'])->name('banner.trash');
    Route::get('banner/destroys/{banner}',[BannerController::class,'destroys'])->name('banner.destroys');
    Route::get('banner/delete/{banner}',[BannerController::class,'delete'])->name('banner.delete');
    Route::get('banner/restore/{banner}',[BannerController::class,'restore'])->name('banner.restore');
    Route::get('banner/status/{banner}',[BannerController::class,'status'])->name('banner.status');
    Route::resource('import', ImportController::class);
    Route::get('import/trash/trash',[ImportController::class,'trash'])->name('import.trash');
    Route::get('import/destroys/{import}',[ImportController::class,'destroys'])->name('import.destroys');
    Route::get('import/delete/{import}',[ImportController::class,'delete'])->name('import.delete');
    Route::get('import/restore/{import}',[ImportController::class,'restore'])->name('import.restore');
    Route::get('import/status/{import}',[ImportController::class,'status'])->name('import.status');
    Route::resource('productsale', ProductSaleController::class);
    Route::get('productsale/destroys/{productsale}',[ProductSaleController::class,'destroys'])->name('productsale.destroys');


    Route::resource('brand', BrandController::class);
    
});
Route::get('{slug}',[SiteController::class,'index'])->name('site.slug');
