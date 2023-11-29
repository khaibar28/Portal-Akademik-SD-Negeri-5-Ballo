<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Subject;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function read(){
        $grades = Classes::distinct()->pluck('grade');
        $subjects = Subject::distinct()->pluck('subject');
        $schoolYears = SchoolYear::distinct()->pluck('school_year');
        return view('u/tugas', compact('grades', 'subjects', 'schoolYears'));
    }

    public function index(){
        return view('u/datatugas');
    }

    public function add(){
        return view("u/tambahTugas");
    }

    public function edit(){
        return view('u/edittugas');
    }
}
