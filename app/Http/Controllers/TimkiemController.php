<?php

namespace App\Http\Controllers;

use App\Models\ThisinhModel;
use App\Models\DiemthiModel;
use Illuminate\Http\Request;

class TimkiemController extends Controller
{
    public function index(){
        return view('timkiem');
    }

    public function find(Request $request){
        $ho = $request->input('ho'); 
        $ten=$request->input('ten');
        $sdt=$request->input('sdt');
        $model = ThisinhModel::get_all();        
        foreach($model as $row)
        {
            if($row->sdt === $sdt)
            {                
                $model2=DiemthiModel::get_all($row->SBD,$row->khoathi);
                $nghe = 0;
                $noi  = 0;
                $doc  = 0;
                $viet = 0;
                foreach($model2 as $row2)
                {
                    $nghe = $row2->nghe;
                    $noi  = $row2->noi;
                    $doc  = $row2->doc;
                    $viet = $row2->viet;
                }
                $arrayMate[] = array(
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
                    $nghe,$noi,$doc,$viet
                );
                return view('timkiem_chitiet')->with('array',$arrayMate);
            }
            if($row->ho === $ho && $row->ten === $ten)
            {
                $model2=DiemthiModel::get_all($row->SBD,$row->khoathi);
                $nghe = 0;
                $noi  = 0;
                $doc  = 0;
                $viet = 0;
                foreach($model2 as $row2)
                {
                    $nghe = $row2->nghe;
                    $noi  = $row2->noi;
                    $doc  = $row2->doc;
                    $viet = $row2->viet;
                }
                $arrayMate[] = array(
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
                    $nghe,$noi,$doc,$viet
                );
                return view('timkiem_chitiet')->with('array',$arrayMate);
            }                        
        }
        return ('timkiem');
    }

    public function find2(Request $request){               
        $SBD = $request->get('sbd');        
        $khoathi = $request->get('khoathi');        
        $model = ThisinhModel::get_with_SBD($SBD,$khoathi);        
        foreach($model as $row)
        {             
                $model2=DiemthiModel::get_all($row->SBD,$row->khoathi);
                $nghe = 0;
                $noi  = 0;
                $doc  = 0;
                $viet = 0;
                foreach($model2 as $row2)
                {
                    $nghe = $row2->nghe;
                    $noi  = $row2->noi;
                    $doc  = $row2->doc;
                    $viet = $row2->viet;
                }
                $arrayMate[] = array(
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
                    $nghe,$noi,$doc,$viet
                );
                return view('chitietsinhvien_giaychungnhan')->with('array',$arrayMate);                                                               
        }; 
        //return view('timkiem');       
    }
}
