<?php

namespace App\Http\Controllers;

use App\ThanhVien;

use Illuminate\Http\Request;

class ThanhVienController extends Controller
{
    //
    function capNhatThanhVien(Request $request)
    {
        $maThanhVien = $request->maThanhVien;
        $diaChi = $request->diaChi;
        ThanhVien::where("MaThanhVien", $maThanhVien)->update(['DiaChi' => $diaChi]);
    }
}