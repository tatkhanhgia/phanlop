<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminMenuLeftController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImportcouponController;
use App\Http\Controllers\Importcoupon_detailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ReceiptController;
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
//Backend;
//Route::get('/admin',[AdminController::class, 'decentralization']);
Route::get('/dashboard',[LoginController::class, 'decentralization']);
Route::get('/logout',[LoginController::class, 'logout']);
Route::post('/admin-dashboard',[LoginController::class, 'check_login']);

Route::get('/admin',[LoginController::class, 'decentralization']);
Route::prefix('/admin')->group(function(){
    Route::prefix('/9')->group(function () {
        Route::get('',[AccountController::class, 'account_management']);
        Route::get('/add',[AccountController::class, 'add_account']);
        Route::post('/add_account',[AccountController::class, 'add_save_account']);
        Route::post('/hidden',[AccountController::class, 'hidden_account']);
        Route::post('/unhidden',[AccountController::class, 'unhidden_account']);
    });

    Route::prefix('/10')->group(function () {
        Route::get('',[PermissionController::class, 'permission_management']);
        Route::get('/add',[PermissionController::class, 'add_position_permission']);
        Route::post('/add-save',[PermissionController::class, 'repair_save_position_permission']);
        Route::post('/hidden',[PermissionController::class, 'hidden_position_permission']);
        Route::get('/unhidden',[PermissionController::class, 'unhidden_position_permission']);
        Route::post('/unhidden-save',[PermissionController::class, 'unhidden_save_position_permission']);
        Route::get('/repair',[PermissionController::class, 'repair_position_permission']);
        Route::post('/repair-save',[PermissionController::class, 'repair_save_position_permission']);
        
    });
});
Route::prefix('pages')->group(function () {
    Route::get('',[LoginController::class, 'decentralization']);
    Route::get('/1',[LoginController::class, 'decentralization']);
    Route::prefix('/2')->group(function () {
        Route::get('',[MaterialController::class, 'open_class']);
        Route::get('/add',[AccountController::class, 'add_account']);
        Route::post('/hidden',[MaterialController::class, 'hidden_mate']);
        Route::post('/unhidden',[MaterialController::class, 'unhidden_mate']);
    });
    Route::prefix('/3')->group(function () {
        Route::get('',[TypeController::class, 'open_class']);
        Route::get('/add',[TypeController::class, 'add_type']);
        Route::post('/hidden',[TypeController::class, 'hidden_type']);
        Route::post('/unhidden',[TypeController::class, 'unhidden_type']);
    });
    Route::prefix('/4')->group(function () {
        Route::get('',[ProductController::class, 'open_class']);
        Route::get('/add',[ProductController::class, 'add_type']);
        Route::post('/hidden',[ProductController::class, 'hidden_type']);
        Route::post('/unhidden',[ProductController::class, 'unhidden_type']);
    });
    Route::prefix('/5')->group(function () {
        Route::get('',[ImportcouponController::class, 'open_class']);
        Route::get('/add',[ImportcouponController::class, 'add_type']);
        Route::post('/hidden',[ImportcouponController::class, 'hidden_type']);
        Route::post('/unhidden',[ImportcouponController::class, 'unhidden_type']);
        Route::post('/detail',[Importcoupon_detailController::class,'get_detail']);
    });
    Route::prefix('/6')->group(function () {
        Route::get('',[PaymentController::class, 'open_class']);
        Route::get('/add',[PaymentController::class, 'add_type']);
        Route::post('/hidden',[PaymentController::class, 'hidden_type']);
        Route::post('/unhidden',[PaymentController::class, 'unhidden_type']);        
    });
    Route::prefix('/8')->group(function () {
        Route::get('',[StaffController::class, 'open_class']);
        Route::post('/change',[StaffController::class, 'change_staff']);
        Route::post('/change_save',[StaffController::class, 'update']);
        Route::post('/hidden',[StaffController::class, 'hidden_staff']);
        Route::post('/unhidden',[StaffController::class, 'unhidden_staff']);
        Route::get('/add',[StaffController::class, 'add_staff']);        
        Route::post('/add_save',[StaffController::class, 'add_staff_save']);        
    });
    Route::prefix('/7')->group(function () {
        Route::get('',[ReceiptController::class, 'open_class']);
        Route::post('/detail',[ReceiptController::class, 'change_staff']);
        Route::post('/change_save',[ReceiptController::class, 'update']);
        Route::post('/hidden',[ReceiptController::class, 'hidden_staff']);
        Route::post('/unhidden',[ReceiptController::class, 'unhidden_staff']);
        Route::get('/add',[ReceiptController::class, 'add_receipt']);        
        Route::post('/add_save',[ReceiptController::class, 'add_receipt_save']);        
    });
});

?>
