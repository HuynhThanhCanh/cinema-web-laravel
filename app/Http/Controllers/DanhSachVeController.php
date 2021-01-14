<?php

namespace App\Http\Controllers;

use App\DsVe;

use Illuminate\Http\Request;

class DanhSachVeController extends Controller
{
    //
    public function themDanhSachVe(Request $request)
    {
        $dsve = new DsVe();
        $dsve->Soluong = $request->SoLuong;
        $dsve->TongThanhTien = $request->TongThanhTien;
        $dsve->MaTV = $request->MaTV;
        $dsve->TrangThai = 1;
        $dsve->save();

        return response()->json(['message' => $dsve]);
    }

    function layMaDsVeCuoiCung()
    {
        $dsVe = DsVe::orderby('MaDsVe', 'desc')->limit(1)->select('MaDsVe')->get();
        return json_encode($dsVe);
    }
}