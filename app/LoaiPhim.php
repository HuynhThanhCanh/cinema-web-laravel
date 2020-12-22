<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Request;

class LoaiPhim extends Model
{
    //
    protected $table='loai_phims';
	public $timestamp=true;
    // 1 loại phim đc nhiều nhân viên thêm( chút sửa lại)
    public function NhanVien()
    {
        return $this->belongsTo('App\NhanVien', 'MaNV', 'MaNV');
    }
   
}
