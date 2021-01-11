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
Route::get('/phim', 'PhimController@getAPIPhim');
Route::get('/phim/{MaPhim}', 'PhimController@getAPIPhimbyID');
Route::post('/savephim', 'PhimController@insertAPIPhim');

/**
 * LỊCH CHIẾU
 */
//Lấy danh sách lịch chiếu (tất cả và theo trạng thái)
Route::get('/lich-chieu/{trangThai?}', 'LichChieuController@lichChieu');
//Lấy danh sách lịch chiếu theo phim (truyền vào mã phim)
Route::get('/lich-chieu/phim/{maPhim}', 'LichChieuController@lichChieuTheoPhim');
//Lấy danh sách lich chiếu theo ngày (truyền vào ngày chiếu) vd: "2020-12-20"
Route::get('/lich-chieu/ngay-chieu/{ngayChieu}', 'LichChieuController@lichChieuTheoNgay');
//Lấy danh sách lich chiếu theo rạp (truyền vào mã rạp)
Route::get('/lich-chieu/rap/{maRap}', 'LichChieuController@lichChieuTheoRap');
//Lấy danh sách lịch chiếu theo  và theo ngày (truyền vào mã phim và ngày)
Route::get('/lich-chieu-phim-ngay', 'LichChieuController@lichChieuTheoPhimVaNgay');

/**
 * RẠP
 */
//Lấy sơ đồ rạp
Route::get('/so-do-rap', 'RapController@laySoDoRap');

/**
 * THÀNH VIÊN
 */
Route::get('/cap-nhat-thanh-vien', 'ThanhVienController@capNhatThanhVien');