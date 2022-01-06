<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DangkyController;
use App\Http\Controllers\TimkiemController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DanhsachController;
use App\Http\Controllers\StatisticalController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/trang-chu', function () {
//    return view('welcome');
//});

//Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'index']);
Route::get('/dangky',[DangkyController::class,'index']);
Route::post('/dangky/add',[DangkyController::class,'add']);
Route::get('/timkiem',[TimkiemController::class,'index']);
Route::post('/timkiem/find',[TimkiemController::class,'find']);
Route::get('/danhsach',[DanhsachController::class,'index']);
Route::post('/danhsach/khoathi',[DanhsachController::class,'index2']);
Route::post('/danhsach/khoathi/phongthi',[DanhsachController::class,'danhsach']);
Route::post('/chitiet',[TimkiemController::class,'find2']);
Route::post('/quaylaidanhsach',[DanhsachController::class,'danhsach']);
Route::post('/giaychungnhan_in',[PDFController::class,'giaychungnhan']);
Route::get('/giaychungnhan',[PDFController::class,'index']);

?>
