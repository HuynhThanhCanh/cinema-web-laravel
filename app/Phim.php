<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    //
    protected $table = 'phims';
    public $timestamps = false;

    // 1 phim có 1 loại phim
    public  function LoaiPhim()
    {
        # code...
            return $this->belongsTo('App\LoaiPhim', 'MaLoaiPhim', 'MaLoaiPhim');
    }

    // 1 phim được 1 nhân viên thêm phim
    public function NhanVien()
    {
        return $this->belongsTo('App\NhanVien', 'MaNV', 'MaNV');
    }
    // 1 phim chỉ 1 giới hạn tuổi
    public function GioiHanTuoi()
    {
        return $this->belongsTo('App\GioiHanTuoi', 'Nhan', 'MaGioiHan');
    }

    // 1 phim được có nhiều lịch chiếu
    public function LichChieu()
    {
        return $this->hasMany('App\LichChieu', 'MaPhim', 'MaPhim');
    }
}
