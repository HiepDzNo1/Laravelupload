<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TestController;
use \App\Http\Controllers\admin\LoginController;
use \App\Http\Controllers\admin\LopController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/post-login',[LoginController::class,'postlogin'])->name('postHome');
Route::get('/admin/home',[LoginController::class,'admin_home'])->name("adminHome");

//Route::get('/admin/lop/add',[LopController::class,'create'])->middleware('auth');
// Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('lop')->group(function () {
            Route::get('add',[LopController::class,'create']);
            Route::post('add',[LopController::class,'postcreate']);
            Route::get('list',[LopController::class,'list'])->name("listClass");
            Route::get('edit/{lop}',[LopController::class,'edit']);
            Route::post('edit/{lop}',[LopController::class,'postedit']);
            Route::DELETE('delete/{lop}',[LopController::class,'delete'])->name("deleteClass");
            //tìm kiếm
            Route::get('/searchFullText', 'App\Http\Controllers\admin\LopController@searchFullText')->name('searchFullText');
            //sắp xếp
            Route::get('/sapXep', 'App\Http\Controllers\admin\LopController@sapXep')->name('sapXep');
        });
    });
// });

