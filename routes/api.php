<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'namespace' => '\App\Http\Controllers\Auth',
    'prefix' => 'auth',
], function () {
    Route::post('/register', RegisterController::class)->name('register');
    Route::post('/login', LoginController::class)->name('login');
});

/*
|--------------------------------------------------------------------------
| Podcast Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'namespace' => '\App\Http\Controllers\Podcast',
    'prefix' => 'podcasts',
    'middleware' => 'auth:sanctum',
], function () {
    Route::get('/', ListPodcastController::class);
    Route::post('/', CreatePodcastController::class);
});