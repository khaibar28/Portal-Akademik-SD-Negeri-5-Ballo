<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\StudentController;

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
        Route::get('/', [RekapController::class, 'read'])->name('rekap')->middleware('teacher');
        Route::get('/edit', [RekapController::class, 'edit'])->name('editrekap')->middleware('teacher');
    });
    // Route::get('/setting', [AdminController::class, 'read'])->name('setting')->middleware('admin');
    Route::prefix('/setting')->group(function(){
        Route::get('/', [AdminController::class, 'read'])->name('setting')->middleware('admin');
        Route::get('/akun', [AdminController::class, 'akun'])->name('akun')->middleware('admin');
        Route::get('/kelas', [AdminController::class, 'kelas'])->name('kelas')->middleware('admin');
    });
});

Route::get('/rekap', [StudentController::class, 'rekap'])->name('srekap')->middleware('student');
Route::get('/tugas', [StudentController::class, 'tugas'])->name('stugas')->middleware('student');