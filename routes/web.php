<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => "/"], function(){
    Route::get("/", [AdminController::class, 'index']) -> name("home");
    Route::get('/home', [AdminController::class, 'index'])->name('home');
});

Route::group(['prefix' => "/product"], function(){
    Route::get("/", [ProductController::class, 'index']) -> name("product");
    Route::get("/destroy/{id}", [ProductController::class, 'destroy']) -> name("product-delete");
    Route::post("/store", [ProductController::class, 'store']) -> name("product-insert");
    Route::get("/get", [ProductController::class, 'getAll']) -> name("get-all-product");
    Route::get("/view", [ProductController::class, 'getView']) -> name("get-view-product");
});

Route::group(['prefix' => "/company"], function(){
    Route::get("/", [CompanyController::class, 'index']) -> name("company");
    Route::get("/destroy/{id}", [CompanyController::class, 'destroy']) -> name("company-delete");
    Route::post("/store", [CompanyController::class, 'store']) -> name("company-insert");
});

Route::group(['prefix' => "/vendor"], function(){
    Route::get("/", [VendorController::class, 'index']) -> name("vendor");
    Route::get("/destroy/{id}", [VendorController::class, 'destroy']) -> name("vendor-delete");
    Route::post("/store", [VendorController::class, 'store']) -> name("vendor-insert");
});

Route::group(['prefix' => "/address"], function(){
    Route::get("/city", [AddressController::class, 'getCity']) -> name("address-city");
    Route::get("/district/{id}", [AddressController::class, 'getDistrict']) -> name("address-district");
    Route::get("/ward/{id}", [AddressController::class, 'getward']) -> name("address-ward");
});

Route::group(['prefix' => "/order"], function(){
    Route::get("/", [OrderController::class, 'index']) -> name("order");
    Route::get("/destroy/{id}", [OrderController::class, 'destroy']) -> name("order-delete");
    Route::post("/store", [OrderController::class, 'store']) -> name("order-insert");
});


Route::get("/province", [ProvincesController::class, 'index']);
Route::get('/update-province', [ProvincesController::class, 'store']);