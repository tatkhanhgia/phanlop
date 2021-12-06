<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class StaffModel extends Model
{
    //Tìm thông tin tài khoản
    protected $table = "staff";
    public function staff_information ($account_id){
//        return DB::select('select * from staff where account_id = :account_id', ['account_id' => $account_id]);
        return StaffModel::where('account_id',$account_id)->get();
    }

    public function get_all(){
        return DB::table('staff')->get();
    }

    public function get_detail_staff($id){
        return DB::select('Select *
                            from staff
                            where id = :id',
                            ['id' => $id]);
    }

    //Select id max của table staff
    //Input: Null
    //Output: Trả về id max của staff
    public function select_staff_end(){
        return DB::table('staff')->orderBy('id','ASC')->get()->pluck('id')->last();
    }

    //Update status 
    //Input: id
    //Output: Null
    public function set_status_staff($id, $status)
    {
        DB::update('update staff set status = ? where id = ?',[$status,$id]);
    }

    //Update infomation
    public function update_staff( $id, $surname, $name, $date, $phone, $address, $email)
    {
        DB::table('staff')
                ->where('id',$id)
                ->update(
                ['surname' => $surname,'firstname' => $name,
                'dateofbirth' => $date,
                'phonenumber' => $phone,
                'address' => $address,
                'email' => $email]
            );                    
        // DB::update('update staff set surname = ?, 
        //                             firstname = ?,
        //                             dateofbirth = ?,
        //                             phonenumber = ?,
        //                             address     = ?,
        //                             email       = ?
        //                             where id    = ?' ,[$surname, $name, $date, $phone, $address, $email,$id]);
    }
    //Insert 
    //Input: 
    //Output: null
    public function insert($id, $account_id, $surname,$firstname, $dateofbirth, $phonenumber,
                            $address, $email, $status)
    {
        // DB::insert('insert into staff values (?,?,?,?,?,?,?,?,?)',
        //             [$id, $account_id, $surname,$firstname, $dateofbirth, $phonenumber,
        //             $address, $email, $status]);
        DB::table('staff')
            ->insert(
                ['id'=>$id,
                 'account_id'=>$account_id,
                 'surname'=>$surname,
                 'firstname'=>$firstname,
                 'dateofbirth'=>$dateofbirth,
                 'phonenumber'=>$phonenumber,
                 'address'=>$address,
                 'email'=>$email,
                 'status'=>1]
            );
    }
}
