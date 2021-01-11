<?php

namespace App\Http\Controllers;

use App\LichChieu;
use App\ThoiGianChieu;
use App\Rap;
use App\Phim;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class LichChieuController extends Controller
{
    private $queryLichChieu = 'SELECT lc.MaLichChieu,  p.TenPhim, r.TenRap, tgc.ThoiGianChieu, lc.NgayChieu, lc.TrangThai
                                FROM lich_chieus lc, thoi_gian_chieus tgc, phims p, raps r
                                WHERE lc.MaThoiGianChieu = tgc.MaThoiGianChieu && lc.MaPhim = p.MaPhim && lc.MaRap = r.MaRap && lc.TrangThai = 1';
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
            $argsSuat = ThoiGianChieu::select('MaThoiGianChieu', 'ThoiGianChieu')->get();
            $argsRap = Rap::select('MaRap', 'TenRap')->get();
            $ngayChieu = $req->input('_ngayChieu');
            $argsRand = [];

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

            //Xử lý tính số lần xếp cho từng phim - chia đều
            $soSuatChieu = DB::select('SELECT COUNT(MaThoiGianChieu) "soSuatChieu"
                                        FROM thoi_gian_chieus
                                        WHERE TrangThai = 1');
            $soLuongPhim = count($argsMaPhim);
            $soSuatChieu = $soSuatChieu[0]->soSuatChieu;
            $soLanChieuCuaPhim = $soSuatChieu / $soLuongPhim;

            //Gán phim random vào lich chiếu
            foreach ($argsMaPhim as $maPhim) {
                $count = count($this->argsLichChieu);
                for ($i = 0; $i < $soLanChieuCuaPhim; $i++) {
                    $flag = true;
                    $rand = rand(0, $count - 1);
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

            //Loại bỏ các phim có mã là null
            $this->argsLichChieu = array_filter($this->argsLichChieu, function ($lichChieu) {
                if ($lichChieu['MaPhim'] != null) {
                    return $lichChieu;
                }
            });
            return response()->json(['success' => 'Gọi data thành công.', 'dataResponse' => $this->argsLichChieu]);
        }
    }

    function themLich()
    {
        $dsLichChieu = json_decode($_COOKIE['dsLichChieu']);

        foreach ((array)$dsLichChieu as $lich) {
            $lichChieu = new LichChieu;
            $lichChieu->MaThoiGianChieu = $lich->MaThoiGianChieu;
            $lichChieu->NgayChieu = $lich->NgayChieu;
            $lichChieu->MaPhim = $lich->MaPhim;
            $lichChieu->MaRap = $lich->MaRap;
            $lichChieu->TrangThai = 1;
            //echo var_dump($lichChieu->save());
            try {
                $lichChieu->save();
                return redirect('/quan-ly-lich-chieu');
            } catch (QueryException $err) {
                return "Lịch chiếu này đã tồn tại";
            }
        }
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

        $lichChieu = LichChieu::where('NgayChieu', '=', $ngay)->where('MaPhim', '=', $maPhim)->get();
        return response()->json(["lichChieu" => $lichChieu]);
    }
}