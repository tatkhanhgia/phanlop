<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ConvertModel extends Model
{
    protected $table = "convert";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('convert')->get();
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_convert($id){
        return DB::select('select * 
                           from `convert`
                           where product_id = :id', 
                           ['id' => $id]);
    }

    //Insert product
    //Input: 
    //Output: null
    public function insert($product, $material, $quantity)
    {
        DB::insert('insert into `convert` values (?,?,?);',
                    [$product, $material, $quantity]);
    }
}
