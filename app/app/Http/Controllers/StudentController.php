<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Classes;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function rekap(Request $request){
        $dataClass = Score::where('user_id', auth()->user()->id)->distinct()->pluck('classess_id');
    
        if ($request->isMethod('post')) {
            // Jika request menggunakan metode POST, simpan data ke session
            $request->session()->put('dataScore', $this->readRekap($request));
            return redirect()->route('rekap');
        }
    
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
    
    public function readRekap(Request $request){
        $grade = $request->input('grade');
        $dataScore = DB::table('scores')
            ->join('classess', 'scores.classess_id', '=', 'classess.id')
            ->where('scores.user_id', auth()->user()->id)
            ->where('classess.grade', $grade)
            ->get();
        return $dataScore;
    }
    

    public function tugas(){
        return view('tugas');
    }
}
