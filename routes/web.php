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
    Route::post('/formSua','TheLoaiPhimController@suaLoaiPhim' );
    Route::post('/formAdd', 'TheLoaiPhimController@addLoaiPhim');
    Route::get('/xoatheloaiphim/{MaLoaiPhim}', 'TheLoaiPhimController@XoaLoaiPhim');

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
 * XUẤT CHIẾU
 */
Route::group(['prefix' => 'quan-ly-suat-chieu'], function () {
    Route::get('/', function () {
        return view('pages.quan-ly-suat-chieu');
    });
    Route::post('/', function () {
        return view('pages.quan-ly-suat-chieu');
    });
    Route::get('/them-suat-chieu', function () {
        return view('pages.them.them-suat-chieu');
    });
    Route::get('/cap-nhat-suat-chieu', function () {
        return view('pages.cap-nhat.cap-nhat-suat-chieu');
    });
});

/**
 * LỊCH CHIẾU
 */
Route::group(['prefix' => 'quan-ly-lich-chieu'], function () {
    Route::get('/', 'LichChieuController@index');
    Route::post('/', 'LichChieuController@index');
    Route::get('/xep-lich',  'LichChieuController@xepLichAJAX');
    Route::post('/xep-lich', 'LichChieuController@xepLichAJAX');
    Route::get('/cap-nhat-lich-chieu', function () {
        return view('pages.cap-nhat.cap-nhat-lich-chieu');
    });
});

/**
 * ĐĂNG NHẬP
 */
Route::get('/dang-nhap', function () {
    return view('pages.dang-nhap');
});
/**
 * SUAT CHIEU
 * 
 */
Route::group(['prefix' => 'quan-ly-suat-chieu'], function () {
    Route::get('/', 'XuatChieuController@index');
    Route::post('/Add', 'XuatChieuController@Add');
    Route::get('/them-suat-chieu', 'XuatChieuController@create');
    Route::get('/cap-nhat-suat-chieu/{Ma}', 'XuatChieuController@Edit')->name('EditSuatChieu');
    Route::post('/cap-nhat-suat-chieu/{Ma}', 'XuatChieuController@Update')->name('UpdateSuatChieu');
    Route::get('/del/{Ma}', 'XuatChieuController@del')->name('DelSuatChieu');

});
