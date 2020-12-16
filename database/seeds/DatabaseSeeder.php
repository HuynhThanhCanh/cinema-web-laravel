<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(chuc_vus::class);
        $this->call(nhan_viens::class);
        $this->call(loai_phims::class);
        $this->call(gias::class);
        $this->call(gioi_han_tuois::class);
        $this->call(phims::class);
        $this->call(chi_nhanhs::class);
        $this->call(raps::class);
        $this->call(thanh_viens::class);
        $this->call(ds_ves::class);
        $this->call(loai_ghes::class);
        $this->call(ghes::class);
        $this->call(thoi_gian_chieus::class);
        $this->call(lich_chieus::class);
        $this->call(ves::class);
    }
}

class chuc_vus extends Seeder
{
    public function run()
    {
        DB::table('chuc_vus')->insert([
            ['TenCV' => 'Quản lý', 'TrangThai' => 1],
            ['TenCV' => 'Bán vé', 'TrangThai' => 1],
            ['TenCV' => 'Giữ xe', 'TrangThai' => 1],
        ]);
    }
}
class nhan_viens extends Seeder
{
    public function run()
    {
        DB::table('nhan_viens')->insert([
            ['HoNV' => 'Phạm', 'TenNV' => 'Nhựt', 'NgaySinh' => '2000-10-10', 'DiaChi' => 'Bến Tre', 'SDT' => '0911079197', 'Email' => 'nhatminh785@gmail.com', 'MaCV' => 1, 'MaNQL' => null, 'TenTK' => 'nhutdzvl', 'Pass' => '12345', 'TrangThai' => 1],
            ['HoNV' => 'Huỳnh', 'TenNV' => 'Cảnh', 'NgaySinh' => '2000-10-2', 'DiaChi' => 'Bình Thuận', 'SDT' => '12345678', 'Email' => 'canhcdth18pmc@gmail.com', 'MaCV' => 3, 'MaNQL' => 1, 'TenTK' => 'canhngu123', 'Pass' => '123456', 'TrangThai' => 1],
            ['HoNV' => 'Trần', 'TenNV' => 'Thảo', 'NgaySinh' => '2000-10-2', 'DiaChi' => 'HCM', 'SDT' => '123456789', 'Email' => 'thaocdth18pmc@gmail.com', 'MaCV' => 2, 'MaNQL' => 1, 'TenTK' => 'thao1234', 'Pass' => '1234', 'TrangThai' => 1],

        ]);
    }
}
class loai_phims extends Seeder
{
    public function run()
    {
        DB::table('loai_phims')->insert([
            ['TenLoaiPhim' => 'Tình cảm', 'MaNV' => 1, 'TrangThai' => 1],
            ['TenLoaiPhim' => 'Hành động', 'MaNV' => 1, 'TrangThai' => 1],

        ]);
    }
}
class gias extends Seeder
{
    public function run()
    {
        DB::table('gias')->insert([
            ['DonGia' => 50000, 'TrangThai' => 1],
            ['DonGia' => 100000, 'TrangThai' => 1],
            ['DonGia' => 150000, 'TrangThai' => 1],
        ]);
    }
}
class gioi_han_tuois extends Seeder
{
    public function run()
    {
        DB::table('gioi_han_tuois')->insert([
            ['TenGioiHan' => '18+', 'TrangThai' => 1],
            ['TenGioiHan' => '12+', 'TrangThai' => 1],
        ]);
    }
}
class phims extends Seeder
{
    public function run()
    {
        DB::table('phims')->insert([

            ['TenPhim' => 'Ròm', 'NgayDKChieu' => '2020-10-10', 'NgayKetThuc' => '2020-11-10', 'ThoiLuong' => 180, 'DaoDien' => 'Trần Thanh Huy', 'DienVien' => 'Trần Anh Khoa', 'Diem' => 4, 'HinhAnh' => 'rom.jpg', 'LinkPhim' => 'XRm1P7oGpMQ', 'MaLoaiPhim' => 2, 'MaNV' => 1, 'Nhan' => 1, 'TrangThai' => 1],
            ['TenPhim' => 'Tiệc trăng máu', 'NgayDKChieu' => '2020-10-10', 'NgayKetThuc' => '2020-11-10', 'ThoiLuong' => 210, 'DaoDien' => 'Trần Thanh Huy', 'DienVien' => 'Trần Anh Khoa', 'Diem' => 5, 'HinhAnh' => 'tiectrangmau.jpg', 'LinkPhim' => 'XRm1P7oGpMQ', 'MaLoaiPhim' => 2, 'MaNV' => 1, 'Nhan' => 1, 'TrangThai' => 1],

        ]);
    }
}

