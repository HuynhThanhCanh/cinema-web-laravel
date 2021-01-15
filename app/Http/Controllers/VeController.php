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
        $ves = DB::table('ves')
            ->join('lich_chieus', 'lich_chieus.MaLichChieu', '=', 'ves.MaLichChieu')
            ->join('phims', 'phims.MaPhim', '=', 'lich_chieus.MaPhim')
            ->join('ds_ves', 'ds_ves.MaDsVe', '=', 'ves.MaDsVe')
            ->join('thanh_viens', 'thanh_viens.MaThanhVien', '=', 'ds_ves.MaTV')
            ->select('thanh_viens.HoTenTV', 'ves.MaVe', 'ves.TenVe', 'ves.MaDsVe', 'phims.TenPhim', 'ves.ThanhTien', 'ves.ThoiGianMua', 'ves.MaLichChieu', 'ves.MaGhe')
            ->get();
        //return json_encode($ves);
        return view('pages.quan-ly-ve', compact('ves'));
    }

    function timKiemVe(Request $req)
    {
        $keyWork = $req->value;
        $ves = DB::table('ves')
            ->join('lich_chieus', 'lich_chieus.MaLichChieu', '=', 'ves.MaLichChieu')
            ->join('phims', 'phims.MaPhim', '=', 'lich_chieus.MaPhim')
            ->join('ds_ves', 'ds_ves.MaDsVe', '=', 'ves.MaDsVe')
            ->join('thanh_viens', 'thanh_viens.MaThanhVien', '=', 'ds_ves.MaTV')
            ->where('thanh_viens.HoTenTV', 'like', $keyWork . '%')
            ->orWhere('phims.TenPhim', 'like', $keyWork . '%')
            ->select('thanh_viens.HoTenTV', 'ves.MaVe', 'ves.TenVe', 'ves.MaDsVe', 'phims.TenPhim', 'ves.ThanhTien', 'ves.ThoiGianMua', 'ves.MaLichChieu', 'ves.MaGhe')
            ->get();

        return response()->json(['dsVe' => $ves]);
    }
    /**
     *API
     */

    public function DatVe(Request $request)
    {
        $ve = new Ve;
        $ve->TenVe = "ve xem phim";
        $ve->MaDsVe = $request->MaDsVe;
        $ve->ThanhTien = $request->ThanhTien;
        $ve->MaLichChieu = $request->MaLichChieu;
        $ve->MaGhe = $request->MaGhe;
        $ve->TrangThai = 1;
        $ve->save();
        return response()->json(['message' => $ve]);
    }

    public function layDanhSachVeThanhVien(Request $request, $maTV, $maDsVe = null)
    {
        $maTV = $request->maTV;
        $maDsVe = $request->maDsVe;
        $result = DsVe::where('MaTV', $maTV)->get();
        if ($maDsVe == null) {
            return response()->json(['dsVe' => $result]);
        } else {
            $result = Ve::where('MaDsVe', $maDsVe)->get();
        }
        return response()->json(['dsVe' => $result]);
    }

    public function layVeThanhVien($maTV)
    {
        $result = DB::table('ves')->join('ds_ves', 'ds_ves.MaDsVe', '=', 'ves.MaDsVe')
            ->join('thanh_viens', 'thanh_viens.MaThanhVien', '=', 'ds_ves.MaTV')
            ->join('lich_chieus', 'lich_chieus.MaLichChieu', '=', 'ves.MaLichChieu')
            ->join('phims', 'phims.MaPhim', '=', 'lich_chieus.MaPhim')
            ->join('raps', 'raps.MaRap', '=', 'lich_chieus.MaRap')
            ->join('chi_nhanhs', 'chi_nhanhs.MaChiNhanh', '=', 'raps.MaChiNhanh')
            ->where('thanh_viens.MaThanhVien', '=', $maTV)
            ->select('chi_nhanhs.TenChiNhanh', 'phims.TenPhim', 'ves.ThoiGianMua', 'ves.MaGhe', 'ves.ThanhTien')
            ->get();
        return response()->json($result);
    }

    public function checkGhe(Request $request)
    {
        $maLichChieu = $request->maLichChieu;
        $maGhe = $request->maGhe;

        $result = Ve::where('MaLichChieu', $maLichChieu)
            ->where('MaGhe', $maGhe)
            ->count();

        if ($result > 0) {
            return response()->json(true);
        }
        return response()->json(false);
    }

    public function tongChiTieuTrongNam(Request $request)
    {
        $nam = $request->nam;
        $maTV = $request->maTV;
        $tongChiTieu = DB::table('ves')
            ->join('ds_ves', 'ds_ves.MaDsVe', '=', 'ves.MaDsVe')
            ->where('ds_ves.MaTV', $maTV)
            ->where('ds_ves.TrangThai', 1)
            ->where('ves.TrangThai', 1)
            ->whereYear('ves.ThoiGianMua', $nam)
            ->sum('ves.ThanhTien');
        return $tongChiTieu;
    }

    public function tongChiTieuTrongKhoangThoiGian(Request $request)
    {
        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;
        $maTV = $request->maTV;
        $tongChiTieu = DB::table('ves')
            ->join('ds_ves', 'ds_ves.MaDsVe', '=', 'ves.MaDsVe')
            ->where('ds_ves.MaTV', $maTV)
            ->where('ds_ves.TrangThai', 1)
            ->where('ves.TrangThai', 1)
            ->whereBetween('ves.ThoiGianMua', [$ngayBatDau, $ngayKetThuc])
            ->sum('ves.ThanhTien');
        return $tongChiTieu;
    }
}