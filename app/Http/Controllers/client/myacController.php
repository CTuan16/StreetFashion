<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class myacController extends Controller
{
    public function myAC(){
        return view("client.myac");
    }
}
