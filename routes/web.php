<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SportCategoryController;
use App\Http\Controllers\PageController;

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


});


require __DIR__.'/auth.php';
