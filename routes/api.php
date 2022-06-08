<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\SportCategoryController;
use App\Http\Controllers\Api\newsController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\SizeController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [UserController::class, 'register']);

Route::post('login', [UserController::class, 'login']);



Route::resource('home', HomeController::class)->middleware('auth:api');

Route::resource('sportcategory', SportCategoryController::class)->middleware('auth:api');

Route::resource('news', newsController::class)->middleware('auth:api');

Route::resource('brand', BrandController::class)->middleware('auth:api');

Route::resource('productcategory', ProductCategoryController::class)->middleware('auth:api');

Route::resource('size', SizeController::class)->middleware('auth:api');

Route::resource('product', ProductController::class)->middleware('auth:api');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});