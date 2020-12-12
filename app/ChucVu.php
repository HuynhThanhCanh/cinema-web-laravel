<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    //
    protected $table='chuc_vus';
    public $timestamp=true;
     // 1 chức vụ cho nhiều nhân viên
    public function NhanVien()
    {
        return $this->hasMany('App\NhanVien', 'MaCV', 'MaCV');
    }
}