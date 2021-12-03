<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaymentModel extends Model
{
    protected $table = "payment";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('payment')->get();
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_payment($id){
        return DB::select('select * 
                           from payment
                           where id = :id', 
                           ['id' => $id]);
    }
    //Get id cuối cùng 
    public function select_payment_end(){
        return DB::table('payment')->orderBy('id','ASC')->get()->pluck('id')->last();
    }

    //Update status của loại
    //Input: type id
    //Output: Null
    public function set_status_payment($id, $status)
    {
        DB::update('update payment set status = ? where id = ?',[$status,$id]);
    }

    //Insert type
    //Input: 
    //Output: null
    public function insert($id, $importcoupon_id, $staff_id, $total, $importdate, $status)
    {
        DB::insert('insert into importcoupon values (?,?,?,?,?,?)',
                    [$id, $importcoupon_id, $staff_id, $total, $importdate, $status]);
    }
}
