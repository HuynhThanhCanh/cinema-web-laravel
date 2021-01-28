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

/**
 * GHẾ
 */
Route::get('getGhe', 'RapController@LayMaghe');

/**
 * SUẤT CHIẾU
 */
Route::get('/SuatChieu', 'XuatChieuController@getAPIAllSuatChieu');
Route::get('/SuatChieu/{MaSuatChieu}', 'XuatChieuController@getAPISuatChieubyID');

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
//Lấy danh sách lịch chiếu theo  và theo ngày (truyền vào mã phim và ngày: ?ngay=&maPhim=)
Route::get('/lich-chieu-phim-ngay', 'LichChieuController@lichChieuTheoPhimVaNgay');

/**
 * RẠP
 */
//Lấy sơ đồ rạp (?maLichChieu=)
Route::get('/so-do-rap', 'RapController@laySoDoRap');

/**
 * THÀNH VIÊN
 */
// cập nhật thành viên (?maThanhVien=&diaChi=)
Route::get('/cap-nhat-thanh-vien', 'ThanhVienController@capNhatThanhVien');
// thêm thành viên (?Avatar=&HoTenTV=&NgaySinh=&SDT=&Email=&Password=&DiaChi=&TrangThai=)
Route::get('/savethanhvien', 'ThanhVienController@insertThanhVien');
// Lấy danh sách tất cả thành viên
Route::get('/thanhvien', 'ThanhVienController@getThanhVien');
// Lấy thành viên theo MaTV
Route::get('/thanhvien/{maTv}', 'ThanhVienController@getThanhVienTheoId');
// Check đăng nhập dưới App (?User=&Pass=)
Route::get('/loginApp', 'ThanhVienController@LoginApp');

/**
 * PHIM
 */
Route::get('/phim', 'PhimController@getAPIPhim'); // lấy danh sách tất cả phim
Route::get('/phim/{MaPhim}', 'PhimController@getAPIPhimbyID'); // lấy phim theo ten  phim
Route::get('/timkiemphim/{TenPhim}', 'PhimController@TimKiemPhimTheoTen'); // Tìm kiếm phim theo tên
Route::post('/savephim', 'PhimController@insertAPIPhim'); // thêm phim
Route::get('/phimDangChieu', 'PhimController@getPhimDangChieu'); // lấy tất cả phim đang chiếu
Route::get('/phimSapChieu', 'PhimController@getPhimSapChieu'); // lấy tất cả phim sắp chiếu

/**
 * DS VÉ
 */
// Thêm danh sách vé ?SoLuong=&TongThanhTien=&MaTV=
Route::get('/themdanhsachve', 'DanhSachVeController@themDanhSachVe');
// Lấy mã của danh sách vé được thêm vào cuối cùng trong database
Route::get('/layMaDsVeCuoi', 'DanhSachVeController@layMaDsVeCuoiCung');

/**
 * VÉ
 */
// Thêm vé: ?maDsVe=&ThanhTien=&ThoiGianMua=&MaLichChieu=&MaGhe=
Route::get('/themve', 'VeController@DatVe'); // thêm vé
// dsVe?maTV=1&maDsVe= (lấy list ds vé của thành viên)
// dsVe?maTV=1&maDsVe=1 (lấy list vé theo ds vé)
Route::get('/dsVe', 'VeController@layDanhSachVeThanhVien');
// /ve/1 (lấy ds vé của thành viên)
Route::get('/ve/{maTV}', 'VeController@layVeThanhVien');
//check ghế đã được đặt hay chưa
Route::get('/check-ghe', 'VeController@checkGhe');
//tổng chi tiêu của năm (?nam=)
Route::get('/tong-chi-tieu-trong-nam', 'VeController@tongChiTieuTrongNam');
//tổng chi tiêu trong khoảng thời gian (?nam=&maTV=&ngayBatDau=&ngayKetThuc=)
Route::get('/tong-chi-tieu-trong-khoang-thoi-gian', 'VeController@tongChiTieuTrongKhoangThoiGian');
//check email trùng (?Email=)
Route::get('/check-email', 'ThanhVienController@CheckEmailTrung');
//check sdt trùng (?sdt=)
Route::get('/check-sdt', 'ThanhVienController@CheckSDTTrung');

/**
 * BÌNH LUẬN
 */
//lấy danh sách bình luận dựa vào mã phim
// .../binh-luan?maPhim=?
Route::get('/binh-luan', 'BinhLuanController@layDanhSachBinhLuan');
// thêm bình luận mới
// .../them-binh-luan?maTV=&maPhim=$noiDung=
Route::get('/them-binh-luan', 'BinhLuanController@themBinhLuanMoi');