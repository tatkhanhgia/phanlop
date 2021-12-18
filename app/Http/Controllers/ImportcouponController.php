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
        ImportcouponModel::set_status_import($request->get('id'),0);
        return $this->open_class();
    }

    public function unhidden_type(Request $request){
        ImportcouponModel::set_status_import($request->get('id'),1);
        return $this->open_class();
    }

    public function add_import(){
        $id = ImportcouponModel::select_import_end()+1;
        if(CheckController::check_session()) {
            return view('pages.importcoupon_add_management')
                ->with('arrayMate', $id);
        }else{
            return view('admin_login');
        }
    }
    public function add_import_save(Request $request){
        $id = $request->get('id');
        $producer_id = $request->get('producer_id');
        $total = "0";
        $importdate = $request->get('datepicker');
        ImportcouponModel::insert($id,$producer_id,$total,$importdate,1);
        $array = array(
            $id,
            $producer_id,
            $importdate
        );
        return view('pages.importcoupon_detail_add_management')
                ->with('arrayMate', $array);        
    }

    public function add_detail_save(Request $request){
        $i=1;
        $tien=20;
        $tongtien=0;
        //Chạy từ id 1 -> 19 tương ứng với các nguyên liệu
        for($i;$i<20;$i++){
            $idcoupon = $request->get('id');        
            $materialid=$i;            
            $totalmoney=$request->input(''.$tien);
            $quantity=(float)$request->input(''.$i);
            if($quantity==0){
                continue;             
            }
            $datepicker=$request->get('datepicker');
            Importcoupon_detailModel::insert($idcoupon,$materialid,$quantity,$totalmoney,$datepicker);
            $tien++;
            $tongtien=(int)$tongtien+(int)$totalmoney;
            $model = MaterialModel::get_quantity($materialid);
            foreach($model as $row){
                $quantity_in_stock =(float) $row->quantity;    
            }
            $quantity_in_stock = $quantity_in_stock + $quantity;
            MaterialModel::update_quantity($materialid,$quantity_in_stock);     
            ImportcouponModel::update_total($idcoupon,$tongtien); //Update tổng tiền trong phiếu nhập
        }
        return $this->open_class();       
    }
}

?>