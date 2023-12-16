<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\User;
use App\Models\Score;
use App\Models\Subject;
use App\Models\SchoolYear;
use App\Models\Teacher;

class AdminController extends Controller
{
    public function read()
    {
        return view('u/setting');
    }

    public function akun()
    {
        return view('u/setting/akun');
    }

    public function kelas()
    {
        $grades = Classes::distinct()->pluck('grade');
        $school_years = SchoolYear::distinct()->pluck('school_year');
        return view('u/setting/kelas', compact('grades','school_years'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_number' => 'required',
            'grade' => 'required',
            'school_year' => 'required',

        ]);

        $schoolYear = SchoolYear::where('school_year', $data['school_year'])->first();

        $class = Classes::where('grade', $data['grade'])
            ->first();

        $user = User::where('user_number', $data['user_number']) ->first();

        if (!$class || !$user) {
            return redirect()->back()->with('error', 'Data not found. Please check your selections.');
        }

        if ($user->role === 'student') {
          
            $subjects = Subject::all();

            foreach ($subjects as $subject) {
                $scoreData = [
                    'classess_id' => $class->id,
                    'user_id' => $user->id,
                    'subjects_id' => $subject->id,
                    'school_years_id' => $schoolYear->id
                ];
    
                Score::create($scoreData);
            }
    
            return redirect()->route('setting')->with('success', 'Scores created successfully');
       
        }elseif ($user->role === 'teacher') {

            $teacherData = [
                'classess_id'=> $class->id,
                'user_id' => $user->id
            ];

                Teacher::create($teacherData);
                return redirect()->route('setting')->with('success', 'Scores created successfully');       
        }
       
    }

    public function addAkun(Request $request){
        
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'user_number' => 'required',
            'role' => 'required',
        ]); 

        User::create($data);

        return redirect()->route('setting')->with('success', 'Akun berhasil ditambahkan');
    }

    public function murid()
    {
        $grades = Classes::distinct()->pluck('grade');
        $schoolYears = SchoolYear::distinct()->pluck('school_year');
        return view('u/setting/murid', compact('grades','schoolYears'));
    }

    public function indexMurid(){
        return view('u/setting/datamurid');
    }

    public function guru()
    {
        $grades = Classes::distinct()->pluck('grade');
        $schoolYears = SchoolYear::distinct()->pluck('school_year');
        return view('u/setting/guru', compact('grades','schoolYears'));
    }

    public function indexGuru(){
        return view('u/setting/dataguru');
    }
}
