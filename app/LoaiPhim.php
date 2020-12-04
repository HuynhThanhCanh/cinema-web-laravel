<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiPhim extends Model
{
    //
    protected $table='LoaiPhim';
	public $timestamp=true;
    // 1 loại phim đc nhiều nhân viên thêm( chút sửa lại)
    public function NhanVien()
    {
        return $this->hasOne('App\NhanVien', 'MaNV', 'MaNV');
    }
}
