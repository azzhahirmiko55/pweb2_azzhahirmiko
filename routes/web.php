<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'CekStatus']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::middleware(['auth', 'CekStatus:admin'])->group(function () {
        Route::get('admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::get('admin/order', [OrderController::class, 'index'])->name('order');
        Route::get('admin/order/tambah', [OrderController::class, 'create'])->name('tambah_order');
        Route::post('admin/order/store', [OrderController::class, 'store'])->name('store_order');
        Route::get('admin/order/destroy/{id}', [OrderController::class, 'destroy'])->name('destroy_order');
        Route::get('admin/order/edit/{id}', [OrderController::class, 'edit'])->name('edit_order');
        Route::put('admin/order/update{id}', [OrderController::class, 'update'])->name('update_order');
    });

    Route::middleware(['auth', 'CekStatus:user'])->group(function () {
        Route::get('user/dashboard', function () {
            return view('user.dashboard');
        })->name('user.dashboard');
        Route::get('user/order', [UserOrderController::class, 'index'])->name('user.order');
    });

});
