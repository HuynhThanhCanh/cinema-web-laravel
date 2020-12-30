<?php

namespace App\Http\Controllers;
use App\Phim;
use App\LoaiPhim;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class PhimController extends Controller
{
    //
    public function index(){
        //$phim=Phim::orderby('MaPhim')->paginate(10);
        $phim=DB::select('select  phims.* ,loai_phims.TenLoaiPhim,gioi_han_tuois.TenGioiHan from phims, loai_phims,gioi_han_tuois where phims.MaLoaiPhim=loai_phims.MaLoaiPhim and phims.Nhan=gioi_han_tuois.MaGioiHan and phims.TrangThai!=-1 ');
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
        $phim=DB::select('select * from phims , nhan_viens where MaPhim = ? and phims.MaNV=nhan_viens.id ',[$MaPhim]);
        $loaiphim=DB::select('select * from loai_phims');
        $nhan=DB::select('select * from gioi_han_tuois');
        return view('pages.cap-nhat.cap-nhat-phim',compact('phim','loaiphim','nhan'));
    }

    public function addPhim(Request $request)
    {
    //     $path ='/image/phim/';
    //     $fileName = null;
    // if (request()->hasFile('hinh_anh')) {
    //     $file = $request->file('hinh_anh');
    //     $fileName = ($file->getClientOriginalName());
    //     $file->move($path, $fileName);    
    // }
        $phim= new Phim;
        $phim->TenPhim=$request->ten_phim;
        $phim->NgayDKChieu=$request->ngay_dk_chieu;
        $phim->NgayKetThuc=$request->ngay_ket_thuc;
        $phim->ThoiLuong=$request->thoi_luong_chieu;
        $phim->DaoDien=$request->dao_dien;
        $phim->DienVien=$request->dien_vien;
        $phim->Diem=$request->Diem=0;
        $phim->HinhAnh= $request->hinh_anh;
        $phim->LinkPhim=$request->link_trailer;
        $phim->MaLoaiPhim=$request->loai_phim;
        $phim->MaNV=$request->MaNV;
        $phim->Nhan=$request->nhan;
        $phim->TrangThai=$request->trang_thai;
        $phim->save();
      return redirect('/quan-ly-phim');
    }   

    public function editPhim(Request $request,$MaPhim)
    {
        $TenPhim=$request->input('ten_phim');
        $NgayDKChieu=$request->input('ngay_dk_chieu');
        $NgayKetThuc=$request->input('ngay_ket_thuc');
        $ThoiLuong=$request->input('thoi_luong_chieu');
        $DaoDien=$request->input('dao_dien');
        $DienVien=$request->input('dien_vien');
        $Diem=$request->input('Diem','0');
        $HinhAnh=$request->input('hinh_anh');
        $LinkPhim=$request->input('link_trailer');
        $MaLoaiPhim=$request->input('loai_phim');
        $MaNV=$request->input('MaNV','1');
        $Nhan=$request->input('nhan');
        $TrangThai=$request->input('optradio');
        DB::update('update phims set TenPhim = ?, NgayDKChieu = ?, NgayKetThuc= ?, ThoiLuong= ?,DaoDien=?, DienVien=?,Diem=?,HinhAnh=?,LinkPhim=?,MaLoaiPhim=?,MaNV=?,Nhan=?,TrangThai=? where MaPhim = ?',
        [ $TenPhim,$NgayDKChieu,$NgayKetThuc,$ThoiLuong,$DaoDien,$DienVien,$Diem,$HinhAnh,$LinkPhim,$MaLoaiPhim,$MaNV, $Nhan,$TrangThai,$MaPhim]);
        return redirect('/quan-ly-phim');
    }
    public function deletePhim($MaPhim)
	{
        DB::update(' UPDATE  phims SET TrangThai=-1 where MaPhim=?',[$MaPhim]);
        // phim::where('MaPhim',$MaPhim)->delete();
        return redirect('/quan-ly-phim');
    }
    public function getAPIPhim()
    {   
        return response()->json(Phim::get(),200);
    }
    public function getAPIPhimbyID($MaPhim)
    {
        $phim=DB::select('select * from phims where MaPhim = ?'  ,[$MaPhim]);
        return response()->json($phim);
    }
    public function insertAPIPhim(Request $request)
    {
        
        $phim= new Phim;
        $phim->TenPhim=$request->TenPhim;
        $phim->NgayDKChieu=$request->NgayDKChieu;
        $phim->NgayKetThuc=$request->NgayKetThuc;
        $phim->ThoiLuong=$request->ThoiLuong;
        $phim->DaoDien=$request->DaoDien;
        $phim->DienVien=$request->DienVien;
        $phim->Diem=$request->Diem;
        $phim->HinhAnh=$request->HinhAnh;
        $phim->LinkPhim=$request->LinkPhim;
        $phim->MaLoaiPhim=$request->MaLoaiPhim;
        $phim->MaNV=$request->MaNV;
        $phim->Nhan=$request->Nhan;
        $phim->TrangThai=$request->TrangThai;
         $phim->save();
        return response()->json($phim, 201);
    }
    public function getPhimDangChieu()
    {
        // $phim=Phim::where('TrangThai','1')->get();
        // return response()->json($phim);
       $phim=DB::select('SELECT phims.`*`,loai_phims.TenLoaiPhim,gioi_han_tuois.TenGioiHan
       FROM phims , loai_phims , gioi_han_tuois
       WHERE phims.MaLoaiPhim = loai_phims.MaLoaiPhim AND phims.Nhan=gioi_han_tuois.MaGioiHan AND phims.TrangThai=1');
       return response()->json($phim);
    }
    
    public function getPhimSapChieu()
    {
        // $phim=Phim::where('TrangThai','0')->get();
        // return response()->json($phim);

        $phim=DB::select('SELECT phims.`*`,loai_phims.TenLoaiPhim,gioi_han_tuois.TenGioiHan
        FROM phims , loai_phims , gioi_han_tuois
        WHERE phims.MaLoaiPhim = loai_phims.MaLoaiPhim AND phims.Nhan=gioi_han_tuois.MaGioiHan AND phims.TrangThai=0');
        return response()->json($phim);
    }
}
