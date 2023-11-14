<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function read(){
        return view('u/rekap');
    }

    public function edit(){
        return view('u/editrekap');
    }
}
