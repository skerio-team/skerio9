<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AriaController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\SportCategoryController;
use App\Http\Controllers\Admin\SportComplexController;
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
    
    Route::prefix('/complexes')->name('complexes.')->group(function() {
        Route::resource('/', SportComplexController::class);
        Route::get('/locations', [SportComplexController::class, 'locations'])->name('locations');
        Route::post('/storeCountry', [CountryController::class, 'storeCountry'])->name('storeCountry');
        Route::post('/storeRegion', [RegionController::class, 'storeRegion'])->name('storeRegion');
        Route::post('/storeArea', [AriaController::class, 'storeArea'])->name('storeArea');
    });

});


require __DIR__.'/auth.php';
