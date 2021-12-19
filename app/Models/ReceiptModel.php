<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ReceiptModel extends Model
{
    //Tìm thông tin tài khoản
    protected $table = "receipt";

    public function get_all(){
        return DB::table('receipt')->get();
    }

    public function get_detail_receipt($id){
        return DB::select('Select *
                            from receipt
                            where id = :id',
                            ['id' => $id]);
    }

    //Select id max của table staff
    //Input: Null
    //Output: Trả về id max của staff
    public function select_receipt_end(){
        return DB::table('receipt')->orderBy('id','ASC')->get()->pluck('id')->last();
    }

    public function delete_receipt($id)
    {
        return DB::table('receipt')->where('id', $id)->delete();

    }
    //Update status 
    //Input: id
    //Output: Null
    public function set_status_receipt($id, $status)
    {
        DB::update('update receipt set status = ? where id = ?',[$status,$id]);
    }

    //Update infomation
    public function update_receipt($id,$total)
    {
        DB::table('receipt')
                ->where('id',$id)
                ->update(
                [
                'total' => $total,                
                ]
            );                          
    }
    //Insert 
    //Input: 
    //Output: null
    public function insert($id,$staff_id,$total,$importdate,$status)
    {
        // DB::insert('insert into staff values (?,?,?,?,?,?,?,?,?)',
        //             [$id, $account_id, $surname,$firstname, $dateofbirth, $phonenumber,
        //             $address, $email, $status]);
        DB::table('receipt')
            ->insert(
                ['id'=>$id,
                 'staff_id'=>$staff_id,
                 'total'=>$total,
                 'importdate'=>$importdate,                 
                 'status'=>1]
            );
    }
}
