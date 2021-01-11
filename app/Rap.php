<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rap extends Model
{
    //
    protected $table = 'raps';
    public $timestamps =false;
    // 1 rạp chỉ 1 chi nhánh
    public function ChiNhanh()
    {
        return $this->belongsTo('App\ChiNhanh', 'MaChiNhanh', 'MaChiNhanh');
    }
    //  1 rạp có nhiều lịch chiếu
    public function LichChieu()
    {
        return $this->hasMany('App\LichChieu', 'MaRap', 'MaRap');
    }

    //1 rạp có nhiều ghế
    public function Ghe()
    {
        return $this->hasMany('App\Ghe', 'MaGhe', 'MaGhe');
    }
}