<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ghe;
use App\Rap;
use App\ChiNhanh;



class RapController extends Controller
{
    //
    public function index()
    {
        $raps = DB::table('raps')->join('chi_nhanhs', 'raps.MaChiNhanh', '=', 'chi_nhanhs.MaChiNhanh')->where('raps.TrangThai', '<>', '-1')->get();
        return view('pages.quan-ly-rap', compact('raps'));
    }

    public function themRap()
    {
        return view('pages.them.them-rap');
    }

    public function addRap(Request $req)
    {
        $tenRap = $req->input('ten-rap');
        $soLuongGhe = 50;
        $rap = new Rap;
        $rap->TenRap = $tenRap;
        $rap->SoLuongGhe = $soLuongGhe;
        $rap->MaChiNhanh = 1;
        $rap->TrangThai = 1;
        $rap->save();
        return redirect('/quan-ly-rap');
    }

    public function edit($MaRap)
    {
        $raps = DB::table('raps')->join('chi_nhanhs', 'raps.MaChiNhanh', '=', 'chi_nhanhs.MaChiNhanh')->where('raps.MaRap', '=', $MaRap)->get();
        return view('pages.cap-nhat.cap-nhat-rap', compact('raps'));
    }

    public function update(Request $req, $MaRap)
    {
        $tenRap = $req->input('ten-rap');
        $rap = Rap::where("MaRap", '=', $MaRap)->update(['TenRap' => $tenRap]);
        return redirect('/quan-ly-rap');
    }

    public function delete($MaRap)
    {
        $result = DB::select('select MaGhe,MaLoaiGhe from Ghes ');
        $rap = Rap::where("MaRap", '=', $MaRap)->update(['TrangThai' => -1]);
        return redirect('/quan-ly-rap');
    }

    public function LayMaghe()
    {
        $result = DB::select('select MaGhe,MaLoaiGhe from Ghes ');
        return response()->json($result);
    }

    /**
     * API
     */
    function laySoDoRap(Request $request)
    {
        $maLichChieu = $request->maLichChieu;
        $lichChieu = DB::select("SELECT *
                                FROM lich_chieus lc
                                WHERE lc.MaLichChieu = $maLichChieu");
        $argsGhe = DB::table('ghes')
            ->join('loai_ghes', 'loai_ghes.MaLoaiGhe', '=', 'ghes.MaLoaiGhe')
            ->join('gias', 'gias.MaGia', '=', 'loai_ghes.MaGia')
            ->where('ghes.MaRap', $lichChieu[0]->MaRap)
            ->orderBy('ghes.MaGhe', 'asc')
            ->get();
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