<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TugasController extends Controller
{
    public function read(){
        $grades = Teacher::join('classess', 'teachers.classess_id', '=', 'classess.id')
        ->where('teachers.user_id', auth()->user()->id)
        ->pluck('classess.grade');
        $subjects = Subject::distinct()->pluck('subject');
        $schoolYears = SchoolYear::distinct()->pluck('school_year');
        return view('u/tugas', compact('grades', 'subjects', 'schoolYears'));
    }

    public function index(Request $request){

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

            $filteredData = DB::table('tasks')
            ->join('classess', 'tasks.classess_id', '=', 'classess.id')
            ->join('school_years', 'tasks.school_years_id', '=', 'school_years.id')
            ->join('subjects', 'tasks.subjects_id', '=', 'subjects.id')
            ->where('classess.grade', $grade)
            ->where('school_years.school_year', $schoolYear)
            ->where('subjects.subject', $subject)
            ->select('tasks.*', 'classess.grade', 'school_years.school_year', 'subjects.subject')
            ->get();

            return view('u/datatugas',compact('filteredData', 'dataYear', 'dataSubject', 'dataGrade'));

    }

    public function add(){
        return view("u/tambahTugas");
    }

    public function store(Request $request){
        $selectedFilteredData = $request->session()->get('selectedFilterData');

        $schoolYear = $selectedFilteredData['school_year'];
        $subject = $selectedFilteredData['subject'];
        $grade = $selectedFilteredData['grade'];

        $classes = Classes::where('grade', $grade)->first();
        $subjectData = Subject::where('subject', $subject)->first();
        $schoolYearData = SchoolYear::where('school_year', $schoolYear)->first();

        $formattedDeadline = Carbon::createFromFormat('d-m-Y', $request->input('deadline'))->format('Y-m-d');

        if (!$classes || !$subjectData || !$schoolYearData) {
            // Handle the case when data is not found
            return redirect()->route('tugas')->with('error', 'Data not found');
        }

        $data = $request->validate([
            'task_description' => 'required',
            'deadline' => 'required',
        ]);


        $data = [
            'task_description' => $request->input('task_description'),
            'deadline' => $request->input('deadline'),
            'classess_id' => $classes->id,
            'subjects_id' => $subjectData->id,
            'school_years_id' => $schoolYearData->id
        ];

        $data['deadline'] = $formattedDeadline;

        Task::create($data);
        return redirect()->route('tugas')->with('success', 'Task created successfully');
    }


    public function edit($id){
        $data = Task::find($id);
        return view('u/edittugas', compact('data'));
    }
}
