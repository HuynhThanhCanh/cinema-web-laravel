<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gia extends Model
{
    //
    protected $table = 'gias';
    public $timestamps = true;
    // 1 giá thuộc nhiều  loại ghế
    public function LoaiGhe()
    {
        return $this->hasOne('App\LoaiGhe', 'MaGia', 'MaLoaiGhe');
    }
}