<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function qldonhang(){
        return view('admin.qldonhang');
    }
    public function qlsanpham(){
        return view('admin.qlsanpham');
    }
    public function qltaikhoan(){
        return view('admin.qltaikhoan');
    }
}
