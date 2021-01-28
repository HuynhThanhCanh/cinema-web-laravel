<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    protected $table = 'binh_luans';
    public $timestamps = false;

    public function ThanhVien()
    {
        return $this->belongsTo('App\ThanhVien', 'MaTV', 'MaThanhVien');
    }

    public function Phim()
    {
        return $this->belongsTo('App\Phim', 'MaPhim', 'MaPhim');
    }
}