<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    public $timestamps = false;

    public function loaisanpham()
    {
        return $this->belongsTo('App\Models\LoaiSanPham','id_loaisanpham','id');
    }
}
