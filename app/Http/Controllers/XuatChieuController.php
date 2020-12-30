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
    public function AddAjax(Request $request)
    {


       
        $time=$request->input('_suatChieu');
        DB::table('thoi_gian_chieus')->insert(['ThoiGianChieu'=>$time,'TrangThai'=>1]);

        $phim=DB::select('select * from thoi_gian_chieus WHERE TrangThai=1');
        $html = '';
        if(count($phim)>0):
            foreach ($phim as $p){
                $active = $p->TrangThai == '1' ? 'Tồn Tại' : 'Tạm Ngưng';
                $html .='<tr>
                <td>'.$p->MaThoiGianChieu.'</td>
                <td>'.$p->ThoiGianChieu.'</td>
                <td>'.$active.'
                </td>
                <td>
                    <div class="btn-group">
                    

                        <a href="'.route('DelSuatChieu', $p->MaThoiGianChieu).'">
                            <button type="button" class="btn btn-danger" data-toggle="tooltip"
                                title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </a>
                    </div>
                </td>
            </tr>';
            }
        endif;
        return response()->json(['message'=>'success','html'=>$html]);
    }
    public function UpdateAjax(Request $request)
    {


        $idSC=$request->_ID;
        $time=$request->_SuatChieu;
        DB::update('UPDATE  thoi_gian_chieus SET ThoiGianChieu=? WHERE MaThoiGianChieu=?',[$time,$idSC]);

        $phim=DB::select('select * from thoi_gian_chieus WHERE TrangThai=1');
        $html = '';
        if(count($phim)>0):
            foreach ($phim as $p){
                $active = $p->TrangThai == '1' ? 'Tồn Tại' : 'Tạm Ngưng';
                $html .='<tr>
                <td>'.$p->MaThoiGianChieu.'</td>
                <td>'.$p->ThoiGianChieu.'</td>
                <td>'.$active.'
                </td>
                <td>
                    <div class="btn-group">
                        

                        <a href="'.route('DelSuatChieu', $p->MaThoiGianChieu).'">
                            <button type="button" class="btn btn-danger" data-toggle="tooltip"
                                title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </a>
                    </div>
                </td>
            </tr>';
            }
        endif;
        return response()->json(['message'=>'success','html'=>$html]);
    }


    public function Edit($Ma)
    {   
        $SuatChieu=DB::select('SELECT * FROM thoi_gian_chieus WHERE MaThoiGianChieu=?',[$Ma]);

        return view('pages.cap-nhat.cap-nhat-suat-chieu',compact('SuatChieu'));
     
    }
    public function EditSuatChieuAjax(Request $request)
    {   
        // $SuatChieu=DB::select('SELECT * FROM thoi_gian_chieus WHERE MaThoiGianChieu=?',[$Ma]);
            $SuatChieu = ThoiGianChieu::where('MaThoiGianChieu', '=', $request->_ID)->firstOrFail();
            
                                            
                                       
                                        

                                      
        $html='  <input type="hidden" class="form-control" id="id-suat-chieu" name="id-suat-chieu" required value="'.$SuatChieu->MaThoiGianChieu.'">
        <label for="suat-chieu">Suất chiếu</label> <input type="time" class="form-control" id="suat-chieu" name="suat-chieu" required value="'.$SuatChieu->ThoiGianChieu.'">
        <div class="invalid-feedback">Không được bỏ trống trường này</div>';
        return response()->json(['message'=>'success','html'=>$html]);
     
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
    public function getAPIAllSuatChieu()
    {   
        return response()->json(ThoiGianChieu::get(),200);
    }
    public function getAPISuatChieubyID($MaSuatChieu)
    {
        $suatchieu=DB::select('select * from thoi_gian_chieus where MaThoiGianChieu = ?',[$MaSuatChieu]);
        return response()->json($suatchieu);
    }
}
