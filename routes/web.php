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
    return view('pages.trang-chu');
});

Route::get('/quan-ly-phim', function () {
    return view('pages.quan-ly-phim');
});

Route::get('/quan-ly-rap', function () {
    return view('pages.quan-ly-rap');
});

Route::get('/dang-nhap', function () {
    return view('pages.dang-nhap');
});
