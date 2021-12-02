<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductModel extends Model
{
    protected $table = "product";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('product')->get();
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_product($id){
        return DB::select('select * 
                           from :table
                           where id = :id', 
                           ['id' => $id],
                           ['table'   => $table]);
    }

    //Update status 
    //Input: type id
    //Output: Null
    public function set_status_product($id, $status)
    {
        DB::update('update product set status = ? where id = ?',[$status,$id]);
    }

    //Insert product
    //Input: 
    //Output: null
    public function insert($id, $type_id, $saleprice, $dates, $status)
    {
        DB::insert('insert into product values (?,?,?,?,?)',
                    [$id, $type_id, $saleprice, $dates, $status]);
    }
}
