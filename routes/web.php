<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\fabric\FabricController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\admin\user\AdminUserController;
use App\Http\Controllers\front\MainController;
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

Route::get('/',[MainController::class,'products'])->name('front.main');
Route::post('/ajax',[MainController::class,'ajax'])->name('ajax');
Auth::routes();
Route::prefix('/front')->group(function (){
    Route::get('/products',[MainController::class,'products'])->name('front.products');
    Route::get('/order',[MainController::class,'order'])->middleware('auth')->name('front.order');
});

Route::prefix('admin')->middleware('checkRole')->group(function (){
    Route::get('/',[AdminController::class,'index'])->name('admin.mainPage');
    Route::prefix('/users')->group(function (){
        Route::get('/',[AdminUserController::class,'index'])->name('admin.users');
        Route::get('/edit/{user}',[AdminUserController::class,'edit'])->name('admin.users.edit');
        Route::post('/update/{user}',[AdminUserController::class,'update'])->name('admin.users.update');
        Route::get('/delete/{user}',[AdminUserController::class,'destroy'])->name('admin.users.delete');

    });
    Route::prefix('/category')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category');
        Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('/update/{category}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::get('/delete/{category}',[CategoryController::class,'delete'])->name('admin.category.delete');
    });
    Route::prefix('/fabric')->group(function (){
        Route::get('/',[FabricController::class,'index'])->name('admin.fabric');
        Route::get('/create',[FabricController::class,'create'])->name('admin.fabric.create');
        Route::post('/store',[FabricController::class,'store'])->name('admin.fabric.store');
        Route::get('/edit/{fabric}',[FabricController::class,'edit'])->name('admin.fabric.edit');
        Route::post('/update/{fabric}',[FabricController::class,'update'])->name('admin.fabric.update');
        Route::get('/delete/{fabric}',[FabricController::class,'delete'])->name('admin.fabric.delete');
    });
    Route::prefix('/product')->group(function (){
        Route::get('/{fabricId}',[ProductController::class,'index'])->name('admin.product');
        Route::get('/create/{fabricId}',[ProductController::class,'create'])->name('admin.product.create');
        Route::post('/store/{fabricId}',[ProductController::class,'store'])->name('admin.product.store');
        Route::get('/edit/{product}',[ProductController::class,'edit'])->name('admin.product.edit');
        Route::post('/update/{product}',[ProductController::class,'update'])->name('admin.product.update');
        Route::get('/delete/{product}',[ProductController::class,'delete'])->name('admin.product.delete');
    });
    });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test' ,[App\Http\Controllers\HomeController::class, 'test'] );
