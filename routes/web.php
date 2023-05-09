<?php

use App\Http\Livewire\Product\Detail as ProductDetail;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Transaction\Detail as TransactionDetail;
use App\Http\Livewire\Transaction\Index as TransactionIndex;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', ProductIndex::class)->name('index');
        Route::get('/{product}', ProductDetail::class)->name('detail');
    });
    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/', TransactionIndex::class)->name('index');
        Route::get('/{transaction}', TransactionDetail::class)->name('detail');
    });
});
