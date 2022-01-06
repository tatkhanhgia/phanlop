<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThisinhModel extends Model
{
    protected $table = "thisinh";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('thisinh')->get();
    }

    //Lấy dữ liệu thông tin
    //Input: Null
    //Output: toàn bộ giá trị của id
    public function get_SBD($khoathi){
        return DB::select('select khoathi
                           from thisinh
                           where khoathi = \''.$khoathi.'\'');
    }

    public function get_with_SBD($SBD,$khoathi)
    {
        return DB::select('select *
                            from thisinh
                            where khoathi = \''.$khoathi.'\' and SBD = \''.$SBD.'\'');
            }

    public function insert($SBD,$ho, $ten, $gioitinh,$ngaysinh, $noisinh, $cmnd,
                            $ngaycap, $noicap, $sdt,$email,$phongthi,$khoathi)
    {
        DB::table('thisinh')
            ->insert(
                ['SBD'=>$SBD,
                 'ho'=>$ho,
                 'ten'=>$ten,
                 'gioitinh'=>(int)$gioitinh,
                 'ngaysinh'=>$ngaysinh,
                 'noisinh'=>$noisinh,
                 'cmnd'=>$cmnd,
                 'ngaycap'=>$ngaycap,
                 'noicap'=>$noicap,
                 'sdt'=>$sdt,
                 'email'=>$email,
                 'phongthi'=>$phongthi,
                 'khoathi'=>$khoathi]
            );
    }
}
