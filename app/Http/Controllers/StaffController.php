<?php

namespace App\Http\Controllers;

use App\Models\StaffModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class StaffController extends Controller
{
    //Hàm get dữ liệu  
    public function Staff(){
        $arrayMate = array();
        $model = StaffModel::get_all();        
        foreach ($model as $row){
                $arrayMate[] = array($row->id,
                              $row->account_id,
                              $row->surname,
                              $row->firstname,                                                        
                              $row->dateofbirth,
                              $row->phonenumber,
                              $row->address,
                              $row->email,
                              $row->status);
        }     
        return $arrayMate;
    }

    //Hiện giao diện 
    public function open_class(){                
        if(CheckController::check_session()) {
            return view('pages.Staff.staff_management')
                ->with('arrayMate', $this->Staff());
        }else{
            return view('admin_login');
        }
    }
    
    public function hidden_staff(Request $request){
        StaffModel::set_status_staff($request->get('id'),0);
        return $this->open_class();
    }

    public function unhidden_staff(Request $request){
        StaffModel::set_status_staff($request->get('id'),1);
        return $this->open_class();
    }

    //Run view add
    public function add_staff(Request $request){
        $array = StaffModel::select_staff_end();
        if(CheckController::check_session()) {
            return view('pages.Staff.staff_add')
                ->with('arrayMate', $array+1);
        }else{
            return view('admin_login');
        }

    }

    //Add vào DB
    public function add_staff_save(Request $request){
        $id         = $request->get('id');
        $account_id = $request->get('account_id');
        $surname    = $request->get('surname');
        $name       = $request->get('name');
        $date       = $request->get('datepicker');
        $phone      = $request->get('phonenumber');
        $address    = $request->get('address');
        $email      = $request->get('email');
        StaffModel::insert($id,$account_id,$surname,$name,$date,$phone,$address,$email,1);
        return $this->open_class();
    }

    //Run view
    public function change_staff(Request $request){
        $id = $request->get('id');
        $model = StaffModel::get_detail_staff($id);
        foreach($model as $row){
            $arrayMate[] = array(
                            $row->id,
                            $row->surname,
                            $row->firstname,
                            $row->dateofbirth,
                            $row->phonenumber,
                            $row->address,
                            $row->email
            );
        }
        if(CheckController::check_session()) {
            return view('pages.Staff.Staff_detail')
                ->with('arrayMate', $arrayMate);
        }else{
            return view('admin_login');
        }
    }

    //Get data from view and update in DB
    public function update(Request $request){
        $id = $request->get('id');
        $surname = $request->get('surname');
        $name = $request->get('name');
        $date = $request->get('datepicker');
        $phone = $request->get('phonenumber');
        $address = $request->get('address');
        $email = $request->get('email');
        StaffModel::update_staff( $id, $surname, $name, $date, $phone, $address, $email);
        if(CheckController::check_session()) {
            return view('pages.Staff.staff_management')
                ->with('arrayMate', $this->Staff());
        }else{
            return view('admin_login');
        }
    }
}

?>