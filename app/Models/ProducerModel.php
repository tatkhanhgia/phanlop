<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProducerModel extends Model
{
    protected $table = "producer";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('producer')->get();
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_NCC($id){
        return DB::select('select * 
                           from :table
                           where id = :id', 
                           ['id' => $id],
                           ['table'   => $table]);
    }

    //Update status của nhà cung cấp
    //Input: material id
    //Output: Null
    public function hidden_material($id, $status)
    {
        DB::update('update producer set status = ? where id = ?',[$status,$id]);
    }

    //Select id max của table producer
    //Input: Null
    //Output: Trả về id max của account
    public function select_account_end(){
        return DB::table('producer')->orderBy('id','ASC')->get()->pluck('id')->last();
    }

    //Insert material
    //Input: 
    //Output: null
    public function insert($id, $title_name, $phonenumber, $address, $status)
    {
        DB::insert('insert into producer values (?,?,?,?,?)',
                    [$id, $title_name, $phonenumber, $address, $status]);
    }
}
