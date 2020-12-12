<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhimController extends Controller
{
    //
    public function index(){
        return view('pages.quan-ly-phim');
    }

    public function themPhim(){
        return view('pages.them.them-phim');
    }

    public function capNhatPhim(){
        return view('pages.cap-nhat.cap-nhat-phim');
    }
}
