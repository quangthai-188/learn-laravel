<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;



class MyController extends Controller
{
    public function Xinchao()
    {
        echo "Xin chao";
    }
    public function KhoaHoc($ten)
    {
        echo "Khoa hoc :" . $ten;
        return redirect()->route('MyRoute');
    }
    public function GetURL(Request $request)
    {
        //return $request->path();
        //return $request->url();
        // if($request->isMethod('get'))
        //  echo "Phuong thuc Get";
        // else
        //  echo "Kh phai phuong thuc get";
        if ($request->is('My*'))
            echo "Co My";
        else
            echo "Kh co My";
    }

    public function postForm(Request $request)
    {
        echo $request->HoTen;
    }
    public function setCookie()
    {
        $response = new Response();
        $response->withCookie('KhoaHoc', 'Laravel', 0.1);
        echo "Da set Cookie";
        return $response;
    }
    public function getCookie(Request $request)
    {
        echo "Cookie cua ban la:";
        return $request->cookie('KhoaHoc');
    }

    public function postFile(Request $request)
    {
        if ($request->hasFile('myFile')) {
            // echo "Da co file";
            $file = $request->file('myFile');
            if ($file->getClientOriginalExtension('myFile') == "jgp") {
                $filename = $file->getClientOriginalName('myFile');
                $file->move('img', $filename);
                echo "Da luu file :" . $filename;
            } else {
                echo "khong dc phep upload file";
            }

        } else {
            echo "Chua co file";
        }
    }
    public function getJson(){
        $array = ['KhoaHoc','Laravel','php'];
        return response()->json($array);
    }

    public function myView(){
        return view('QuangThai');
    }

    public function Time($t){
        return view('Myview',['t'=>$t]);
    }
}