<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use Illuminate\Http\Request;    


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
    echo "Ten cua bạn la: " . $ten;
});
Route::get('Thai/{ngay}', function ($ngay) {
    echo " Thai " . $ngay;
});
Route::get('Thai1/{ngay}', function ($ngay) {
    echo " Thai " . $ngay;
})->where(['ngay' => '[a-zA-Z]+'])
;
Route::get('Router1', [
    'as' => 'MyRoute',
    function () {
        echo "Xin chao cac ban";
    }
]);

Route::get('GoiTen', function () {
    return redirect()->route('MyRoute');
});

Route::get('Router2', function () {
    echo "Day la route2";
})->name('MyRoute2');
Route::get('GoiTen2', function () {
    return redirect()->route('MyRoute2');
});

Route::group(['prefix'=>'MyGroup'],function(){
    Route::get('User1',function(){
        echo "User1";
    });
    Route::get('User2',function(){
        echo "User2";
    });
    Route::get('User3',function(){
        echo "User3";
    });
});

Route::get('GoiController', [MyController::class, 'Xinchao']);

Route::get('ThamSo/{ten}',[MyController::class, 'KhoaHoc']);

Route::get('MyRequest', [MyController::class, 'GetURL']);

Route::get('getForm',function(){
    return view('postForm');
});

// Route::post('postForm',['as'=>'postForm','uses'=> [MyController::class,'postForm']]);

Route::post('postForm', [MyController::class, 'postForm'])->name('postForm');

//Cookie

Route::get('setCookie',[MyController::class, 'setCookie']);
Route::get('getCookie',[MyController::class, 'getCookie']);

//upload file

Route::get('uploadFile',function(){
    return view('postFile');
});

Route::post('postFile', [MyController::class, 'postFile'])->name('postFile');

//Json
 Route::get('getJson',[MyController::class, 'getJson']);

 //View
 Route::get('myView',[MyController::class, 'myView']);