<?php

namespace App\Http\Controllers;

use App\Models\ImportcouponModel;
use App\Models\ProducerModel;
use App\Models\MaterialModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class ImportcouponController extends Controller
{
    //Hàm get dữ liệu  
    public function importcoupon(){
        $arrayMate = array();
        $model = ImportcouponModel::get_all();
        foreach ($model as $row){
            $temp = $this->get_Name_NCC($row->producer_id);
            $arrayMate[] = array($row->id,
                              $row->producer_id,
                              $row->total,
                              $row->importdate,                                                        
                              $row->status,
                              $temp);
        }     
        return $arrayMate;
    }
     //Hàm get dữ liệu NCC (Producer)
     public function NCC()
     {        
         $arrayNCC = array();
         $model = ProducerModel::get_all();
         foreach ($model as $row){
             $arrayNCC[] = array($row->id,
                                 $row->title_name,
                                 $row->phonenumber,
                                 $row->address,                             
                                 $row->status);
         }
         return $arrayNCC;
     }
 
     //Hàm tìm tên NCC
     public function get_Name_NCC($id)
     {
         $arrayNCC = $this->NCC();
         foreach($arrayNCC as $row)
         {
             if($row[0] == $id)
                 return $row[1];
         }
         return null;
     }

    //Hiện giao diện 
    public function open_class(){                
        if(CheckController::check_session()) {
            return view('pages.importcoupon_management')
                ->with('arrayMate', $this->importcoupon());
        }else{
            return view('admin_login');
        }
    }
    
    public function hidden_type(Request $request){
        TypeModel::set_status_type($request->get('id'),0);
        return $this->open_class();
    }

    public function unhidden_type(Request $request){
        TypeModel::set_status_type($request->get('id'),1);
        return $this->open_class();
    }
}

?>