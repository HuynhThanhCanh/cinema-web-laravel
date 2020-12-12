<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapController extends Controller
{
    //
    public function index(){
        return view('pages.quan-ly-rap');
    }

    public function themRap(){
        return view('pages.them.them-rap');
    }

    public function capNhatRap(){
        return view('pages.cap-nhat.cap-nhat-rap');
    }
}