<?php

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

Route::get('/', function () {
    return view('welcome');
});
/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/tweets', [App\Http\Controllers\TweetController::class, 'index']);
    Route::post('/tweets', [App\Http\Controllers\TweetController::class, 'store']);

    Route::post('/tweets/{tweet}/like', [App\Http\Controllers\TweetLikesController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [App\Http\Controllers\TweetLikesController::class, 'destroy']);

    Route::get('/explore', App\Http\Controllers\ExploreController::class);

    Route::get('/{user:name}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');
    Route::get('/{user:name}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->middleware('can:edit,user');
    Route::patch('/{user:name}', [App\Http\Controllers\ProfilesController::class, 'update'])->middleware('can:edit,user');
    Route::post('/{user:name}/follow', [App\Http\Controllers\FollowsController::class, 'store']);

});


