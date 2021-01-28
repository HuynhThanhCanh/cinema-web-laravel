<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThanhVien;
use App\Phim;
use App\BinhLuan;

use Illuminate\Support\Facades\DB;

class BinhLuanController extends Controller
{
    //API
    public function layDanhSachBinhLuan(Request $req)
    {
        $MaPhim = $req->maPhim;

        $query = DB::table('binh_luans')
            ->join('phims', 'phims.MaPhim', '=', 'binh_luans.MaPhim')
            ->join('thanh_viens', 'thanh_viens.MaThanhVien', '=', 'binh_luans.MaTV')
            ->where('binh_luans.MaPhim', $MaPhim)
            ->select('phims.MaPhim', 'thanh_viens.HoTenTV', 'binh_luans.NoiDungBinhLuan', 'binh_luans.ThoiGianBinhLuan')
            ->get();
        return response()->json($query);
    }

    public function themBinhLuanMoi(Request $req)
    {
        $MaTV = $req->maTV;
        $MaPhim = $req->maPhim;
        $NoiDung = $req->noiDung;

        $binhLuan = new BinhLuan;
        $binhLuan->MaTV = $MaTV;
        $binhLuan->MaPhim = $MaPhim;
        $binhLuan->NoiDungBinhLuan = $NoiDung;

        $binhLuan->save();
    }
}