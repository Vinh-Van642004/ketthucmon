<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::get('/index', [ClothesController::class, 'index'])->name('index');

Route::get('/dangky', [UserController::class, 'showRegistrationForm']);
Route::post('/dangky', [UserController::class, 'register']);

Route::get('/dangnhap', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/dangnhap', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');




Route::get('/view', function () {
    return view('contact');
});


Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/view', [CartController::class, 'view'])->name('cart.view');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/product/{id}', [ClothesController::class, 'showProduct'])->name('product.show');

// Add these routes to your web.php
Route::get('/checkout', [ClothesController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [ClothesController::class, 'placeOrder'])->name('order.place');
Route::post('/checkout', [ClothesController::class, 'submitOrder'])->name('checkout.submit');
Route::get('/contact', function () {
    return view('contact');
})->name('contact.form');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// admin
// routes/web.php

use App\Http\Controllers\AdminAuthController;

// Đăng nhập admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// Đăng ký admin
Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);

// Route bảo vệ bởi middleware 'admin'
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/products', [ClothesController::class, 'adminProductList'])->name('admin.products');
    Route::delete('/product/{id}', [ClothesController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/{id}/edit', [ClothesController::class, 'edit'])->name('product.edit');
    Route::post('/product/{id}', [ClothesController::class, 'update'])->name('product.update');
    Route::get('/admin/user-list', [ClothesController::class, 'userList'])->name('admin.user.list');
    Route::get('/products/create', [ClothesController::class, 'create'])->name('product.create');
    Route::post('/products', [ClothesController::class, 'store'])->name('product.store');
    Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts');
    Route::get('/admin/contacts/{id}/reply', [ContactController::class, 'showReplyForm'])->name('admin.contacts.reply');
    Route::post('/admin/contacts/{id}/reply', [ContactController::class, 'sendReply'])->name('admin.contacts.sendReply');
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::post('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});

Route::post('/custom-logout', [UserController::class, 'customLogout'])->name('custom.logout');

use App\Http\Controllers\ProductController;

Route::post('/products/{product}/toggleFavorite', [ProductController::class, 'toggleFavorite'])->name('product.toggleFavorite');



Route::get('/favorites', [ProductController::class, 'showFavorites'])->name('favorites.index');

Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.my');
Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');

Route::get('/category/{id}', [ClothesController::class, 'showCategoryProducts'])->name('category.products');
