<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
    protected $table = 'NhanVien'
    public $timestamps = true;
    // nhân viên là người quản lý
    public function NhanVien()
    {
        return $this->hasMany('App\NhanVien', 'MaNQL', 'MaNQL');
    }
    // nhân viên có 1 chức vụ
    public function ChucVu()
    {
        return $this->hasOne('App\ChucVu', 'MaCV', 'MaCV');
    }
}
