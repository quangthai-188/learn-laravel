<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;    
use App\Models;
use PharIo\Manifest\AuthorCollection;

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
})->name('postFile');

Route::post('postFile', [MyController::class, 'postFile'])->name('postFile');

//Json
 Route::get('getJson',[MyController::class, 'getJson']);

 //View
 Route::get('myView',[MyController::class, 'myView']);

 Route::get('Time/{t}',[MyController::class, 'Time']);
 View::share('Khoahoc','Thai');

 //blade temlpate

 Route::get('blade',function(){
    return view('pages.laravel');
 });

 Route::get('BladeTemplate/{str}',[MyController::class, 'blade']);

 //database

 Route::get('database',function(){
    // Schema::create('loaisanpham',function($table){
    // $table->increments('id');
    // $table->string('ten',200);
    // });

    Schema::create('theloai',function($table){
        $table->increments('id');
        $table->string('ten',200)->nullable();
        $table->string('nsx')->default('nha san xuat');
        });
    echo "da tao bang";
});
    
Route::get('qb/get',function(){
    $data = DB::table('users')->get();
    // var_dump($data);
    foreach($data as $row)
    {
        foreach($row as $key=>$value)
        {
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

//select * form users where id = 2

Route::get('qb/where',function(){
    $data = DB::table('users')->where('id','=',2)->get();
    // var_dump($data);
    foreach($data as $row)
    {
        foreach($row as $key=>$value)
        {
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

//select id,name,enmail

Route::get('qb/select',function(){
    $data = DB::table('users')->select(['id','name','email'])->where('id',2)->get();

    foreach($data as $row)
    {
        foreach($row as $key=>$value)
        {
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

Route::get('qb/raw',function(){
    $data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id',2)->get();

    foreach($data as $row)
    {
        foreach($row as $key=>$value)
        {
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

Route::get('qb/orderby',function(){
    $data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id','>',1)->orderBy('id','desc')->skip(1)->take(5)->get();
    // var_dump('users');
    echo $data->count();
    // foreach($data as $row)
    // {
    //     foreach($row as $key=>$value)
    //     {
    //         echo $key.":".$value."<br>";
    //     }
    //     echo "<hr>";
    // }
});

Route::get('up/update',function(){
    DB::table('users')->where('id',1)->update(['name'=>'Thai','email'=>'thai@gmail.com']);
    echo "da update";
});


Route::get('up/delete',function(){
    DB::table('users')->where('id',1)->truncate();
    echo "da xoa";
});

//model

Route::get('model/save',function(){
    $user =  new App\Models\User();
    $user->name ="Mai";
    $user->email = "Mai@gmail.com";
    $user->password = "Pass";

    $user->save();
    echo "da thuc kien save()";
});

Route::get('model/query',function(){
    $user = App\Models\User::find(1);
    echo $user->name;
});

Route::get('model/sanpham/save/{ten}',function($ten){
    $sanpham = new App\Models\Sanpham();
    $sanpham->ten = $ten;
    $sanpham->soluong= 100;
    $sanpham->save();
    echo " da luu " . $ten;
});

Route::get('model/sanpham/all',function(){
    $sanpham = App\Models\Sanpham::all()->toArray();
    var_dump($sanpham);
});

Route::get('model/sanpham/ten',function(){
    $sanpham = App\Models\Sanpham::where('ten','PC')->get()->toArray();
  echo  $sanpham[0]['ten'];
    // var_dump($sanpham);
});

Route::get('model/sanpham/delete',function(){
    App\Models\Sanpham::destroy(2);
    echo 'Da xoa';
});

Route::get('taocot',function(){
    Schema::table('sanpham',function($table){
        $table->integer('id_loaisanpham')->unsigend();
    });
});

Route::get('lienket',function(){
    $data = App\Models\Sanpham::find(3)->loaisanpham->toArray();
    var_dump($data);
});



Route::get('diem',function(){
    echo "Bạn đã đủ  điểm";
})->middleware('MyMiddle')->name('diem');

Route::get('loi',function(){
    echo "Bạn chưa đủ điểm";
})->name('loi');

Route::get('nhapdiem',function(){
    return view('nhapdiem');
})->name('nhapdiem');

//auth

Route::get('dangnhap',function(){
    return view('dangnhap');
})->name('dangnhap');

Route::post('login',[AuthController::class, 'login'])->name('login');
