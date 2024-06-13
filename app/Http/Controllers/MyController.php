<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
}