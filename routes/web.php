<?php

use App\Models\Item;
use App\Models\User;
use App\Models\Photo;
use App\Models\Store;

use Faker\Generator as Faker;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\QrCodeController;

// with middleware auth
// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['auth'])->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

Route::get('/', [StoreController::class, 'index']);

Route::get('/all', [StoreController::class, 'index']);
Route::get('stores/{store}', [StoreController::class, 'show']);
// Route::get('stores/{store}', [StoreController::class, 'show']);

Route::get('store/create', [StoreController::class, 'create']);
Route::post('store/store', [StoreController::class, 'store']);
Route::get('store/{store}/create', [StoreController::class, 'create']);
Route::post('store/{store}/store', [StoreController::class, 'store']);


Route::get('item', [ItemController::class, 'index']);
Route::get('item/create', [ItemController::class, 'create']);
Route::get('item/{store}/create', [ItemController::class, 'create']);
Route::get('/item/{item}', [ItemController::class, 'show']);
Route::post('/item/store', [ItemController::class, 'store']);
Route::post('/item/{store}/store', [ItemController::class, 'store']);

Route::get('/generate-qrcode/{store}', [QrCodeController::class, 'index']);

