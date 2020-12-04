<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiNhanh extends Model
{
    //  
    protected $table = 'ChiNhanh';
    public $timetamps =true; 
    // 1 chi nhánh có 1 viên quản lý
    public function NhanVien()
    {
        return $this->hasOne('App\NhanVien', 'MaNV', 'MaNV');
    }
    // 1 chi nhánh có nhiều rạp
    public function Rap()
    {
        return $this->hasMany('App\Rap', 'MaChiNhanh', 'MaRap');
    }
    
}
