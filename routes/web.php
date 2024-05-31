<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Account\AuthController;
use App\Http\Controllers\Account\CartController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Blog\PostsController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckConfirm;
use App\Http\Middleware\CheckLoginConfirm;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::middleware([CheckLoginConfirm::class])->group(function () {
        Route::view('/login', 'account.login')->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    Route::middleware([CheckConfirm::class])->group(function () {
        Route::get('/confirm', [AuthController::class, 'confirmPage'])->name('confirm');
        Route::post('/confirm', [AuthController::class, 'confirm']);
        Route::get('/confirm/cancel', [AuthController::class, 'confirmCancel'])->name('confirm.cancel');
        Route::get('/confirm/resend', [AuthController::class, 'confirmResend'])->name('confirm.resend');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::post('/account/address/delete/{id}', [AccountController::class, 'deleteAddress'])->name('account.address.delete');
    Route::post('/account/address/edit/{id}', [AccountController::class, 'editAddress'])->name('account.address.edit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::post('/cart/add/{product_id}/{quantity}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/remove/{product_id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::post('/cart/update/', [CartController::class, 'updateCart'])->name('updateCart');
Route::get('/cart/сlear', [CartController::class, 'clearCart'])->name('clearCart');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'create'])->name('checkout.create');

Route::get('/checkout/follow/{id}', [OrderController::class, 'follow'])->name('checkout.follow');

Route::get('/posts', [PostsController::class, 'posts'])->name('posts');
Route::get('/post/{id}', [PostsController::class, 'post'])->name('post');
Route::get('/posts/search', [PostsController::class, 'search'])->name('posts.search');

Route::get('/product/{id}', [ProductsController::class, 'product'])->name('product');
Route::post('/product/{id}/review', [ProductsController::class, 'review'])->name('product.review');

Route::get('/products/category/{id}', [ProductsController::class, 'products'])->name('products.category');
Route::get('/products/search', [ProductsController::class, 'search'])->name('products.search');
Route::get('/products/country/{id}', [ProductsController::class, 'country'])->name('products.country');
Route::get('/products/manufacturer/{id}', [ProductsController::class, 'manufacturer'])->name('products.manufacturer');

Route::view('/terms', 'terms')->name('terms');
Route::view('/contact', 'contact')->name('contact');
Route::view('/about', 'about')->name('about');

Route::post('/city', [MainController::class, 'changeCity'])->name('city');
Route::post('/call', [MainController::class, 'call'])->name('call');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');

Route::middleware([CheckAdminRole::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/admin/users/', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/online', [AdminController::class, 'online'])->name('admin.users.online');

    Route::get('/admin/orders', [OrderAdminController::class, 'orders'])->name('admin.orders');

    Route::get('/admin/products', [ProductAdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/product/add/', [ProductAdminController::class, 'add'])->name('admin.product.add');
    Route::get('/admin/product/add/save', [ProductAdminController::class, 'addSave'])->name('admin.product.add.save');
    Route::get('/admin/product/edit/{id}', [ProductAdminController::class, 'edit'])->name('admin.product.edit');
    Route::post('/admin/product/edit/save/{id}', [ProductAdminController::class, 'editSave'])->name('admin.product.edit.save');
    Route::post('/admin/product/on/{id}', [ProductAdminController::class, 'on'])->name('admin.product.on');
    Route::post('/admin/product/off/{id}', [ProductAdminController::class, 'off'])->name('admin.product.off');
    Route::post('/admin/product/delete/{id}', [ProductAdminController::class, 'delete'])->name('admin.product.delete');
    Route::post('/admin/product/upload/image', [ProductAdminController::class, 'upload'])->name('upload.file');
    Route::get('/admin/product/reviews', [AdminController::class, 'reviews'])->name('admin.product.reviews');

    Route::get('/admin/categories', [CategoryAdminController::class, 'categories'])->name('admin.categories');
    Route::post('/admin/category/on/{id}', [CategoryAdminController::class, 'on'])->name('admin.category.on');
    Route::post('/admin/category/off/{id}', [CategoryAdminController::class, 'off'])->name('admin.category.off');
});
