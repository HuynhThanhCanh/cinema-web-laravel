<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    //
    protected $table = 'ghes';
    public $timestamps=false;
    //1 ghế chỉ thuộc về 1 loại ghế và 1 loại ghế có nhiều ghế
    public function LoaiGhe()
    {
        return $this->beLongsTo('App\LoaiGhe', 'MaLoaiGhe', 'MaLoaiGhe');
    }

    //1 ghế chỉ thuộc về 1 rạp và 1 rạp có nhiều ghế
    public function Rap()
    {
        return $this->beLongsTo('App\Rap', 'MaRap', 'MaRap');
    }
}