<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DsVe extends Model
{
    //
    protected $table ='ds_ves';
    public $timestamps=false;
    // 1 danh sách vé có nhiều vé
    public function Ve()
    {
        return $this->hasMany('App\Ve', 'MaDsVe', 'MaDsVe');
    }
    //1 danh sách dành cho 1 thành viên
    public function ThanhVien()
    {
        return $this->belongsTo('App\ThanhVien', 'MaTV', 'MaThanhVien');
    }
}
