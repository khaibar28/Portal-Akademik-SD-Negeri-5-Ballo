<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\NilaiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [UserController::class, 'index'])->name('index')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/home', function(){
    return view('home');
})->name('home')->middleware('auth');

Route::prefix('/u')->group(function(){
    Route::prefix('/rekap')->group(function(){
        Route::get('/', [RekapController::class, 'index'])->name('rekap')->middleware('teacher');
        Route::post('/submit-filter', [RekapController::class, 'index'])->name('submitFilter')->middleware('teacher');
        Route::get('/edit', [RekapController::class, 'edit'])->name('editrekap')->middleware('teacher');
    });
    Route::prefix('/tugas')->group(function(){
        Route::get('/', [TugasController::class, 'read'])->name('tugas')->middleware('teacher');
    });
    Route::prefix('/nilai')->group(function(){
        Route::get('/', [NilaiController::class, 'readNilai'])->name('nilai')->middleware('teacher');
    });
    Route::prefix('/setting')->group(function(){
        Route::get('/', [AdminController::class, 'read'])->name('setting')->middleware('admin');
        Route::get('/akun', [AdminController::class, 'akun'])->name('akun')->middleware('admin');
        Route::post('/akun', [AdminController::class, 'addAkun'])->name('addAkun')->middleware('admin');
        Route::get('/kelas', [AdminController::class, 'kelas'])->name('kelas')->middleware('admin');
        Route::post('/kelas',[AdminController::class,'store'])->name('kelas.store')->middleware('admin');
    });
});

Route::get('/rekap', [StudentController::class, 'rekap'])->name('srekap')->middleware('student');
Route::get('/tugas', [StudentController::class, 'tugas'])->name('stugas')->middleware('student');