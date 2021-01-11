<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeController extends Controller
{
    //
    public function DanhSachVe(Request $request)
    {
        $dsve= new DsVe();
        $dsve->Soluong=$request->SoLuong;
        $dsve->TongThanhTien=$request->TongThanhTien;
        $dsve->MaTV=$request->MaTV;
        $dsve->TrangThai=1;
        $dsve->save();

        return response()->json(['message'=>$dsve]);
    }
    public function DatVe(Request $request)
    {
        $ve= new Ve;
        $ve->TenVe="ve xem phim";
        $ve->MaDsVe=$request->MaDsVe;
        $ve->ThanhTien=$request->ThanhTien;
        $ve->ThoiGianMua=$request->ThoiGianMua;
        $ve->MaLichChieu=$request->MaLichChieu;
        $ve->MaGhe=$request->MaGhe;
        $ve->TrangThai=1;
        $ve->save();
        return response()->json(['message'=>$ve]);
    }
}
