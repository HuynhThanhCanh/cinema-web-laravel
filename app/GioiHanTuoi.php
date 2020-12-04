<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioiHanTuoi extends Model
{
    //
    protected $table = 'GioiHanTuoi';
    public $timestamps=true;
    // 1 giới hạn tuổi thuộc về nhiều phim
    
    public function Phim()
    {
        return $this->belongsTo('App\Phim', 'MaLoaiPhim', 'MaPhim');
    }
    
}