class chi_nhanhs extends Seeder
{
    public function run()
    {
        DB::table('chi_nhanhs')->insert([
            ['TenChiNhanh' => 'CB2NT Vạn Hạnh MAll', 'SoLuongRap' => 1, 'DiaChi' => '11 Sư Vạn Hạnh, Phường 12, Quận 10, Thành phố Hồ Chí Minh', 'SDT' => '02838625588', 'MaNV' => 1, 'TrangThai' => 1],
        ]);
    }
}

class raps extends Seeder
{
    public function run()
    {
        DB::table('raps')->insert([
            ['TenRap' => 'Rap1', 'SoLuongGhe' => 50, 'MaChiNhanh' => 1, 'TrangThai' => 1],
            ['TenRap' => 'Rap2', 'SoLuongGhe' => 50, 'MaChiNhanh' => 1, 'TrangThai' => 1],
        ]);
    }
}
class ds_ves extends Seeder
{
    public function run()
    {
        DB::table('ds_ves')->insert([
            ['SoLuong' => 2, 'TongThanhTien' => 500000, 'MaTV' => 1, 'TrangThai' => 1],
            ['SoLuong' => 5, 'TongThanhTien' => 1000000, 'MaTV' => 1, 'TrangThai' => 1],
            ['SoLuong' => 5, 'TongThanhTien' => 1000000, 'MaTV' => 2, 'TrangThai' => 1],
            ['SoLuong' => 10, 'TongThanhTien' => 2000000, 'MaTV' => 2, 'TrangThai' => 1]
        ]);
    }
}
class loai_ghes extends Seeder
{
    public function run()
    {
        DB::table('loai_ghes')->insert([
            ['MaLoaiGhe' => 'TE1', 'TenLoaiGhe' => 'Ghế trẻ em', 'MaGia' => 1, 'TrangThai' => 1],
            ['MaLoaiGhe' => 'BT1', 'TenLoaiGhe' => 'Ghế bình thường', 'MaGia' => 2, 'TrangThai' => 1],
            ['MaLoaiGhe' => 'VIP1', 'TenLoaiGhe' => 'Ghế Vip', 'MaGia' => 3, 'TrangThai' => 1],
        ]);
    }
}
class ghes extends Seeder
{
    public function run()
    {
        DB::table('ghes')->insert([
            // hàng A
            ['MaGhe' => 'A1', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 1, 'TrangThai' => 1],
            ['MaGhe' => 'A2', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 2, 'TrangThai' => 1],
            ['MaGhe' => 'A3', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 3, 'TrangThai' => 1],
            ['MaGhe' => 'A4', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 4, 'TrangThai' => 1],
            ['MaGhe' => 'A5', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 5, 'TrangThai' => 1],
            ['MaGhe' => 'A6', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 6, 'TrangThai' => 1],
            ['MaGhe' => 'A7', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 7, 'TrangThai' => 1],
            ['MaGhe' => 'A8', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 8, 'TrangThai' => 1],
            ['MaGhe' => 'A9', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 9, 'TrangThai' => 1],
            ['MaGhe' => 'A10', 'MaLoaiGhe' => 'VIP1', 'ChiSoHang' => 'A', 'ChiSoCot' => 10, 'TrangThai' => 1],
            // hàng B
            ['MaGhe' => 'B1', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 1, 'TrangThai' => 1],
            ['MaGhe' => 'B2', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 2, 'TrangThai' => 1],
            ['MaGhe' => 'B3', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 3, 'TrangThai' => 1],
            ['MaGhe' => 'B4', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 4, 'TrangThai' => 1],
            ['MaGhe' => 'B5', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 5, 'TrangThai' => 1],
            ['MaGhe' => 'B6', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 6, 'TrangThai' => 1],
            ['MaGhe' => 'B7', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 7, 'TrangThai' => 1],
            ['MaGhe' => 'B8', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 8, 'TrangThai' => 1],
            ['MaGhe' => 'B9', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 9, 'TrangThai' => 1],
            ['MaGhe' => 'B10', 'MaLoaiGhe' => 'TE1', 'ChiSoHang' => 'B', 'ChiSoCot' => 10, 'TrangThai' => 1],
            //Hàng C
            ['MaGhe' => 'C1', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 1, 'TrangThai' => 1],
            ['MaGhe' => 'C2', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 2, 'TrangThai' => 1],
            ['MaGhe' => 'C3', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 3, 'TrangThai' => 1],
            ['MaGhe' => 'C4', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 4, 'TrangThai' => 1],
            ['MaGhe' => 'C5', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 5, 'TrangThai' => 1],
            ['MaGhe' => 'C6', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 6, 'TrangThai' => 1],
            ['MaGhe' => 'C7', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 7, 'TrangThai' => 1],
            ['MaGhe' => 'C8', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 8, 'TrangThai' => 1],
            ['MaGhe' => 'C9', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 9, 'TrangThai' => 1],
            ['MaGhe' => 'C10', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'C', 'ChiSoCot' => 10, 'TrangThai' => 1],
            //Hàng D
            ['MaGhe' => 'D1', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 1, 'TrangThai' => 1],
            ['MaGhe' => 'D2', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 2, 'TrangThai' => 1],
            ['MaGhe' => 'D3', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 3, 'TrangThai' => 1],
            ['MaGhe' => 'D4', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 4, 'TrangThai' => 1],
            ['MaGhe' => 'D5', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 5, 'TrangThai' => 1],
            ['MaGhe' => 'D6', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 6, 'TrangThai' => 1],
            ['MaGhe' => 'D7', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 7, 'TrangThai' => 1],
            ['MaGhe' => 'D8', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 8, 'TrangThai' => 1],
            ['MaGhe' => 'D9', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 9, 'TrangThai' => 1],
            ['MaGhe' => 'D10', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'D', 'ChiSoCot' => 10, 'TrangThai' => 1],
            // Hàng E
            ['MaGhe' => 'E1', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 1, 'TrangThai' => 1],
            ['MaGhe' => 'E2', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 2, 'TrangThai' => 1],
            ['MaGhe' => 'E3', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 3, 'TrangThai' => 1],
            ['MaGhe' => 'E4', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 4, 'TrangThai' => 1],
            ['MaGhe' => 'E5', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 5, 'TrangThai' => 1],
            ['MaGhe' => 'E6', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 6, 'TrangThai' => 1],
            ['MaGhe' => 'E7', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 7, 'TrangThai' => 1],
            ['MaGhe' => 'E8', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 8, 'TrangThai' => 1],
            ['MaGhe' => 'E9', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 9, 'TrangThai' => 1],
            ['MaGhe' => 'E10', 'MaLoaiGhe' => 'BT1', 'ChiSoHang' => 'E', 'ChiSoCot' => 10, 'TrangThai' => 1],
        ]);
    }
}
class thoi_gian_chieus extends Seeder
{
    public function run()
    {
        DB::table('thoi_gian_chieus')->insert([
            ['ThoiGianChieu' => '16:30:00', 'TrangThai' => 1],
            ['ThoiGianChieu' => '19:30:00', 'TrangThai' => 1],
        ]);
    }
}
class lich_chieus extends Seeder
{
    public function run()
    {
        DB::table('lich_chieus')->insert([
            ['MaThoiGianChieu' => 1, 'MaPhim' => 1, 'NgayChieu' => '2020-12-20', 'MaRap' => 1, 'TrangThai' => 1],
            ['MaThoiGianChieu' => 2, 'MaPhim' => 1, 'NgayChieu' => '2020-12-20', 'MaRap' => 1, 'TrangThai' => 1],
        ]);
    }
}

