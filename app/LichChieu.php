<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    //
    protected $table = 'lich_chieus';
    public $timestamps = false;

    //1 lịch chiếu được chiếu trong 1 rạp

    public function Rap()
    {
        return $this->belongsTo('App\Rap', 'MaRap', 'MaRap');
    }
    //1 lịch chiếu được chiếu được 1 phim
    public function Phim()
    {
        return $this->belongsTo('App\Phim', 'MaPhim', 'MaPhim');
    }
    //1 lịch chiếu thuộc về 1 thời gian chiếu
    public function ThoiGianChieu()
    {
        return $this->belongsTo('App\ThoiGianChieu', 'MaThoiGianChieu', 'MaThoiGianChieu');
    }
}