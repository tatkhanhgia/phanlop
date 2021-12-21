<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\StatisticalModels;
use Carbon\Carbon;
class StatisticalController extends Controller
{
    public function open_class()
    {
        if(CheckController::check_session()) {
            return view('pages.statistical')
            ->with('arrayMate', $this->product())
            ->with('arrayMate1', $this->turnover_month())
            ->with('arrayMate2', $this->turnover_day());
        }else{
            return view('admin_login');
        }
    }

    public function product()
    {
        $arrayMate = array();
        $model = ProductModel::get_all();
        foreach ($model as $row){
            if($row->status==1){
                $arrayMate[] = array($row->name, StatisticalModels::count_product($row->id));
            }
        }     
        return $arrayMate;
    }

    public function turnover_month(){
        $current = Carbon::now();
        $arrayMate = array();
        for ($row = 1 ;$row <= 12 ; $row++){
            $arrayMate[] = array($row, StatisticalModels::count_total_month($current->year, $row));
        }     
        return $arrayMate;
    }

    public function turnover_day(){
        $current = Carbon::now();
        $arrayMate = array();
        for ($row = 1 ;$row <= $current->daysInMonth; $row++){
            $arrayMate[] = array($row, StatisticalModels::count_total_day($current->year, $current->month,$row));
        }     
        return $arrayMate;
    }

}
