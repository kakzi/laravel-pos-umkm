<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::get();
    return view('welcome', compact('products'));
});
Route::get('/admin', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        $users = User::count();
        $products = Product::count();
        $orders = Order::count();
        // dd($users);
        return view('pages.dashboard', compact('users', 'products', 'orders'));
    })->name('home');

    Route::resource('user', UserController::class);
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    Route::resource('order', \App\Http\Controllers\OrderController::class);

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/filter', [ReportController::class, 'filter'])->name('report.filter');
    Route::get('/report/download', [ReportController::class, 'download'])->name('report.download');
});
