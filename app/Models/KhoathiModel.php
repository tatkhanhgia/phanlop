<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KhoathiModel extends Model
{
    protected $table = "khoathi";

    //Lấy danh sách
    //Input: Null
    //Output: Toàn bộ danh sách
    public function get_all(){
        return DB::table('khoathi')->get();
    }
    public function select_newest_khoathi(){
        return DB::table('khoathi')->orderBy('tenkhoa','ASC')->get()->pluck('tenkhoa')->last();
    }
}
