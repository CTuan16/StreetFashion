<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class userAD extends Controller
{
    public function showUser(Request $request){
    $result_user = User::all();
    return view("admin.qltaikhoan",compact("result_user"));
    }
   
}
