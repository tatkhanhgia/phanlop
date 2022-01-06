<?php

namespace App\Http\Controllers;

use App\Models\ThisinhModel;
use App\Models\DiemthiModel;
use App\Models\PhongthiModel;
use App\Models\KhoathiModel;
use Illuminate\Http\Request;

class DanhsachController extends Controller
{
    public $khoathi;
    public $location;
    public $phongthi;
    public function index(){        
        $model2= KhoathiModel::get_all();
        foreach($model2 as $row){
            $array2[] = array(
                $row->tenkhoa                
            );
        }
        return view('danhsach_chonkhoa')->with('array',$array2);
    }

    public function index2(Request $request){
        $khoathi = $request->get('khoathi');
        $model2= KhoathiModel::get_all();
        $count = 1;
        $khoathi_txt = "";
        foreach($model2 as $row){
            if($count == $khoathi)
                $khoathi_txt = $row->tenkhoa;
            $count ++;
        }
        $model = PhongthiModel::get_toanbophongthi();
        $array2 = array();
        foreach($model as $row){
            if($row->khoathi === $khoathi_txt)
                $array2[] = array(
                    $row->tenphong,
                    $row->khoathi                
                );
        }                      
        return view('danhsach_chonphong')->with('array',$array2);
    }

    public function danhsach(Request $request){
        $khoathi = $request->get('khoathi');
        $phongthi = $request->get('phongthi');        
        $count = 0;
        $phongthi_txt = "";
        $model = PhongthiModel::get_phongthi_with_khoa($khoathi);             
        foreach($model as $row){
            $phongthi_txt = $row->tenphong;
            if($count == $phongthi)
                break;
            $count = $count + 1;
        }
        
        $model2 = ThisinhModel::get_all();
        $array2 = array();
        foreach($model2 as  $row){
            if($row->khoathi === $khoathi && $row->phongthi === $phongthi_txt)
                $array2[] = array(
                    $row->SBD,
                    $row->ho,
                    $row->ten,
                    $row->gioitinh,
                    $row->ngaysinh,
                    $row->noisinh,
                    $row->cmnd,
                    $row->ngaycap,
                    $row->noicap,
                    $row->sdt,
                    $row->email,
                    $row->phongthi,
                    $row->khoathi,
                );
        }
        return view('danhsach_chitiet')->with('array',$array2);
    }

}
