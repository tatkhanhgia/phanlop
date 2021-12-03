<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Importcoupon_detailModel extends Model
{
    protected $table = "importcoupon_detail";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('importcoupon_detail')->get();
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_importcoupon_detail($id){
        return DB::select('select * 
                           from importcoupon_detail
                           where importcoupon_id = :id', 
                           ['id' => $id]);
    }

    //Insert type
    //Input: 
    //Output: null
    public function insert($importcoupon_id, $material_id, $total, $importdate)
    {
        DB::insert('insert into importcoupon_detail values (?,?,?,?)',
                    [$importcoupon_id, $material_id, $total, $importdate]);
    }
}
