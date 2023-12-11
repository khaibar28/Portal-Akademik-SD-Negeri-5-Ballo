<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\SchoolYear;
use App\Models\User;
use App\Models\Score;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function readNilai(){
        $grades = Classes::distinct()->pluck('grade');
        $schoolYears = SchoolYear::distinct()->pluck('school_year');

        return view("u/nilai",compact('grades','schoolYears'));
    }

    public function index(Request $request){

        dd($request->all());
        $schoolYear = $request->input('school_year');
        $grade = $request->input('grade');

        $request->session()->put('selectedFilterData', [
            'school_year' => $schoolYear,
            'grade' => $grade,
      ]);

        return $this->showData($request);
    }

    public function showData(Request $request){

        $selectedFilteredData = $request->session()->get('selectedFilterData');
        $schoolYear = SchoolYear::where('school_year', $selectedFilteredData['school_year'])->first();
        $grade = Classes::where('grade', $selectedFilteredData['grade'])->first();



    return view('u/datanilai',compact('filteredData', 'schoolYear','grade'));
}

}
