<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypeModel extends Model
{
    protected $table = "type";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('type')->get();
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_type($id){
        return DB::select('select * 
                           from type
                           where id = :id', 
                           ['id' => $id]);
    }
    //Lấy tên 
    //Input: Null
    //Output: tên của id
    public function get_name_type($id){
        return DB::select('select title_name 
                           from type
                           where id = :id', 
                           ['id' => $id]);
    }
    //Get id cuối cùng 
    public function select_type_end(){
        return DB::table('type')->orderBy('id','ASC')->get()->pluck('id')->last();
    }

    //Update status của loại
    //Input: type id
    //Output: Null
    public function set_status_type($id, $status)
    {
        DB::update('update type set status = ? where id = ?',[$status,$id]);
    }

    //Insert type
    //Input: 
    //Output: null
    public function insert($id, $title_name, $status)
    {
        DB::insert('insert into type values (?,?,?)',
                    [$id,$title_name ,$status]);
    }
}
