<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;

class StudentController extends Controller
{
    public function rekap(){
        $data = Score::where('user_id', auth()->user()->id)->get();
        return view('rekap', compact('data'));
    }

    public function tugas(){
        return view('tugas');
    }
}
