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

Route::get('/', 'TrangChuController@index')->middleware('checklogin::class');
Route::post('/', function () {
    return view('pages.trang-chu');
});

/**
 * PHIM
 */
Route::group(['prefix' => 'quan-ly-phim'], function () 
{
    Route::get('/', 'PhimController@index')->middleware('checklogin::class');
    Route::post('/', 'PhimController@index');
    Route::get('/them-phim', 'PhimController@themPhim')->middleware('checklogin::class');
    Route::get('/cap-nhat-phim/{MaPhim}', 'PhimController@capNhatPhim')->middleware('checklogin::class');
    Route::post('/formAdd', 'PhimController@addPhim');
    Route::post('/formEdit/{MaPhim}', 'PhimController@editPhim');
    Route::get('/xoaphim/{MaPhim}', 'PhimController@deletePhim')->middleware('checklogin::class');
});

/**
 * THỂ LOẠI PHIM
 */
Route::group(['prefix' => 'quan-ly-the-loai-phim'], function () {
    Route::get('/', 'TheLoaiPhimController@index')->middleware('checklogin::class');
    Route::post('/', 'TheLoaiPhimController@index');
    Route::get('/them-the-loai-phim', 'TheLoaiPhimController@themLoaiPhim')->middleware('checklogin::class');
    Route::get('/cap-nhat-the-loai-phim/{MaLoaiPhim}', 'TheLoaiPhimController@capNhatLoaiPhim')->middleware('checklogin::class');
    Route::post('/formSua/{MaLoaiPhim}','TheLoaiPhimController@suaLoaiPhim' );
    Route::post('/formAdd', 'TheLoaiPhimController@addLoaiPhim');
    Route::get('/xoatheloaiphim/{MaLoaiPhim}', 'TheLoaiPhimController@XoaLoaiPhim')->middleware('checklogin::class');
});

/**
 * RẠP
 */
Route::group(['prefix' => 'quan-ly-rap'], function () {
    Route::get('/', 'RapController@index')->middleware('checklogin::class');
    Route::post('/', 'RapController@index');
    Route::get('/them-rap', 'RapController@themRap')->middleware('checklogin::class');
    Route::post('/create', 'RapController@addRap')->name('addRap');
    Route::get('/edit/{MaRap}', 'RapController@edit')->middleware('checklogin::class');
    Route::post('/update/{MaRap}', 'RapController@update')->name('updateRap');
    Route::get('/delete/{MaRap}', 'RapController@delete')->name('deleteRap')->middleware('checklogin::class');
});

/**
 * LỊCH CHIẾU
 */
Route::group(['prefix' => 'quan-ly-lich-chieu'], function () {
    Route::get('/', 'LichChieuController@index')->middleware('checklogin::class');
    Route::post('/', 'LichChieuController@index');
    Route::get('/xep-lich',  'LichChieuController@xepLichAJAX')->middleware('checklogin::class');
    Route::post('/xep-lich', 'LichChieuController@xepLichAJAX');
    Route::post('/them-lich', 'LichChieuController@themLich');
    Route::post('/tim-kiem-lich-theo-ngay-chieu', 'LichChieuController@timKiemLichTheoNgayChieu');
    Route::post('/xoa-lich-theo-ngay-chieu', 'LichChieuController@xoaLichTheoNgayChieu');
});

/**
 * SUAT CHIEU
 *
 */
Route::group(['prefix' => 'quan-ly-suat-chieu'], function () {
    Route::get('/', 'XuatChieuController@index')->middleware('checklogin::class');
    Route::post('/Add', 'XuatChieuController@Add');
    Route::get('/them-suat-chieu', 'XuatChieuController@create');
    Route::get('/cap-nhat-suat-chieu/{Ma}', 'XuatChieuController@Edit')->name('EditSuatChieu');
    Route::post('/cap-nhat-suat-chieu/{Ma}', 'XuatChieuController@Update')->name('UpdateSuatChieu');
    Route::get('/del/{Ma}', 'XuatChieuController@del')->name('DelSuatChieu');

    /**AJAX */
    Route::get('/edit-suat-chieu-ajax', 'XuatChieuController@EditSuatChieuAjax');
    Route::get('/xoa-suat-chieu-ajax', 'XuatChieuController@DeleteAjax');
    Route::post('/UpdateAjax', 'XuatChieuController@UpdateAjax');
    Route::post('/AddAjax', 'XuatChieuController@AddAjax')->name('AddSuatChieuAjax');

});

/**
 * VÉ
 */
Route::get('/quan-ly-ve', 'VeController@index');
/**
 * ĐĂNG NHẬP
 */
Route::get('/dang-nhap', 'TrangChuController@formDangNhap');
Route::post('/login', 'TrangChuController@dangnhap');
Route::get('/dangxuat', 'TrangChuController@dangxuat')->middleware('checklogin::class');

