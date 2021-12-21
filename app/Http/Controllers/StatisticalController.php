<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function open_class()
    {
        if(CheckController::check_session()) {
            return view('pages.statistical');
        }else{
            return view('admin_login');
        }
    }
}
