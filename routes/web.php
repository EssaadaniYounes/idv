<?php

use App\Http\Controllers\Branch2Controller;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

Route::get('/admin', function (){
    return view('admin');
});
Route::get('/', [HomeController::class, 'index']);
Route::resource('branch2', Branch2Controller::class);
Route::resource('products', ProductsController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('branches', BranchesController::class);
Route::resource('contact', ContactController::class);

Route::get('/admin/{any?}', function (){
    return view('admin');
})->where('any', '^(?!api\/)[\/\w\.-]*');
