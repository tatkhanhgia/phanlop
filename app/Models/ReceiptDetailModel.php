<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ReceiptDetailModel extends Model
{
    //Tìm thông tin tài khoản
    protected $table = "receipt_detail";

    public function get_all(){
        return DB::table('receipt_detail')->get();
    }

    public function get_detail_receipt($id){
        return DB::select('Select *
                            from receipt_detail
                            where receipt_id = :id',
                            ['id' => $id]);
    }

    public function delete_receipt($id)
    {
        return DB::table('receipt_detail')->where('receipt_id', $id)->delete();
    }

    //Update infomation
    public function update_receipt_detail( $id,$product_id,$quantity)
    {
        DB::table('receipt_detail')
                ->where('id',$id)
                ->update(
                [
                'product_id' => $product_id,
                'quantity' => $quantity         
                ]
            );                          
    }
    //Insert 
    //Input: 
    //Output: null
    public function insert($id,$staff_id,$total)
    {
        // DB::insert('insert into staff values (?,?,?,?,?,?,?,?,?)',
        //             [$id, $account_id, $surname,$firstname, $dateofbirth, $phonenumber,
        //             $address, $email, $status]);
        DB::table('receipt_detail')
            ->insert(
                ['receipt_id'=>$id,
                 'product_id'=>$staff_id,
                 'quantity'=>$total
                ]
            );
    }
}
