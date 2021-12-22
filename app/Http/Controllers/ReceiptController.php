<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\TypeModel;
use App\Models\ReceiptModel;
use App\Models\ReceiptDetailModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class ReceiptController extends Controller
{
    public function receipt(){
        $arrayMate = array();
        $model = ReceiptModel::get_all();
        foreach ($model as $row){
            $arrayMate[] = array($row->id,
                              $row->staff_id,                                                        
                              $row->total,
                              $row->importdate,
                              $row->status);
        }
        return $arrayMate;
    }

    //Hiện giao diện 
    public function open_class(){                
        if(CheckController::check_session()) {
            return view('pages.receipt_management')
                ->with('arrayMate', $this->receipt());
        }else{
            return view('admin_login');
        }
    }
    
    public function hidden_receipt(Request $request){
        ReceiptModel::set_status_receipt($request->get('id'),0);
        return $this->open_class();
    }

    public function unhidden_receipt(Request $request){
        ReceiptModel::set_status_receipt($request->get('id'),1);
        return $this->open_class();
    }

    public function add_receipt(){
        if(CheckController::check_session()) {
            return view('pages.receipt_add')
                ->with('arrayMate', $this->getproduct_title())
                ->with('id_receipt', ReceiptModel::get_all()->count()+1);
        }else{
            return view('admin_login');
        }
    }

    public function add_receipt_save(Request $request){
        //Lấy dữ liệu tạo hóa đơn
        $id = $request->input('id');
        $staff=$request->input('staffid');
        $total=$request->input('total');
        $date=$request->input('datepicker');
        ReceiptModel::insert($id,$staff,$total,$date,1);
        //Lấy dữ liệu tạo chi tiết hóa đơn
        $i = 1;
        for($i;$i<13;$i++)
        {
            $receipid = $id;
            $productid= $i;
            $soluong=  $request->input(''.$i);
            if($soluong == 0)
                continue;
            ReceiptDetailModel::insert($receipid,$productid,$soluong);
        }                       
        
        return $this->open_class();
    }

    //Convert id sang name
    public function getproduct_title(){
        $arrayMate = array();
        $model = ProductModel::get_all();
        foreach ($model as $row){
            $arrayMate[] = array($row->id,
                                $row->name,
                                $row->type_id,                                                        
                                $row->saleprice,
                                $row->dates,
                                $row->status);
        }     
        return $arrayMate;
    }

    //Hàm cho admin khởi tạo giao diện chỉnh sửa phiếu
    public function detail(Request $request){
        $id = $request->input('receipt_detail_id');
        $model = ReceiptModel::get_detail_receipt($id);
        $model2 = ReceiptDetailModel::get_detail_receipt($id);
        foreach($model as $row)
        {
            foreach($model2 as $row2)
            {            
                $arrayMate2[] = array(
                        $row2->product_id,
                        $row2->quantity                        
                );
            }
            $arrayMate = array(
                    $row->id,
                    $row->staff_id,
                    $row->total,
                    $row->importdate,
                    $row->status,
                    $arrayMate2,
                    $this->getproduct_title()
            );            
        };
        if(CheckController::check_session()) {
            return view('pages.receipt_detail_management')
                ->with('arrayMate', $arrayMate);
        }else{
            return view('admin_login');
        }
    }

    //Hàm cho admin lưu sau khi chỉnh sửa
    public function detail_save(Request $request)
    {
         //Lấy dữ liệu tạo hóa đơn
         $id = $request->input('id');
         $staff=$request->input('staffid');
         $total=$request->input('total');
         $date=$request->input('datepicker');
         //ReceiptModel::delete_receipt($id);
         ReceiptDetailModel::delete_receipt($id);
         ReceiptModel::update_receipt($id,$total);
         //Lấy dữ liệu tạo chi tiết hóa đơn
         $i = 1;
         for($i;$i<13;$i++)
         {
             $receipid = $id;
             $productid= $i;
             $soluong=  $request->input(''.$i);
             if($soluong == 0)
                 continue;
             ReceiptDetailModel::insert($receipid,$productid,$soluong);
         }                       
         
         return $this->open_class();
    }
}

?>