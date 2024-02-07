<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ObtainedMarksController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SectionController;


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

Route::get('/', function () {
    $students = \App\Models\Student::all();
    $classes = \App\Models\StudentClass::all();
    $subjects = \App\Models\Subject::all();
    $pageTitle = 'Dashboard';
    return view('home',compact('students','classes','subjects','pageTitle'));
});

Route::get('data/sections/{class_id}', [ApiController::class, 'getSections']);
Route::resource('subjects', SubjectController::class);
Route::resource('exams', ExamController::class);
Route::resource('class', ClassController::class);
Route::resource('students', StudentController::class);
Route::resource('sections', SectionController::class);
Route::resource('marks', MarkController::class);
Route::resource('Obtainedmarks', ObtainedMarksController::class);







Route::get('section/create/{class_id}', [SectionController::class, 'create'])->name('sections.create');
Route::post('section/store', [SectionController::class, 'store'])->name('sections.store');
Route::get('view/marksheet',[\App\Http\Controllers\MarksheetController::class,'view'])->name('marksheet.view');
Route::get('student/live-search',[StudentController::class,'liveSearch'])->name('student.live-search');

