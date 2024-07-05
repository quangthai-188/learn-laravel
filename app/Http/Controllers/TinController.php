<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tin;
class TinController extends Controller
{
    //
    public function index(){
        $product  = Tin::Paginate(2);


        return view('product',['product'=>$product]);
    }
}
