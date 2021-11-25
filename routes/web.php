<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminMenuLeftController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MaterialController;
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
    Route::get('/3',[LoginController::class, '']);
    Route::get('/4',[LoginController::class, '']);
    Route::get('/5',[LoginController::class, '']);
    Route::get('/6',[LoginController::class, '']);
    Route::get('/7',[LoginController::class, '']);
    Route::get('/8',[LoginController::class, '']);
});

?>
