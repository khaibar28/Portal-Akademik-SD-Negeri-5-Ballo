<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Score;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function rekap(Request $request){
        $dataClass = Score::where('user_id', auth()->user()->id)->distinct()->pluck('classess_id');

        if ($request->isMethod('post')) {
            $grade = $request->input('grade');

            $dataScore = Score::where('user_id', auth()->user()->id)->where('classess_id', function ($query) use($grade) {
                $query->select('classess_id')
                    ->from('scores')
                    ->where('user_id', auth()->user()->id)
                    ->where('classess_id', $grade)->first();

            })
            ->get();

                return view('rekap', compact('dataClass', 'dataScore'));
       }else if ($request->isMethod('get')) {
                $dataScore = Score::where('user_id', auth()->user()->id)->where('classess_id', function ($query) {
                    $query->select('classess_id')
                        ->from('scores')
                        ->where('user_id', auth()->user()->id)
                        ->orderBy('classess_id', 'desc')
                        ->limit(1);
                })
                ->get();

                return view('rekap', compact('dataClass', 'dataScore'));
            }
    }

    public function tugas(Request $request){
        $dataClass = Score::where('user_id', auth()->user()->id)->distinct()->pluck('classess_id');

        if ($request->isMethod('post')) {
            $grade = $request->input('grade');

            $dataScore = Task::where('classess_id', function ($query) use($grade) {
                $query->select('classess_id')
                    ->from('scores')
                    ->where('user_id', auth()->user()->id)
                    ->where('classess_id', $grade)->first();

            })
            ->get();

                return view('tugas', compact('dataClass', 'dataScore'));
       }else if ($request->isMethod('get')) {
                $dataScore = Task::where('classess_id', function($query){
                    $query->select('classess_id')
                        ->from('scores')
                        ->orderBy('classess_id', 'desc')
                        ->limit(1);
                })
                ->get();

                return view('tugas', compact('dataClass', 'dataScore'));
            }
    }
}
