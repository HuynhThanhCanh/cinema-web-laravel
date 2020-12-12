<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiNhanh;

class ChiNhanhController extends Controller
{
    //
    public function getData(){
        $chiNhanh = new ChiNhanh;
        $data = $chiNhanh->all();
        echo json_encode($data);
    }
}
