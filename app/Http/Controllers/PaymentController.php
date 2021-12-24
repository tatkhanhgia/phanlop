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
            return view('pages.Payment.payment_management')
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

    //Hàm hiển thị phiếu
    public function add_payment(){
        $id = PaymentModel::select_payment_end()+1;        
        $arrayMate = array(
            $id,$id
        );
        if(CheckController::check_session()) {
            return view('pages.Payment.payment_add_management')
                ->with('arrayMate', $arrayMate);
        }else{
            return view('admin_login');
        }
    }

    //Hàm add phiếu vào DB
    public function add_payment_save(Request $request)
    {
        $id       = $request->input('id');
        $idcoupon = $request->input('idcoupon');
        $total    = $request->input('total');
        $staffid  = $request->input('staffid');
        $date     = $request->input('datepicker');
        $status   = 1;
        PaymentModel::insert($id,$idcoupon,$staffid,$total,$date,$status);
        return $this->open_class();
    }

    //Hàm dành cho admin hiện chi tiết phiếu
    public function detail(Request $request){
        $id = $request->get('payment_detail_id');
        $model = PaymentModel::get_payment($id);
        foreach($model as $row)
        {
            $idimport = $row->importcoupon_id;
            $staffid  = $row->staff_id;
            $total    = $row->total;
            $date     = $row->importdate;
            $arrayMate[] = array(
                $id,
                $row->importcoupon_id,
                $row->staff_id,
                $row->total,
                $row->importdate
            );
        }
        if(CheckController::check_session()) {
            return view('pages.Payment.payment_detail_management')
                ->with('arrayMate', $arrayMate);
        }else{
            return view('admin_login');
        }
    }
    //hàm dành cho admin thay đổi chi tiết phiếu
    public function detail_save(Request $request)
    {
        $id = $request->get('id');
        $total=$request->input('total');
        $date=$request->input('datepicker');
        PaymentModel::update_payment($id,$total,$date);
        return $this->open_class();
    }
}

?>