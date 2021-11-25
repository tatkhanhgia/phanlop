<?php

namespace App\Http\Controllers;

use App\Models\MaterialModel;
use App\Models\ProducerModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class MaterialController extends Controller
{
    //Hàm get dữ liệu mate 
    public function material(){
        $arrayMate = array();
        $model = MaterialModel::get_all();
        foreach ($model as $row){
            $arrayMate[] = array($row->id,
                              $row->producer_id,
                              $row->title_name,
                              $row->quantity,
                              $row->importprice,
                              $row->importdate,                              
                              $row->status);
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
    
    //Hàm gắn tên NCC vào mảng arrayMate
    public function insert_Name_NCC()
    {
        $arrayMate = $this->material();
        $arrayResult = array();
        foreach($arrayMate as $row)
        {
            $row[1] = $this->get_Name_NCC($row[1]);
            $arrayResult[] = array($row[0],
                                   $row[1],
                                   $row[2],
                                   $row[3],                             
                                   $row[4],
                                   $row[5],
                                   $row[6]);
        }
        return $arrayResult;
    }
    //Hiện giao diện kho 
    public function open_class(){                
        if(CheckController::check_session()) {
            return view('pages.material_management')
                ->with('arMate', $this->insert_Name_NCC());
        }else{
            return view('admin_login');
        }
    }
    
    public function hidden_mate(Request $request){
        MaterialModel::set_status_material($request->get('id'),0);
        return $this->open_class();
    }

    public function unhidden_mate(Request $request){
        MaterialModel::set_status_material($request->get('id'),1);
        return $this->open_class();
    }
}

?>