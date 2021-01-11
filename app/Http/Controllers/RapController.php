<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ghe;



class RapController extends Controller
{
    //
    public function index()
    {
        return view('pages.quan-ly-rap');
        //return $this->api_success(Rap::all());

    }

    public function themRap()
    {
        return view('pages.them.them-rap');
    }

    public function capNhatRap()
    {
        return view('pages.cap-nhat.cap-nhat-rap');
    }
    public function LayMaghe()
    {
        $result = DB::select('select MaGhe,MaLoaiGhe from Ghes ');

        return response()->json($result);
    }

    /**
     * API
     * Author: Huỳnh Thanh Cảnh
     */
    function laySoDoRap(Request $request)
    {
        // $maPhim = $request->maPhim;
        // $ngayChieu = $request->ngayChieu;
        $maLichChieu = $request->maLichChieu;
        $lichChieu = DB::select("SELECT *
                                FROM lich_chieus lc
                                WHERE lc.MaLichChieu = $maLichChieu");
        $argsGhe = Ghe::where('MaRap', $lichChieu[0]->MaRap)->get();
        $argsVe = DB::select("SELECT *
                                FROM ves v
                                WHERE v.MaLichChieu = $maLichChieu");
        foreach ($argsVe as $ve) {
            for ($iGhe = 0; $iGhe < count($argsGhe); $iGhe++) {
                if ($argsGhe[$iGhe]->MaGhe === $ve->MaGhe) {
                    $argsGhe[$iGhe]->TrangThai = 0;
                }
            }
        }
        return response()->json(["dsGhe" => $argsGhe, "lichChieu" => $lichChieu]);
    }
}