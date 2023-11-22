<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function read(){
        return view("u/tugas");
    }

    public function add(){
        return view("u/tambahTugas");
    }
}
