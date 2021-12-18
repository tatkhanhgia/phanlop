<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImportcouponModel extends Model
{
    protected $table = "importcoupon";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('importcoupon')->get();
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_importcoupon($id){
        return DB::select('select * 
                           from importcoupon
                           where id = :id', 
                           ['id' => $id]);
    }
    //Get id cuối cùng 
    public function select_import_end(){
        return DB::table('importcoupon')->orderBy('id','ASC')->get()->pluck('id')->last();
    }

    //Update status của loại
    //Input: type id
    //Output: Null
    public function set_status_import($id, $status)
    {
        DB::update('update importcoupon set status = ? where id = ?',[$status,$id]);
    }

    public function update_total($id, $total)
    {
        DB::update('update importcoupon set total = ? where id = ?',[$total,$id]);
    }

    //Insert type
    //Input: 
    //Output: null
    public function insert($id, $producer_id,$total, $importdate, $status)
    {
        DB::insert('insert into importcoupon values (?,?,?,?,?)',
                    [$id, $producer_id,$total, $importdate, $status]);
    }
}
