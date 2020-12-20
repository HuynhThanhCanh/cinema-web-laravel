<?php

namespace App\Http\Controllers;

use App\ThoiGianChieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class XuatChieuController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index()
    {
        $phim=DB::select('select * from thoi_gian_chieus WHERE TrangThai=1');
        return view('pages.quan-ly-suat-chieu',compact('phim'));
     
    }
    public function create()
    {
        return view('pages.them.them-suat-chieu');
    }
    public function Add(Request $request)
    {
        $time=$request->input('suat-chieu');
        DB::table('thoi_gian_chieus')->insert(['ThoiGianChieu'=>$time,'TrangThai'=>1]);

        return redirect('/quan-ly-suat-chieu');
    }

    public function Edit($Ma)
    {   
        $SuatChieu=DB::select('SELECT * FROM thoi_gian_chieus WHERE MaThoiGianChieu=?',[$Ma]);

        return view('pages.cap-nhat.cap-nhat-suat-chieu',compact('SuatChieu'));
     
    }
    public function Del($Ma)
    {
        DB::update('UPDATE  thoi_gian_chieus SET TrangThai=0 WHERE MaThoiGianChieu=?',[$Ma]);
       
        return redirect('/quan-ly-suat-chieu');
    }
    public function Update(Request $request,$Ma)
    {
        $thoiGianChieu=$request->input('suat-chieu');
        DB::update('UPDATE  thoi_gian_chieus SET ThoiGianChieu=? WHERE MaThoiGianChieu=?',[$thoiGianChieu,$Ma]);

        return redirect('/quan-ly-suat-chieu');
    }
}
