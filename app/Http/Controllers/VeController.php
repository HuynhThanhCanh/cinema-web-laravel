<?php

namespace App\Http\Controllers;

use App\Ve;
use App\DsVe;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class VeController extends Controller
{
    //
    function index()
    {
        $ves = DB::select('SELECT v.MaVe, v.TenVe, v.MaDsVe, p.TenPhim,v.ThanhTien, v.ThoiGianMua, v.MaLichChieu, v.MaGhe
                            FROM ves v, lich_chieus lc, phims p
                            WHERE v.MaLichChieu = lc.MaLichChieu AND lc.MaPhim = p.MaPhim');
        return view('pages.quan-ly-ve', compact('ves'));
    }
    /**
     *API
     */
    public function DanhSachVe(Request $request)
    {
        $dsve = new DsVe();
        $dsve->Soluong = $request->SoLuong;
        $dsve->TongThanhTien = $request->TongThanhTien;
        $dsve->MaTV = $request->MaTV;
        $dsve->TrangThai = 1;
        $dsve->save();

        return response()->json(['message' => $dsve]);
    }
    public function DatVe(Request $request)
    {
        $ve = new Ve;
        $ve->TenVe = "ve xem phim";
        $ve->MaDsVe = $request->MaDsVe;
        $ve->ThanhTien = $request->ThanhTien;
        $ve->ThoiGianMua = $request->ThoiGianMua;
        $ve->MaLichChieu = $request->MaLichChieu;
        $ve->MaGhe = $request->MaGhe;
        $ve->TrangThai = 1;
        $ve->save();
        return response()->json(['message' => $ve]);
    }
}