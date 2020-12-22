<?php

namespace App\Http\Controllers;

use App\LichChieu;
use App\ThoiGianChieu;
use App\Rap;
use App\Phim;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LichChieuController extends Controller
{
    private $lichChieus;
    private $argsLichChieu = [];
    //
    function __construct()
    {
        $this->lichChieus = DB::select('SELECT lc.MaLichChieu,  p.TenPhim, r.TenRap, tgc.ThoiGianChieu, lc.NgayChieu
                                        FROM lich_chieus lc, thoi_gian_chieus tgc, phims p, raps r
                                        WHERE lc.MaThoiGianChieu = tgc.MaThoiGianChieu && lc.MaPhim = p.MaPhim && lc.MaRap = r.MaRap');
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

            //Lại bỏ các phim có mã là null
            $argsLichChieu = array_filter($this->argsLichChieu, function ($lichChieu) {
                if ($lichChieu['MaPhim'] != null) {
                    return $lichChieu;
                }
            });

            return response()->json(['success' => 'Gọi data thành công.', 'dataResponse' => $argsLichChieu]);
        }
    }
}