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

Route::group(['prefix' => 'quan-ly-phim'], function () {
    Route::get('/', function () {
        return view('pages.quan-ly-phim');
    });
    Route::get('/them-phim', function () {
        return view('pages.them.them-phim');
    });
    Route::get('/cap-nhat-phim', function () {
        return view('pages.cap-nhat.cap-nhat-phim');
    });
});

Route::group(['prefix' => 'quan-ly-the-loai-phim'], function () {
    Route::get('/', function () {
        return view('pages.quan-ly-the-loai-phim');
    });
    Route::get('/them-the-loai-phim', function () {
        return view('pages.them.them-the-loai-phim');
    });
    Route::get('/cap-nhat-the-loai-phim', function () {
        return view('pages.cap-nhat.cap-nhat-the-loai-phim');
    });
});

Route::group(['prefix' => 'quan-ly-rap'], function () {
    Route::get('/', function () {
        return view('pages.quan-ly-rap');
    });
    Route::get('/them-rap', function () {
        return view('pages.them.them-rap');
    });
    Route::get('/cap-nhat-rap', function () {
        return view('pages.cap-nhat.cap-nhat-rap');
    });
});

Route::get('/dang-nhap', function () {
    return view('pages.dang-nhap');
});