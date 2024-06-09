<?php

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


Route::get('khoahoc', function () {
    return 'xin chao';
}); 
Route::get('HoTen/{ten}', function ($ten) {
    echo "Ten cua bạn la: " .$ten;
}); 
Route::get('Thai/{ngay}', function ($ngay) {
    echo " Thai " .$ngay;
}); 
Route::get('Thai1/{ngay}', function ($ngay) {
    echo " Thai " .$ngay;
}) ->where(['ngay'=>'[a-zA-Z]+'])
; 
Route::get('Router1',['as'=>'MyRoute',function(){
    echo "Xin chao cac ban";
    }]);
Route::get('GoiTen',)