<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\SportCategoryController;
use App\Http\Controllers\Api\newsController;
use App\Http\Controllers\Api\LastNewsController;
use App\Http\Controllers\Api\LikeNewsController;
use App\Http\Controllers\Api\StatusNewsController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\SizeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\CountController;
use App\Http\Controllers\Api\ComplexController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\Api\StadiumController;
use App\Http\Controllers\Api\StadiumSectionController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\FootballProductController;
use App\Http\Controllers\Api\ValeybolProductController;
use App\Http\Controllers\Api\BasketbolProductController;
use App\Http\Controllers\Api\BoksProductController;
use App\Http\Controllers\Api\UfcProductController;

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



Route::resource('home', HomeController::class);

Route::resource('sportcategory', SportCategoryController::class);

Route::resource('news', newsController::class);

Route::resource('lastnews', LastNewsController::class);

Route::resource('likenews', LikeNewsController::class);

Route::resource('statusnews', StatusNewsController::class);

Route::post('/like', [LikeController::class, 'store'])->middleware('auth:api');

Route::post('/shoplike', [LikeController::class, 'shopstore']);

Route::post('/card', [CardController::class, 'store']);

Route::get('/card/{id}', [CardController::class, 'index']);

Route::get('/like', [LikeController::class, 'index']);

Route::resource('brand', BrandController::class);

Route::resource('productcategory', ProductCategoryController::class);

Route::resource('size', SizeController::class);

Route::resource('product', ProductController::class);

Route::resource('team', TeamController::class);

Route::resource('count', CountController::class);

Route::resource('complex', ComplexController::class);

Route::resource('region', RegionController::class);

Route::resource('area', AreaController::class);

Route::resource('stadium', StadiumController::class);

Route::resource('stadiumsection', StadiumSectionController::class);

Route::resource('tickets', TicketController::class);

Route::resource('fproduct', FootballProductController::class);

Route::resource('vproduct', ValeybolProductController::class);

Route::resource('bproduct', BasketbolProductController::class);

Route::resource('boksproduct', BoksProductController::class);

Route::resource('uproduct', UfcProductController::class);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


