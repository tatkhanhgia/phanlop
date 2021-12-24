<?php

namespace App\Http\Controllers;

use App\Models\TypeModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class TypeController extends Controller
{
    //Hàm get dữ liệu  
    public function type(){
        $arrayMate = array();
        $model = TypeModel::get_all();
        foreach ($model as $row){
            $arrayMate[] = array($row->id,
                              $row->title_name,                                                        
                              $row->status);
        }     
        return $arrayMate;
    }
    
    //Hiện giao diện 
    public function open_class(){                
        if(CheckController::check_session()) {
            return view('pages.Type.type_management')
                ->with('arrayMate', $this->type());
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