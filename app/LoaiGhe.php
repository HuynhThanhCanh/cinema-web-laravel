<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiGhe extends Model
{
    //
    protected $table ='LoaiGhe';
    public $timestamps=true;
    // 1 loại ghế có 1 giá và 1 giá cho nhiều loại ghế
    public function Gia()
    {
        return $this->hasOne('App\Gia', 'MaGia', 'MaGia');
    }
    
    // 1 loại ghế có nhiều ghế

    public function Ghe()
    {
        return $this->hasMany('App\Ghe', 'MaLoaiGhe', 'MaGhe');
    }

}
