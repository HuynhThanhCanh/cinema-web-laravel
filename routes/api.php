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
Route::get('getGhe', 'RapController@LayMaghe');
Route::get('/phim','PhimController@getAPIPhim');// lấy danh sách tất cả phim
Route::get('/phim/{MaPhim}','PhimController@getAPIPhimbyID');// lấy phim theo ten  phim
Route::get('/timkiemphim/{TenPhim}','PhimController@TimKiemPhimTheoTen');// Tìm kiếm phim theo tên
Route::post('/savephim','PhimController@insertAPIPhim');// thêm phim
Route::get('/phimDangChieu','PhimController@getPhimDangChieu');// lấy tất cả phim đang chiếu
Route::get('/phimSapChieu','PhimController@getPhimSapChieu');// lấy tất cả phim sắp chiếu
Route::post('/savethanhvien','ThanhVienController@insertThanhVien');// thêm thành viên
Route::post('/thanhvien','ThanhVienController@getThanhVien');// Lấy danh sách tất cả thành viên


