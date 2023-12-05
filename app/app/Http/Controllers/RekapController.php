<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Score;
use App\Models\Subject;
use App\Models\SchoolYear;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
    public function read(){
        $grades = Teacher::join('classess', 'teachers.classess_id', '=', 'classess.id')
        ->where('teachers.user_id', auth()->user()->id)
        ->pluck('classess.grade');
        $subjects = Subject::distinct()->pluck('subject');
        $schoolYears = SchoolYear::distinct()->pluck('school_year');
        return view('u/rekap', compact('grades', 'subjects', 'schoolYears'));
    }

    public function index(Request $request) {

            $schoolYear = $request->input('school_year');
            $grade = $request->input('grade');
            $subject = $request->input('subject');

            $request->session()->put('selectedFilterData', [
                'school_year' => $schoolYear,
                'grade' => $grade,
                'subject' => $subject
          ]);

            return $this->showData($request);
    }

    public function showData(Request $request){

            $selectedFilteredData = $request->session()->get('selectedFilterData');
            $schoolYear = $selectedFilteredData['school_year'];
            $subject = $selectedFilteredData['subject'];
            $grade = $selectedFilteredData['grade'];

            $dataYear = $request->input('school_year');
            $dataSubject = $request->input('subject');
            $dataGrade = $request->input('grade');

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

        return view('u/datarekap',compact('filteredData', 'dataYear', 'dataSubject', 'dataGrade'));
    }

    public function edit(Request $request)
    {
            $selectedFilteredData = $request->session()->get('selectedFilterData');
            $schoolYear = $selectedFilteredData['school_year'];
            $subject = $selectedFilteredData['subject'];
            $grade = $selectedFilteredData['grade'];

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
        return view('u/editrekap', compact('filteredData'));
    }
}
