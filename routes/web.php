<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;

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

Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

Route::get("/produks", [produkController::class, "produk"])->name("produk");

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
//kategory
Route::get('/category/{category}', [produkController::class, 'indexByCategory'])->name('products.by.category');

// produk
Route::get("/produk", [produkController::class, "index"])->name("produk.index");
Route::get("/produk/create", [produkController::class, "create"])->name("produk.create");
Route::post("/produk/store", [produkController::class, "store"])->name("produk.store");
Route::get("/produk/edit/{product_id}", [produkController::class, "edit"])->name("produk.edit");
Route::patch("/produk/update/{product_id}", [produkController::class, "update"])->name("produk.update");
Route::delete("/produk/delete/{product_id}", [produkController::class, "destroy"]);

require __DIR__.'/auth.php';