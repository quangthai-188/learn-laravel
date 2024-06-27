<?php

namespace App\Http\Controllers;

use App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function login(Request $request){
        $username = $request['username'];
        $password = $request['password'];

        // $user = Models\User::find(2);
        // Auth::login($user);
        // return  view('thanhcong',['user'=>Auth::user()]);


        if(Auth::attempt(['name'=>$username,'password'=>$password]))
            return view('thanhcong',['user'=>Auth::user()]);
        else
            // return view('dangnhap');
            return view('dangnhap',['error'=>'Đăng nhập thất bại']);
    }
    public function logout(){
        Auth::logout();
        return view('dangnhap');
    }
}
