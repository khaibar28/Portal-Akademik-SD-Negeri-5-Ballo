<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Score;
use App\Models\Subject;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $grades = Classes::distinct()->pluck('grade');
        $subjects = Subject::distinct()->pluck('subject');
        $schoolYears = SchoolYear::distinct()->pluck('school_year');

        $filteredData = null;
        if ($request->filled(['school_year', 'grade', 'subject'])) {
            $schoolYear = $request->input('school_year');
            $grade = $request->input('grade');
            $subject = $request->input('subject');

            $filteredData = DB::table('scores')
            ->join('classess', 'scores.classess_id', '=', 'classess.id')
            ->join('school_years', 'scores.school_years_id', '=', 'school_years.id')
            ->join('subjects', 'scores.subjects_id', '=', 'subjects.id')
            ->join('users', 'scores.user_id', '=', 'users.id') 
            ->where('classess.grade', $grade)
            ->where('school_years.school_year', $schoolYear)
            ->where('subjects.subject', $subject)
            ->select('scores.*', 'classess.grade', 'school_years.school_year', 'subjects.subject', 'users.name', 'users.user_number') 
            ->get();
        }

        return view('u/rekap', compact('grades', 'subjects', 'schoolYears', 'filteredData'));
    }

    public function edit()
    {
        return view('u/editrekap');
    }
}
