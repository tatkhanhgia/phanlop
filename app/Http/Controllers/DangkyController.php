<?php

namespace App\Http\Controllers;
use App\Models\ThisinhModel;
use App\Models\KhoathiModel;
use App\Models\PhongthiModel;
use Illuminate\Http\Request;

class DangkyController extends Controller
{
    public function index(){
        return view('dangky');
    }

    public function add(Request $request)
    {
        $trinhdo = $request->input('trinhdo');
        $ho =   $request->input('ho');
        $ten=   $request->input('ten');
        $gioitinh=$request->input('gioitinh');
        $ngaysinh=$request->input('ngaysinh');
        $noisinh =$request->input('noisinh');
        $cmnd    =$request->input('cmnd');
        $ngaycap =$request->input('ngaycap');
        $noicap  = $request->input('noicap');
        $sdt     =$request->input('sdt');
        $email   =$request->input('email');
        $khoathi = KhoathiModel::select_newest_khoathi();
        // foreach($model as $row){
        //     $khoathi = $row->tenkhoa;
        // }
        $phongthi1 = "";
        if($trinhdo == '1')
            $phongthi = PhongthiModel::get_phongthi_with_trinhdo($khoathi,'A2');
        if($trinhdo == '2')
            $phongthi = PhongthiModel::get_phongthi_with_trinhdo($khoathi,'B1');     
        $flag = 0;       
        foreach($phongthi as $row){
            $phongthi1 = $row->tenphong;
            $flag ++;
            if($flag == 1)
                break;
        }                
        
        $count = 1;
        $model = ThisinhModel::get_SBD($khoathi);
        foreach($model as $row)
        {
            $count = $count + 1;
        }
        if($trinhdo == '1')
            if($count <9)
                $SBD = "A200".$count;
            elseif($count<99)
                $SBD = "A20".$count;
        if($trinhdo == '2')
            if($count <9)
                $SBD = "B100".$count;
            elseif($count<99)
                $SBD = "B10".$count;
        ThisinhModel::insert($SBD,$ho,$ten,$gioitinh,$ngaysinh,$noisinh,
                                $cmnd,$ngaycap,$noicap,$sdt,$email,$phongthi1,$khoathi);
        return view('dashboard');
    }
}
