<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function read(){
        return view('u/setting');
    }

    public function akun(){
        return view('u/setting/akun');
    }

    public function kelas(){
        return view('u/setting/kelas');
    }
}
