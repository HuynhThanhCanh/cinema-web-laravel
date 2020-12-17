<?php

use GuzzleHttp\Middleware;
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

Route::get('/','TrangChuController@index');
Route::post('/', function () {
    return view('pages.trang-chu');
});

/**
 * PHIM
 */
Route::group(['prefix' => 'quan-ly-phim'], function () {
    Route::get('/', 'PhimController@index');
    Route::post('/', 'PhimController@index');
    Route::get('/them-phim', 'PhimController@themPhim');
    Route::get('/cap-nhat-phim/{MaPhim}', 'PhimController@capNhatPhim');
    Route::post('/formAdd', 'PhimController@addPhim');
    Route::post('/formEdit/{MaPhim}', 'PhimController@editPhim');
    Route::get('/xoaphim/{MaPhim}', 'PhimController@deletePhim');
});

/**
 * THỂ LOẠI PHIM
 */
Route::group(['prefix' => 'quan-ly-the-loai-phim'], function () {
    Route::get('/', 'TheLoaiPhimController@index');
    Route::post('/', 'TheLoaiPhimController@index');
    Route::get('/them-the-loai-phim', 'TheLoaiPhimController@themLoaiPhim');
    Route::get('/cap-nhat-the-loai-phim', 'TheLoaiPhimController@capNhatLoaiPhim');
});

/**
 * RẠP
 */
Route::group(['prefix' => 'quan-ly-rap'], function () {
    Route::get('/', 'RapController@index');
    Route::post('/', 'RapController@index');
    Route::get('/them-rap', 'RapController@themRap');
    Route::get('/cap-nhat-rap', 'RapController@capNhatRap');
});

/**
 * ĐĂNG NHẬP
 */
Route::get('/dang-nhap', 'TrangChuController@formDangNhap');
Route::post('/login', 'TrangChuController@dangnhap');