<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    //
    protected $table = 'Ghe';
    public $timestamps=true;
    //1 ghế chỉ thuộc về 1 loại ghế và 1 loại ghế có nhiều ghế
    public function LoaiGhe()
    {
        return $this->beLongsTo('App\LoaiGhe', 'MaLoaiGhe', 'MaLoaiGhe');
    }

}
