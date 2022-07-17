<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\BranchesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class,'register']);

Route::middleware('auth:api')->group(function () {
    //Route::get('user-list', [UserController::class,'Userlist']);
    Route::resource('products', ProductsController::class);
    Route::post('products/store_imgs', [ProductsController::class, 'store_imgs']);
    Route::resource('categories', CategoriesController::class);
    Route::resource('branches', BranchesController::class);
    Route::resource('users', UserController::class);
});
