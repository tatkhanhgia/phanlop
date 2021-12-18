<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MaterialModel extends Model
{
    protected $table = "material";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('material')->get();
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_material($id){
        return DB::select('select * 
                           from material
                           where id = :id', 
                           ['id' => $id]);
    }

    public function get_quantity($id)
    {
       return DB::table('material')
                ->select('quantity')
                ->where('id',$id)
                ->get();

    }


    //Update status của nguyên liệu
    //Input: material id
    //Output: Null
    public function set_status_material($id, $status)
    {
        DB::update('update material set status = ? where id = ?',[$status,$id]);
    }

    //Update quantity của material
    //Input: $quantity, $id
    //Output:Null
    public function update_quantity($id,$quantity)
    {
        DB::update('update material set quantity = ? where id = ?',
                    [$quantity,$id]);
    }

    //Select id max của table account
    //Input: Null
    //Output: Trả về id max của account
    public function select_account_end(){
        return DB::table('account')->orderBy('id','ASC')->get()->pluck('id')->last();
    }

    //Insert material
    //Input: 
    //Output: null
    public function insert($id, $producer_id, $title_name, $quantity, $importprice, $importdate, $status)
    {
        DB::insert('insert into material values (?,?,?,?,?,?,?)',
                    [$id, $producer_id, $title_name, $quantity, $importprice, $importdate, $status]);
    }
}
