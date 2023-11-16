<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function readNilai(){
        return view("u/nilai");
    }
}
