<?php

namespace App\Http\Controllers;

use App\Models\AccountModel;
use Session;
use Cookie;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account(){
        $resultAccount = AccountModel::account();
        //Lấy thông tin tài khoản
        $arAccount = array();
        foreach ($resultAccount as $row){
            $arAccount[] = array($row->id,$row->title_name,$row->account_name,$row->password,$row->status);
        }
        return $arAccount;
    }

    //Xử lý hiện giao điện quản lý tài khoản
    public function account_management()
    {
        if(CheckController::check_session()) {
            return view('admin.account_management')
                ->with('arAccount', $this->account());
        }else{
            return view('admin_login');
        }
    }
}
