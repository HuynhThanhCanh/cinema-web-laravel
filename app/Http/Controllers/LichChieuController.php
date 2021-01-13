<?php

namespace App\Http\Controllers;

use App\LichChieu;
use App\ThoiGianChieu;
use App\Rap;
use App\Phim;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class LichChieuController extends Controller
{
    private $queryLichChieu = 'SELECT lc.MaLichChieu,  p.TenPhim, r.TenRap, tgc.ThoiGianChieu, lc.NgayChieu, lc.TrangThai
                                FROM lich_chieus lc, thoi_gian_chieus tgc, phims p, raps r
                                WHERE lc.MaThoiGianChieu = tgc.MaThoiGianChieu && lc.MaPhim = p.MaPhim && lc.MaRap = r.MaRap && lc.TrangThai = 1
                                ORDER BY lc.NgayChieu DESC';
    //
    private $lichChieus;
    private $argsLichChieu;
    //
    function __construct()
    {
        $this->lichChieus = DB::select($this->queryLichChieu);
        $this->argsLichChieu = [];
    }

    function index()
    {
        $lichChieus = $this->lichChieus;
        return view('pages.quan-ly-lich-chieu', compact('lichChieus'));
    }

    function xepLichAJAX(Request $req)
    {
        if ($req->all() == []) {
            $argsGetPhim = Phim::all();
            return view('pages.them.xep-lich', compact('argsGetPhim'));
        } else {
            //Lấy data từ giao diện và model
            $argsMaPhim = $req->input('_danhSachPhim');
            $argsSuat = ThoiGianChieu::select('MaThoiGianChieu', 'ThoiGianChieu')->where("TrangThai", 1)->get();
            $argsRap = Rap::select('MaRap', 'TenRap')->where("TrangThai", 1)->get();
            $ngayChieu = $req->input('_ngayChieu');
            $argsRand = [];

            //Xử lý tính số lần xếp cho từng phim - chia đều
            $soLuongSuat = Count($argsSuat);
            $soLuongRap = Count($argsRap);
            $soLuongPhim = count($argsMaPhim);
            $soLanChieuCuaPhim = floor(($soLuongSuat * $soLuongRap) / $soLuongPhim);

            if ($soLanChieuCuaPhim != 0) {
                //Sếp lịch chiếu, tạo sẵn sườn để gán phim vào
                foreach ($argsRap as $rap) {
                    foreach ($argsSuat as $suat) {
                        $lichChieu = array(
                            "MaRap" => $rap['MaRap'],
                            "TenRap" => $rap['TenRap'],
                            "MaThoiGianChieu" => $suat['MaThoiGianChieu'],
                            "ThoiGianChieu" => $suat['ThoiGianChieu'],
                            "MaPhim" => null,
                            "TenPhim" => null,
                            "NgayChieu" => $ngayChieu
                        );
                        array_push($this->argsLichChieu, $lichChieu);
                    }
                }

                //Gán phim random vào lich
                $coutLichChieu = count($this->argsLichChieu);
                foreach ($argsMaPhim as $maPhim) {
                    for ($i = 0; $i < $soLanChieuCuaPhim; $i++) {
                        $flag = true;
                        $rand = rand(0, $coutLichChieu - 1);
                        if (in_array($rand, $argsRand)) {
                            if ($flag) {
                                --$i;
                                $flag = false;
                            }
                        } else {
                            $flag = true;
                            array_push($argsRand, $rand);
                            $this->argsLichChieu[$rand]["MaPhim"] = $maPhim;
                            $tenPhim = Phim::select("TenPhim")->where("MaPhim", "=", $maPhim)->get();

                            $this->argsLichChieu[$rand]["TenPhim"] = $tenPhim[0]['TenPhim'];
                        }
                    }
                }

                //Xử lý các lịch chiếu null
                $argsRand = [];
                $coutMaPhim = count($argsMaPhim);
                for ($iLich = 0; $iLich < $coutLichChieu; $iLich++) {
                    if ($this->argsLichChieu[$iLich]["MaPhim"] == null) {
                        $flag = true;
                        $rand = rand(0, $coutMaPhim - 1);

                        if (in_array($rand, $argsRand)) {
                            if ($flag) {
                                --$iLich;
                                $flag = false;
                            }
                        } else {
                            $flag = true;
                            array_push($argsRand, $rand);
                            $this->argsLichChieu[$iLich]["MaPhim"] = $argsMaPhim[$rand];
                            $tenPhim = Phim::select("TenPhim")->where("MaPhim", "=", $maPhim)->get();

                            $this->argsLichChieu[$iLich]["TenPhim"] = $tenPhim[0]['TenPhim'];
                        }
                    }
                }
                return response()->json(['success' => true, 'dataResponse' => $this->argsLichChieu]);
            }
            return response()->json(['success' => false, 'dataResponse' => $this->argsLichChieu]);
        }
    }

    function themLich()
    {
        $dsLichChieu = json_decode($_COOKIE['dsLichChieu']);

        foreach ($dsLichChieu as $lich) {
            $lichChieu = new LichChieu;
            $lichChieu->MaThoiGianChieu = $lich->MaThoiGianChieu;
            $lichChieu->NgayChieu = $lich->NgayChieu;
            $lichChieu->MaPhim = $lich->MaPhim;
            $lichChieu->MaRap = $lich->MaRap;
            $lichChieu->TrangThai = 1;

            try {
                $lichChieu->save();
            } catch (QueryException $err) {
                return "Lịch chiếu này đã tồn tại";
                //return $err;
            }
        }
        return redirect('/quan-ly-lich-chieu');
    }

    function timKiemLichTheoNgayChieu(Request $req)
    {
        $ngayChieu = $req->input('_ngayChieu');
        //$ngayChieu = '2020-12-21';
        $query = "SELECT lc.MaLichChieu, p.MaPhim, p.TenPhim, r.MaRap, r.TenRap, lc.MaThoiGianChieu, tgc.ThoiGianChieu, lc.NgayChieu
                    FROM lich_chieus lc, phims p, raps r, thoi_gian_chieus tgc
                    WHERE lc.NgayChieu like \"$ngayChieu\" && lc.MaRap = r.MaRap && p.MaPhim = lc.MaPhim && tgc.MaThoiGianChieu = lc.MaThoiGianChieu && lc.TrangThai = 1";
        $dsLichChieu = DB::select($query);
        return response()->json(['success' => 'Gọi data thành công.', 'dataResponse' => $dsLichChieu]);
    }

    function xoaLichTheoNgayChieu(Request $req)
    {
        $ngayChieu = $req->input('_ngayChieu');
        try {
            $deleteAfter = LichChieu::where('NgayChieu', $ngayChieu)->get();
            if (count($deleteAfter) == 0) {
                return response()->json(['success' => false]);
            }
            LichChieu::where("NgayChieu", $ngayChieu)->update(['TrangThai' => 0]);
            $this->lichChieus = DB::select($this->queryLichChieu);
            return response()->json(['success' => true, "dataResponse" => $this->lichChieus]);
        } catch (QueryException $err) {
            return response()->json(['success' => false]);
        }
    }

    //API
    function lichChieu($trangThai = null)
    {
        $query = 'SELECT lc.MaLichChieu, p.MaPhim. p.TenPhim, r.MaRap, r.TenRap, tgc.ThoiGianChieu, lc.NgayChieu, lc.TrangThai
                    FROM lich_chieus lc, thoi_gian_chieus tgc, phims p, raps r
                    WHERE lc.MaThoiGianChieu = tgc.MaThoiGianChieu && lc.MaPhim = p.MaPhim && lc.MaRap = r.MaRap';
        $lichChieu = null;
        if ($trangThai == null) {
            $lichChieu = DB::select($query);
        } else {
            $query = "SELECT lc.MaLichChieu, p.MaPhim, p.TenPhim, r.MaRap, r.TenRap, tgc.ThoiGianChieu, lc.NgayChieu, lc.TrangThai
                        FROM lich_chieus lc, thoi_gian_chieus tgc, phims p, raps r
                        WHERE lc.MaThoiGianChieu = tgc.MaThoiGianChieu && lc.MaPhim = p.MaPhim && lc.MaRap = r.MaRap && lc.TrangThai = $trangThai";
            $lichChieu = DB::select($query);
        }
        return response()->json(["lichChieu" => $lichChieu]);
    }

    function lichChieuTheoPhim($maPhim)
    {
        $query = "SELECT lc.MaLichChieu, p.MaPhim, p.TenPhim, r.MaRap, r.TenRap, tgc.ThoiGianChieu, lc.NgayChieu, lc.TrangThai
                        FROM lich_chieus lc, thoi_gian_chieus tgc, phims p, raps r
                        WHERE lc.MaThoiGianChieu = tgc.MaThoiGianChieu && lc.MaPhim = p.MaPhim && lc.MaRap = r.MaRap && lc.TrangThai = 1 && lc.MaPhim = $maPhim";
        $lichChieu = DB::select($query);
        return response()->json(["lichChieu" => $lichChieu]);
    }


    function lichChieuTheoNgay($ngayChieu)
    {
        $query = "SELECT lc.MaLichChieu, p.MaPhim, p.TenPhim, r.MaRap, r.TenRap, tgc.ThoiGianChieu, lc.NgayChieu, lc.TrangThai
                        FROM lich_chieus lc, thoi_gian_chieus tgc, phims p, raps r
                        WHERE lc.MaThoiGianChieu = tgc.MaThoiGianChieu && lc.MaPhim = p.MaPhim && lc.MaRap = r.MaRap && lc.TrangThai = 1 && lc.NgayChieu = $ngayChieu";
        $lichChieu = DB::select($query);
        return response()->json(["lichChieu" => $lichChieu]);
    }

    function lichChieuTheoRap($maRap)
    {
        $query = "SELECT lc.MaLichChieu, p.MaPhim, p.TenPhim, r.MaRap, r.TenRap, tgc.ThoiGianChieu, lc.NgayChieu, lc.TrangThai
                        FROM lich_chieus lc, thoi_gian_chieus tgc, phims p, raps r
                        WHERE lc.MaThoiGianChieu = tgc.MaThoiGianChieu && lc.MaPhim = p.MaPhim && lc.MaRap = r.MaRap && lc.TrangThai = 1 && lc.MaRap = $maRap";
        $lichChieu = DB::select($query);
        return response()->json(["lichChieu" => $lichChieu]);
    }

    function lichChieuTheoPhimVaNgay(Request $req)
    {
        $ngay = $req->ngay;
        $maPhim = $req->maPhim;

        //$lichChieus = LichChieu::where('NgayChieu', '=', $ngay)->where('MaPhim', '=', $maPhim)->get();
        $lichChieu = DB::table('lich_chieus')
            ->join('thoi_gian_chieus', 'thoi_gian_chieus.MaThoiGianChieu', '=', 'lich_chieus.MaThoiGianChieu')
            ->join('phims', 'phims.MaPhim', '=', 'lich_chieus.MaPhim')
            ->where('phims.MaPhim', '=', $maPhim)
            ->where('lich_chieus.NgayChieu', '=', $ngay)
            ->get();
        return response()->json(["lichChieu" => $lichChieu]);
    }
}