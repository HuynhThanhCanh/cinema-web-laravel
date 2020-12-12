<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
    protected $table = 'nhan_viens';
    public $timestamps = true;
    // nhân viên là người quản lý
    public function NhanVien()
    {
        return $this->hasMany('App\NhanVien', 'MaNQL', 'MaNV');
    }
    // public function NhanVien()
    // {
    //     return $this->belongsTo('App\NhanVien', 'MaNQL', 'MaNV');
    // }
    // nhân viên có 1 chức vụ
    public function ChucVu()
    {
        return $this->belongsTo('App\ChucVu', 'MaCV', 'MaCV');
    }
}
