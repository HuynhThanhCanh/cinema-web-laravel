<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhVien extends Model
{
    //
    protected $table = 'thanh_viens';
    public $timestamps = false;
    // 1 thành viên có nhiều danh sách vé
    public function DanhSachVe()
    {
        return $this->hasMany('App\DsVe', 'MaTV', 'MaThanhVien');
    }
}