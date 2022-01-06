<?php

namespace App\Http\Controllers;

use App\Models\ThisinhModel;
use App\Models\DiemthiModel;
use App\Models\PhongthiModel;
use App\Models\KhoathiModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    public function index(){
        return view('PDF_chooseSBD_Khoa');
    }

    public function giaychungnhan(Request $request)
    {
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
                $arrayMate = [
                    'SBD'=>$row->SBD, //1
                    'ho' =>$row->ho, //2
                    'ten'=>$row->ten,//3
                    'gioitinh'=>$row->gioitinh,//4
                    'ngaysinh'=>$row->ngaysinh,//5
                    'noisinh'=>$row->noisinh,//6
                    'cmnd'=>$row->cmnd,//7
                    'ngaycap'=>$row->ngaycap,//8
                    'noicap'=>$row->noicap,//9
                    'sdt'=>$row->sdt,//10
                    'email'=>$row->email,//11
                    'phongthi'=>$row->phongthi,//12
                    'khoathi'=>$row->khoathi,//13
                    'nghe'=>$nghe,
                    'noi'=>$noi,
                    'doc'=>$doc,
                    'viet'=>$viet//14,15,16,17
                ];
                $file_name='giaychungnhan.pdf';
                $pdf=PDF::loadview('PDF',$arrayMate);
                return $pdf->download($file_name);
        }
        
    }
}
