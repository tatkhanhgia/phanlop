<?php

namespace App\Http\Controllers;

use App\Models\ImportcouponModel;
use App\Models\Importcoupon_detailModel;
use App\Models\ProducerModel;
use App\Models\MaterialModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class Importcoupon_detailController extends Controller
{
    //Hàm get dữ liệu  
    public function importcoupon_detail(){
        $arrayMate = array();
        $model = Importcoupon_detailModel::get_all();
        foreach ($model as $row){            
            $arrayMate[] = array($row->importcoupon_id,
                              $row->material_id,
                              $row->quantity,
                              $row->total,
                              $row->importdate);
        }     
        return $arrayMate;
    }

    //Hàm get dữ liệu trên id truyền vào
    public function get_detail(Request $request){                
        $model = Importcoupon_detailModel::get_importcoupon_detail($request->get('id'));
        $model2= MaterialModel::get_all();
        foreach($model as $row){      
            foreach($model2 as $row2){                  
                if($row2->id == $row->material_id)
                {
                    $arraytemp[] = array($row->importcoupon_id,
                                $row->material_id,
                                $row->quantity,
                                $row->total,
                                $row->importdate,
                                $row2->title_name);            
                }
            }
        }               
        return view('pages.importcoupon_detail_management')
                        ->with('arrayMate', $arraytemp); 
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