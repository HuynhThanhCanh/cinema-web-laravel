<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioiHanTuoi extends Model
{
    //
    protected $table = 'gioi_han_tuois';
    public $timestamps=false;
    // 1 giới hạn tuổi thuộc về nhiều phim

    public function Phim()
    {
        return $this->hasMany('App\Phim', 'Nhan', 'MaGioiHan');
    }

}