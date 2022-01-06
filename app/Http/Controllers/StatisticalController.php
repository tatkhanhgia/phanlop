<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\khoathiModel;
use App\Models\StatisticalModels;
use Carbon\Carbon;
class StatisticalController extends Controller
{
    public function open_class()
    {

            return view('statistical')
            ->with('arrayMate', $this->khoathi())
            ->with('arrayMate1',$this->phongthii())
            ->with('arrayMate2',$this->thisinh());
    }

    public function phongthii(){
        
        $arrayMate = array();        
        $model = StatisticalModels::count_phongthi("A2");
        $counta1 = 0;
        foreach($model as $row){
            $counta1++;
        }
        $countB1 = 0;
        $model2 = StatisticalModels::count_phongthi("B1");
        foreach($model2 as $row){
            $countB1++;
        }             
        $arrayMate[] = array("A2",$counta1);                                       
        $arrayMate[] = array("B1",$countB1);
        return $arrayMate;
    }

    public function khoathi(){
        
        $arrayMate = array();        
        $model = StatisticalModels::count_khoathi();
        $counta1 = 0;
        foreach($model as $row){
            $counta1++;
        }
        $arrayMate[] = array('Khóa thi',$counta1);                                 
        return $arrayMate;
    }

    public function thisinh(){
        $arrayMate = array();        
        $model = StatisticalModels::count_thisinh("A2");
        $counta1 = 0;
        foreach($model as $row){
            $counta1++;
        }
        $countB1 = 0;
        $model2 = StatisticalModels::count_thisinh("B1");
        foreach($model2 as $row){
            $countB1++;
        }
        $arrayMate[] = array("A2",$counta1);                                       
        $arrayMate[] = array("B1",$countB1);
        return $arrayMate;
    }

}
