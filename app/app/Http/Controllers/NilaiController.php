<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\SchoolYear;

class NilaiController extends Controller
{
    public function readNilai(){
        $grades = Classes::distinct()->pluck('grade');
        $schoolYears = SchoolYear::distinct()->pluck('school_year');

        return view("u/nilai",compact("grades","schoolYears"));
    }
}