class thanh_viens extends Seeder
{
    public function run()
    {
        DB::table('thanh_viens')->insert([
            ['HoTV' => 'Huỳnh', 'TenTV' => 'Thanh Cảnh', 'NgaySinh' => '2000-10-02', 'SDT' => '0947479207', 'Email' => 'huynhthanhcanh.top@gmail.com', 'TenDN' => 'canh123', 'Password' => '12345', 'DiaChi' => 'Bình Thạnh', 'TrangThai' => 1],
            ['HoTV' => 'Phạm', 'TenTV' => 'Minh Nhựt',  'NgaySinh' => '2000-10-02', 'SDT' => '0911079197', 'Email' => 'phamminhnhut@gmail.com', 'TenDN' => 'nhut123', 'Password' => '12345', 'DiaChi' => "Nhà Bè",  'TrangThai' => 1],
        ]);
    }
}

class ves extends Seeder
{
    public function run()
    {
        DB::table('ves')->insert([
            ['TenVe' => 'Vé Xem Phim', 'MaDsVe' => 1, 'ThanhTien' => 50000, 'MaLichChieu' => 1, 'MaGhe' => 'A9', 'TrangThai' => 1],
            ['TenVe' => 'Vé Xem Phim', 'MaDsVe' => 1, 'ThanhTien' => 50000, 'MaLichChieu' => 1, 'MaGhe' => 'A10', 'TrangThai' => 1],
        ]);
    }
}