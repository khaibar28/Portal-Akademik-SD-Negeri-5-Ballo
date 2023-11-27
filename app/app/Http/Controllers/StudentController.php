<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Classes;

class StudentController extends Controller
{
    public function rekap(){
        $dataClass = Score::where('user_id', auth()->user()->id)->distinct()->pluck('classess_id');
        $dataScore = Score::where('user_id', auth()->user()->id)->get();
        return view('rekap', compact('dataClass', 'dataScore'));
    }

    public function tugas(){
        return view('tugas');
    }
}
