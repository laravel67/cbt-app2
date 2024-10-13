<?php

use App\Livewire\Homepage;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\Auth\Login as AuthLogin;
use App\Livewire\Quizs\Edit as QuizsEdit;
use App\Livewire\Quizs\Index as QuizIndex;
use App\Livewire\Quizs\Create as QuizCreate;
use App\Livewire\Quizs\Detail as QuizDetail;
use App\Livewire\Auth\Register as AuthRegister;
use App\Livewire\Auth\Registered as AuthRegistered;
use App\Livewire\Competitor\Index as CompetitorIndex;

// Route::get('/', Homepage::class)->name('home');
Route::get('/', function(){
    return view('layouts.auth');
});


Route::get('/exam', \App\Livewire\Home\Exam::class);
Route::get('/login', AuthLogin::class)->name('login');
Route::get('/register', AuthRegister::class,)->name('register')->middleware('guest');
Route::get('/registered-account', AuthRegistered::class)->name('registered')->middleware('auth');

Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::prefix('/quizs')->group(function () {
    Route::get('/', QuizIndex::class)->name('quizIndex');
    Route::get('/create', QuizCreate::class)->name('quizCreate');
    Route::get('/show/{id}', QuizDetail::class)->name('quizDetail');
    Route::get('/edit/{id}', QuizsEdit::class)->name('quizEdit');
});
Route::get('/competitors', CompetitorIndex::class)->name('competitorIndex');
Auth::routes(['login'=> false, 'register'=> false, 'verify'=> true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
