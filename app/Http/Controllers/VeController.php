<?php

namespace App\Http\Controllers;

use App\Ve;

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
}