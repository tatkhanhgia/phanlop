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
        return DB::select('select * from khoathi');        
    }
    public function count_phongthi($trinhdo){
        //return DB::table('phongthi')->get();
        return DB::select('select * 
                           from phongthi
                           where  tenphong like \''.$trinhdo.'%\'');
    }

    public function count_thisinh($trinhdo)
    {
        return DB::select('select * from thisinh where  SBD like \''.$trinhdo.'%\''); 
        //khoathi = \''.$khoathi.'\' and
               
    }    
}
