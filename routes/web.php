<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\AdminLogout;
use App\Http\Controllers\admin\getOrderController;
use App\Http\Controllers\admin\ListOfOrder;
use App\Http\Controllers\admin\ModelAndBrandController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\customer\CustomerLogin;
use App\Http\Controllers\customer\CustomerrLogout;
use App\Http\Controllers\customer\getOrder;
use App\Http\Controllers\customer\OrderController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;




Route::group(["middleware" => "guest"], function () {
    Route::get('/', [CustomerLogin::class, 'index'])->name("login");
    Route::post('/login', [CustomerLogin::class, 'loginuser']);

});

Route::middleware(["auth"])->group(function () {
    Route::get('/order', [OrderController::class, "index"])->name('customer.order');
    Route::post('/add-order', [OrderController::class, "addOrder"]);


    Route::get('/my-order', [getOrder::class, "index"])->name('customer.my-order');
    Route::get('/orders', [getOrder::class, "get"]);


    Route::get('/logout', [CustomerrLogout::class, 'logout'])->name("customer.logout");

});


Route::group(["middleware" => "admin"], function () {


    // for customaer
    Route::get('/admin/customers', [UserController::class, "index"])->name("admin.customer");
    Route::post('/admin/create-customar', [UserController::class, "create"]);
    Route::get('/admin/get-customers', [UserController::class, "get"]);
    Route::get('/admin/edit-customers', [UserController::class, "edit"]);
    Route::post('/admin/update-customer', [UserController::class, "update"]);
    Route::get('/admin/delete-customers', [UserController::class, "delete"]);

    // for model and brand
    Route::get('/admin/model', [ModelAndBrandController::class, "index"])->name("admin.model");
    Route::get('/admin/get-model', [ModelAndBrandController::class, "get"]);
    Route::post('/admin/create-model', [ModelAndBrandController::class, "create"]);
    Route::get('/admin/edit-models', [ModelAndBrandController::class, "edit"]);
    Route::post('/admin/update-model', [ModelAndBrandController::class, "update"]);
    Route::get('/admin/delete-model', [ModelAndBrandController::class, "delete"]);

// List of Order
Route::get('/admin/list', [ListOfOrder::class, "index"])->name("admin.list");
Route::get('/admin/list-of-order', [ListOfOrder::class, "get"]);
Route::get('/admin/list-of-search', [ListOfOrder::class, "search"]);


Route::get('/admin/order', [getOrderController::class, "index"])->name('admin.order');
Route::get('/admin/get-order', [getOrderController::class, "get"]);
Route::get('/admin/approve', [getOrderController::class, "approve"]);
Route::get('/admin/reject', [getOrderController::class, "reject"]);

    // for logout
    Route::get('/admin/logout', [AdminLogout::class, 'adminlogout'])->name("admin.logout");

});

Route::group(["middleware" => "noadmin"], function () {
    Route::get('/admin', [AdminLogin::class, 'index'])->name("login");
    Route::post('/admin/login', [AdminLogin::class, 'adminlogin']);

});
