<?php

namespace App\Http\Controllers;

use App\Models\ImportcouponModel;
use App\Models\ProducerModel;
use App\Models\MaterialModel;
use App\Models\StaffModel;
use App\Models\PaymentModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    //Hàm get dữ liệu  
    public function payment(){
        $arrayMate = array();
        $model = PaymentModel::get_all();        
        foreach ($model as $row){
            $model2=StaffModel::staff_information($row->staff_id);
            foreach($model2 as $row2){
                $arrayMate[] = array($row->id,
                              $row->importcoupon_id,
                              $row->staff_id,
                              $row->total,                                                        
                              $row->importdate,
                              $row->status,
                              $row2->surname,
                              $row2->firstname);
            }
        }     
        return $arrayMate;
    }

    //Hiện giao diện 
    public function open_class(){                
        if(CheckController::check_session()) {
            return view('pages.payment_management')
                ->with('arrayMate', $this->payment());
        }else{
            return view('admin_login');
        }
    }
    
    public function hidden_type(Request $request){
        PaymentModel::set_status_payment($request->get('id'),0);
        return $this->open_class();
    }

    public function unhidden_type(Request $request){
        PaymentModel::set_status_payment($request->get('id'),1);
        return $this->open_class();
    }
}

?>