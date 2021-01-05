<?php

namespace App\Http\Controllers;
use App\ThanhVien;
use Illuminate\Http\Request;

class ThanhVienController extends Controller
{
    //
    public function insertThanhVien(Request $request)
    {
        $thanhvien= new ThanhVien;
        $thanhvien->Avatar=$request->Avatar;
        $thanhvien->HoTenTV=$request->HoTenTV;
        $thanhvien->NgaySinh=$request->NgaySinh;
        $thanhvien->SDT=$request->SDT;
        $thanhvien->Email=$request->Email;
        $thanhvien->Password=$request->Password;
        $thanhvien->DiaChi=$request->DiaChi;
        $thanhvien->TrangThai=$request->TrangThai;
        $thanhvien->save();
        return response()->json($thanhvien, 201);

    }
    public function getThanhVien(Request $request)
    {
        
    }

}
