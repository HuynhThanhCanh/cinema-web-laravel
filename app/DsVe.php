<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DsVe extends Model
{
    //
    protected $table ='Dsve';
    public $timestamps=true;
    // 1 danh sách vé có nhiều vé
    public function Ve()
    {
        return $this->hasMany('App\Ve', 'MaDsVe', 'MaVe');
    }
}

