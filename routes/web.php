<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopgridController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScriptController;

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

Route::get('/my-script', [ScriptController::class, 'index'])->name('my-script');
Route::get('/my-jquery', [ScriptController::class, 'test'])->name('my-jquery');



Route::get('/', [ShopgridController::class, 'index'])->name('home');
Route::get('/category-product/{id}', [ShopgridController::class, 'categoryProduct'])->name('category-product');
Route::get('/sub-category-product/{id}', [ShopgridController::class, 'subCategoryProduct'])->name('sub-category-product');
Route::get('/product-detail/{id}', [ShopgridController::class, 'productDetail'])->name('product-detail');
Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('add-to-cart');
Route::get('/show-cart', [CartController::class, 'show'])->name('show-cart');
Route::get('/delete-cart-item/{id}', [CartController::class, 'delete'])->name('delete-cart-item');
Route::post('/update-cart-product/{id}', [CartController::class, 'update'])->name('update-cart-product');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new-order', [CheckoutController::class, 'newOrder'])->name('new-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');

Route::get('/customer-login', [AuthController::class, 'login'])->name('customer-login');
Route::post('/new-customer-login', [AuthController::class, 'newLogin'])->name('new-customer-login');
Route::get('/customer-register', [AuthController::class, 'register'])->name('customer-register');
Route::post('/new-customer-register', [AuthController::class, 'newRegister'])->name('new-customer-register');

Route::middleware(['bitm'])->get('/customer-dashboard', [CustomerDashboardController::class, 'index'])->name('customer-dashboard');
Route::middleware(['bitm'])->get('/customer-change-password', [CustomerDashboardController::class, 'changePassword'])->name('customer-change-password');
Route::middleware(['bitm'])->post('/update-customer-password', [CustomerDashboardController::class, 'updatePassword'])->name('update-customer-password');

Route::get('/customer-forget-password', [CustomerDashboardController::class, 'forgetPassword'])->name('customer-forget-password');
Route::post('/forget-password-mail-send', [CustomerDashboardController::class, 'forgetPasswordMailSend'])->name('forget-password-mail-send');
Route::get('/forget-password-mail-send-view', [CustomerDashboardController::class, 'forgetPasswordVerifiedView'])->name('forget-password-mail-send-view');
Route::get('/forget-password-verified-link', [CustomerDashboardController::class, 'forgetPasswordVerifiedLink'])->name('forget-password-verified-link');
Route::post('/forget-password-update', [CustomerDashboardController::class, 'forgetPasswordUpdate'])->name('forget-password-update');





Route::get('/customer-logout', [AuthController::class, 'logout'])->name('customer-logout');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/add-category',[CategoryController::class, 'index'])->name('add-category');
    Route::post('/new-category',[CategoryController::class, 'create'])->name('new-category');
    Route::get('/manage-category',[CategoryController::class, 'manage'])->name('manage-category');
    Route::get('/edit-category/{id}',[CategoryController::class, 'edit'])->name('edit-category');
    Route::post('/update-category/{id}',[CategoryController::class, 'update'])->name('update-category');
    Route::post('/delete-category/{id}',[CategoryController::class, 'delete'])->name('delete-category');

    Route::get('/add-sub-category',[SubCategoryController::class, 'index'])->name('add-sub-category');
    Route::post('/new-sub-category',[SubCategoryController::class, 'create'])->name('new-sub-category');
    Route::get('/manage-sub-category',[SubCategoryController::class, 'manage'])->name('manage-sub-category');
    Route::get('/edit-sub-category/{id}',[SubCategoryController::class, 'edit'])->name('edit-sub-category');
    Route::post('/update-sub-category/{id}',[SubCategoryController::class, 'update'])->name('update-sub-category');
    Route::get('/delete-sub-category/{id}',[SubCategoryController::class, 'delete'])->name('delete-sub-category');


    Route::get('/add-brand',[BrandController::class, 'index'])->name('add-brand');
    Route::post('/new-brand',[BrandController::class, 'create'])->name('new-brand');
    Route::get('/manage-brand',[BrandController::class, 'manage'])->name('manage-brand');
    Route::get('/edit-brand/{id}',[BrandController::class, 'edit'])->name('edit-brand');
    Route::post('/update-brand/{id}',[BrandController::class, 'update'])->name('update-brand');
    Route::get('/delete-brand/{id}',[BrandController::class, 'delete'])->name('delete-brand');

    Route::get('/add-unit',[UnitController::class, 'index'])->name('add-unit');
    Route::post('/new-unit',[UnitController::class, 'create'])->name('new-unit');
    Route::get('/manage-unit',[UnitController::class, 'manage'])->name('manage-unit');
    Route::get('/edit-unit/{id}',[UnitController::class, 'edit'])->name('edit-unit');
    Route::post('/update-unit/{id}',[UnitController::class, 'update'])->name('update-unit');
    Route::get('/delete-unit/{id}',[UnitController::class, 'delete'])->name('delete-unit');

    Route::get('/add-product',[ProductController::class, 'index'])->name('add-product');
    Route::get('/get-sub-category-by-category',[ProductController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');
    Route::post('/new-product',[ProductController::class, 'create'])->name('new-product');
    Route::get('/manage-product',[ProductController::class, 'manage'])->name('manage-product');
    Route::get('/edit-product/{id}',[ProductController::class, 'edit'])->name('edit-product');
    Route::post('/update-product/{id}',[ProductController::class, 'update'])->name('update-product');
    Route::get('/delete-product/{id}',[ProductController::class, 'delete'])->name('delete-product');

    Route::get('/admin-manage-order',[AdminOrderController::class, 'manage'])->name('admin-manage-order');
    Route::get('/view-order-detail/{id}',[AdminOrderController::class, 'viewOrderDetail'])->name('view-order-detail');
    Route::get('/view-order-invoice/{id}',[AdminOrderController::class, 'viewOrderInvoice'])->name('view-order-invoice');
    Route::get('/download-order-invoice/{id}',[AdminOrderController::class, 'downloadOrderInvoice'])->name('download-order-invoice');
    Route::get('/admin-edit-order/{id}',[AdminOrderController::class, 'editOrder'])->name('admin-edit-order');
    Route::post('/admin-update-order/{id}',[AdminOrderController::class, 'updateOrder'])->name('admin-update-order');
    Route::get('/admin-delete-order/{id}',[AdminOrderController::class, 'deleteOrder'])->name('admin-delete-order');

    Route::get('/add-admin-user',[UserController::class, 'add'])->name('add-admin-user');
    Route::post('/new-admin-user',[UserController::class, 'create'])->name('new-admin-user');
    Route::get('/manage-admin-user',[UserController::class, 'manage'])->name('manage-admin-user');
    Route::get('/edit-admin-user/{id}',[UserController::class, 'edit'])->name('edit-admin-user');
    Route::post('/update-admin-user/{id}',[UserController::class, 'update'])->name('update-admin-user');
    Route::get('/delete-admin-user/{id}',[UserController::class, 'delete'])->name('delete-admin-user');

    Route::get('/admin-change-password',[ProfileController::class, 'changePassword'])->name('admin-change-password');
    Route::post('/admin-update-password',[ProfileController::class, 'updatePassword'])->name('admin-update-password');
});

Route::prefix('/admin/')->middleware(['test'])->group(function () {
    Route::get('add', [ProfileController::class, 'demo'])->name('add-admin');
    Route::get('view', [ProfileController::class, 'view'])->name('view-admin');
    Route::get('edit', [ProfileController::class, 'edit'])->name('edit-admin');
});







