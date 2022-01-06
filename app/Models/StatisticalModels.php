<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class StatisticalModels extends Model
{
    protected $table = "receipt_detail";
    public function count_khoathi()
    {
        return DB::table('khoathi')->select('select * from khoathi');        
    }

    public function count_total_month($year,$month){
        $name_from = array($year,$month,01);
        $name_to = array($year,$month,31);
        $from=implode('-', $name_from);
        $to=implode('-', $name_to);
        return DB::table('receipt')->whereBetween('importdate', [$from, $to])->sum('total');
        // SELECT sum(total) FROM `receipt` WHERE importdate BETWEEN '2021-12-01' AND '2021-12-31'
    }
    public function count_total_day($year,$month,$day){
        $name_from = array($year,$month,$day);
        $from=implode('-', $name_from);
        return DB::table('receipt')->where('importdate', $from)->sum('total');
        // SELECT sum(total) FROM `receipt` WHERE importdate BETWEEN '2021-12-01' AND '2021-12-31'
    }
}
