<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use Auth;
use App\User;
class TrangChuController extends Controller
{
    //
    public function index()
    {
        return view('pages.trang-chu');
    }

    public function formDangNhap()
    {
        return view('pages.dang-nhap');
    }
    public function dangnhap(Request $request)
    {

        $arr=[
        'email'=>$request->Email,
        'password'=>$request->Pass
        ];



    if(Auth::attempt($arr)){
        $user=User::find(Auth::user()->id);
        $request->session()->put('user',$user);// muốn dùng auth thì phải mã hóa mật khẩu
        return redirect('/');
    }
    else
    {
        return 'thất bại';
    }

    }

    public function dangxuat()
    {
        Auth::logout();
        return redirect('/dang-nhap');
    }
 
}
