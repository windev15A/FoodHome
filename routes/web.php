<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use GuzzleHttp\Middleware;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
//     return view('dashboard');
// })->name('home');

Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{name}', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{name}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/panier', [CartController::class, 'index'])->name('panier.index');
    Route::patch('/panier/{rowId}', [CartController::class, 'update'])->name('panier.update');
    Route::delete('/panier/{rowId}', [CartController::class, 'destroy'])->name('panier.destroy');
    Route::post('/cart/ajouter', [CartController::class, 'store'])->name('cart.store');
});
