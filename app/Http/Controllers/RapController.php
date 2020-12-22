<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ghe;



class RapController extends Controller
{
    //
    public function index(){
        return view('pages.quan-ly-rap');
        //return $this->api_success(Rap::all());

    }

    public function themRap(){
        return view('pages.them.them-rap');
    }

    public function capNhatRap(){
        return view('pages.cap-nhat.cap-nhat-rap');
    }
    public function LayMaghe(){
        $result= DB::select('select MaGhe,MaLoaiGhe from Ghes ');
       
        return response()->json($result);
    }
    
}