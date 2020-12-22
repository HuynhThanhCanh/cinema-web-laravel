<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use App\LoaiPhim;
use App\NhanVien;
class TheLoaiPhimController extends Controller
{
    //
    public function index()
    {
        $nhanvien=DB::select('SELECT DISTINCT  nhan_viens.TenNV FROM loai_phims, nhan_viens WHERE loai_phims.MaNV=nhan_viens.MaNV');
        $loaiphim=DB::select('select * from loai_phims where TrangThai =? ', [1]);
        return view('pages.quan-ly-the-loai-phim',compact('loaiphim','nhanvien'));
    }
    public function themLoaiPhim(){
     
       return view('pages.them.them-the-loai-phim',compact('loaiphim','nhanvien'));

    }

    public function addLoaiPhim( Request $request)
    {
       
        $TenLoaiPhim = $request -> input('ten-loai-phim');
        $MaNV =$request->input('MaNV','1');
        $TrangThai=$request->input('optradio');

       $data=array('TenLoaiPhim'=>$TenLoaiPhim,'MaNV'=>$MaNV,'TrangThai'=>$TrangThai);
       DB::table('loai_phims')->insert($data);
      return redirect('/quan-ly-the-loai-phim');       

    }

    public function suaLoaiPhim( Request $request)
    {
        $TenLoaiPhim = $request -> input('ten-loai-phim');
        $MaNV =$request->input('MaNV','1');
        $TrangThai=$request->input('optradio');

       DB::update('update loai_phims set TenLoaiPhim = ? TrangThai=? where MaLoaiPhim = ?', [$TenLoaiPhim,$TrangThai,$MaLoaiPhim ]);
        return redirect('/quan-ly-the-loai-phim');
    }

    public function capNhatLoaiPhim()
    {
        
        $loaiphim=DB::select('select * from loai_phims where TrangThai =? ', [1]);
        return view('pages.cap-nhat.cap-nhat-the-loai-phim',compact('loaiphim'));
    }

    public function XoaLoaiPhim($MaLoaiPhim)
    {
        DB::update('update loai_phims set TrangThai=-1 where MaLoaiPhim=?', [$MaLoaiPhim]);
        return redirect('/quan-ly-the-loai-phim');  
    }
    
}
