<?php

namespace App\Http\Controllers;

use App\ThanhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThanhVienController extends Controller
{
    /**
     * API
     */
    public function insertThanhVien(Request $request)
    {
        $thanhvien = new ThanhVien;
        $thanhvien->Avatar = $request->Avatar;
        $thanhvien->HoTenTV = $request->HoTenTV;
        $thanhvien->NgaySinh = $request->NgaySinh;
        $thanhvien->SDT = $request->SDT;
        $thanhvien->Email = $request->Email;
        $thanhvien->Password = bcrypt($request->Password);
        $thanhvien->DiaChi = $request->DiaChi;
        $thanhvien->TrangThai = $request->TrangThai = 1;
        $thanhvien->save();
        return response()->json(['mess' => 'true']);
    }

    public function getThanhVien()
    {
        $thanhvien = ThanhVien::get();
        return response()->json($thanhvien);
    }

    public function getThanhVienTheoId($maTV)
    {
        $thanhvien = ThanhVien::where('MaThanhVien', $maTV)->get();
        return response()->json($thanhvien);
    }

    public function LoginApp(Request $request)
    {
        $arr = [
            $user = $request->User,
            $pass = $request->Pass,
        ];


        $thanhvien = DB::select('select * from thanh_viens ');
        foreach ($thanhvien as $item) {
            if ($user == $item->Email &&  $pass == $item->Password) {
                $check = ThanhVien::where('Email', '=', $item->Email)->first();


                return response()->json(['message' => 'true', 'User' => $check]);
            }
        }
        return response()->json(['message' => 'false']);
    }

    public function capNhatThanhVien(Request $request)
    {
        $maThanhVien = $request->maThanhVien;
        $hoTenTV = $request->hoTenTV;
        $sdt = $request->sdt;
        $diaChi = $request->diaChi;
        ThanhVien::where("MaThanhVien", $maThanhVien)
            ->update(['DiaChi' => $diaChi, 'SDT' => $sdt, 'HoTenTV' => $hoTenTV]);

        $thanhVien = ThanhVien::get();
        return $thanhVien;
    }
}