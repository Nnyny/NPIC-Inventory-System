<?php

use Illuminate\Support\Facades\Route;
use Modules\House\app\Http\Controllers\HouseController;

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

Route::group([], function () {
    Route::resource('house', HouseController::class)->names('house');
    Route::get('/search', 'HouseController@getBySearch');
});


