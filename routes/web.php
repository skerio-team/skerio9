<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SportCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Admin\UserController;

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

Route::get('/', [PageController::class, 'welcome'])->name('welcome');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function (){


    Route::get('/dashboard', [AdminController::class, 'dashboard'] )->name('dashboard');
    Route::resource('homes', HomeController::class);
    Route::resource('categories', SportCategoryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::resource('productCategories', ProductCategoryController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('team', TeamController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


});


require __DIR__.'/auth.php';
