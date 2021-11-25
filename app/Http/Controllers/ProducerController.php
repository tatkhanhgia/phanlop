<?php

namespace App\Http\Controllers;

use App\Models\ProducerModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class ProducerController extends Controller
{
    public function NCC(){
        $arPro = array();
        $model = ProducerModel::get_all();
        foreach ($model as $row){
            $arMate[] = array($row->id,
                              $row->title_name,
                              $row->phonenumber,
                              $row->address,                             
                              $row->status);
        }     
        return $arPro;   
    }

    //Hiện giao diện kho 
    public function open_class(){
        if(CheckController::check_session()) {
            return view('admin.material_management')
                ->with('arMate', $this->material());
        }else{
            return view('admin_login');
        }
    }

    
    
}

?>