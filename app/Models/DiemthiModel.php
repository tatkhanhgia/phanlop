<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DiemthiModel extends Model
{
    protected $table = "diemthi";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all($sbd,$khoathi){
        //return DB::table('phongthi')->get();
        return DB::select('select nghe,noi,doc,viet 
                           from diemthi
                           where  sbd = \''.$sbd.'\' 
                                and khoathi = \''.$khoathi.'\'');
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_phongthi($khoathi){
        return DB::select('select tenphong 
                           from phongthi
                           where khoathi = :id', 
                           ['id' => $khoathi]);
    }

    public function get_phongthi_with_trinhdo($khoathi,$trinhdo){
        return DB::select('select tenphong 
                           from phongthi
                           where khoathi = \''.$khoathi.'\' and tenphong like \''.$trinhdo.'%\' 
                           group by tenphong
                           having count(*)<=30');
    }

    //Insert product
    //Input: 
    //Output: null
    public function insert($id, $name,$type_id, $saleprice, $dates, $status)
    {
        DB::insert('insert into product values (?,?,?,?,?,?)',
                    [$id, $name,$type_id, $saleprice, $dates, $status]);
    }
}
