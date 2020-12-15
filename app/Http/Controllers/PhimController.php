<?php

namespace App\Http\Controllers;
use App\Phim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class PhimController extends Controller
{
    //
    public function index(){
        $phim=Phim::orderby('MaPhim')->paginate(10);
        return view('pages.quan-ly-phim',compact('phim'));
    }

    public function themPhim(){
        $loaiphim=DB::table('loai_phims')
       ->select('loai_phims.TenLoaiPhim','loai_phims.MaLoaiPhim')
       ->get();
       
       $nhan=DB::table('gioi_han_tuois')
       ->select('gioi_han_tuois.TenGioiHan','gioi_han_tuois.MaGioiHan')
       ->get();
        return view('pages.them.them-phim',compact('loaiphim','nhan'));
    }

    public function capNhatPhim($MaPhim){
        $phim=DB::select('select * from phims where MaPhim = ?',[$MaPhim]);
        $loaiphim=DB::select('select * from loai_phims');
        $nhan=DB::select('select * from gioi_han_tuois');
        return view('pages.cap-nhat.cap-nhat-phim',compact('phim','loaiphim','nhan'));
    }

    public function addPhim(Request $request)
    {
       $TenPhim=$request->input('ten-phim');
       $NgayDKChieu=$request->input('ngay-dk-chieu');
       $NgayKetThuc=$request->input('ngay-ket-thuc');
       $ThoiLuong=$request->input('thoi-luong-chieu');
       $DaoDien=$request->input('dao-dien');
       $DienVien=$request->input('dien-vien');
       $Diem=$request->input('Diem','0');
       $HinhAnh=$request->input('hinh-anh');
       $LinkPhim=$request->input('link-trailer');
       $MaLoaiPhim=$request->input('loai-phim');
       $MaNV=$request->input('MaNV','1');
       $Nhan=$request->input('nhan');
       $TrangThai=$request->input('trang-thai');
       $data=array('TenPhim'=>$TenPhim,'NgayDKChieu'=>$NgayDKChieu,'NgayKetThuc'=>$NgayKetThuc,'ThoiLuong'=>$ThoiLuong,'DaoDien'=>$DaoDien,'DienVien'=>$DienVien,'Diem'=>$Diem,'HinhAnh'=>$HinhAnh,'LinkPhim'=>$LinkPhim,'MaLoaiPhim'=>$MaLoaiPhim,'MaNV'=>$MaNV,'Nhan'=>$Nhan,'TrangThai'=>$TrangThai);
        DB::table('phims')->insert($data);
      return redirect('/quan-ly-phim');
    }   
    
    public function editPhim(Request $request,$MaPhim)
    {
        $TenPhim=$request->input('ten-phim');
        $NgayDKChieu=$request->input('ngay-dk-chieu');
        $NgayKetThuc=$request->input('ngay-ket-thuc');
        $ThoiLuong=$request->input('thoi-luong-chieu');
        $DaoDien=$request->input('dao-dien');
        $DienVien=$request->input('dien-vien');
        $Diem=$request->input('Diem','0');
        $HinhAnh=$request->input('hinh-anh');
        $LinkPhim=$request->input('link-trailer');
        $MaLoaiPhim=$request->input('loai-phim');
        $MaNV=$request->input('MaNV','1');
        $Nhan=$request->input('nhan');
        $TrangThai=$request->input('optradio');
        DB::update('update phims set TenPhim = ?, NgayDKChieu = ?, NgayKetThuc= ?, ThoiLuong= ?,DaoDien=?, DienVien=?,Diem=?,HinhAnh=?,LinkPhim=?,MaLoaiPhim=?,MaNV=?,Nhan=?,TrangThai=? where MaPhim = ?',
        [ $TenPhim,$NgayDKChieu,$NgayKetThuc,$ThoiLuong,$DaoDien,$DienVien,$Diem,$HinhAnh,$LinkPhim,$MaLoaiPhim,$MaNV, $Nhan,$TrangThai,$MaPhim]);
        return redirect('/quan-ly-phim');
    }
    public function deletePhim($MaPhim)
	{
        //DB::delete('DELETE From phims where MaPhim=?',[$MaPhim]);
        phim::where('MaPhim',$MaPhim)->delete();
        return redirect('/quan-ly-phim');
    }
    public function getAPIPhim()
    {   
        return response()->json(Phim::get(),200);
    }
    public function getAPIPhimbyID($MaPhim)
    {
        $phim=DB::select('select * from phims where MaPhim = ?',[$MaPhim]);
        return response()->json($phim);
    }
    
}
