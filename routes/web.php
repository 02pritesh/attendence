<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthController::class,'show']);
Route::post('admin_login',[AuthController::class,'login']);
Route::get('logout',[AuthController::class,'logout']);

Route::get('home_page',[AdminController::class,'home_page']);
Route::get('admin_home_page',[AdminController::class,'home_page']);
Route::post('user_detail',[AdminController::class,'add_user_detail']);
Route::get('user_detail_info',[AdminController::class,'user_detail_info']);
Route::get("nothing",[AdminController::class,'nothing']);