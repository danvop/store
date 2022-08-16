<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\Store;
use Illuminate\Support\Facades\Cache;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\QrCodeController;

use Illuminate\Container\Container;

// with middleware auth
// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['auth'])->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
Route::get('/faker', function () {
    $faker = Faker\Factory::create();
    echo $faker->paragraph();
    echo $faker->email();
    // ddd($faker->image(storage_path('photos'),320,240,null,false));
    // echo "<img src='";
    // ddd(echo $faker->image(null,640, 480, 'animals', true));
    // echo "'/>";
    echo ddd($faker->imageUrl(360, 360, 'animals', true));
    return "end";
});


Route::get('/', [StoreController::class, 'index']);

Route::get('/all', [StoreController::class, 'index']);
Route::get('stores/{store}', [StoreController::class, 'show']);

Route::get('items', [ItemController::class, 'index']);
Route::get('/items/{item}', [ItemController::class, 'show']);

Route::get('/test', function () {

    $stores = Store::with('items','parent')->orderBy('parent_id')->get();

    return view('stores-without-substores', ['stores' => $stores]);
});

Route::get('/hash', function() {
    for ($i=0; $i < 300; $i++) {
        if(
            (($i*9)>100)
            ==
            (($i*5)+20)
        ) echo $i;

    }
});

Route::get('/generate-qrcode/{store}', [QrCodeController::class, 'index']);

