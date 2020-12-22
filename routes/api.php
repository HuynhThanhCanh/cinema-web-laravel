<?php

use App\Http\Controllers\PhimController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Phim;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/phim','PhimController@getAPIPhim');
Route::get('/phim/{MaPhim}','PhimController@getAPIPhimbyID');
Route::post('/savephim','PhimController@insertAPIPhim');