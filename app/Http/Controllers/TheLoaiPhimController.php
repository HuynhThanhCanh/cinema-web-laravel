<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TheLoaiPhimController extends Controller
{
    //
    public function index(){
        return view('pages.quan-ly-the-loai-phim');
    }

    public function themLoaiPhim(){
        return view('pages.them.them-the-loai-phim');
    }

    public function capNhatLoaiPhim(){
        return view('pages.cap-nhat.cap-nhat-the-loai-phim');
    }
}
