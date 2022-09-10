<?php

use App\Models\Item;
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
Route::get('/faker', function () {
    $photo = Photo::find(92);
    dd($photo->path);
    // $extension = explode('/', $photo->path);
    // dd(end($extension));

    dd($photo->GetName());
    return "end";
});


Route::get('/', [StoreController::class, 'index']);

Route::get('/all', [StoreController::class, 'index']);
Route::get('stores/{store}', [StoreController::class, 'show']);
// Route::get('stores/{store}', [StoreController::class, 'show']);

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

Route::get('/faker', function(){
    $faker = \Faker\Factory::create();
    // $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
    ddd($faker->image(public_path('photos'), $width = 640, $height = 480));
    // echo $faker->image(public_path('photos'), $width = 640, $height = 480);
    $path = $faker->image(public_path('photos'), $width = 640, $height = 480);

    echo $path;
    echo "</br>";
    echo basename($path);


});
