<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/')->name('login')->uses('App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::post('/')->uses('App\Http\Controllers\Auth\LoginController@login');
Auth::routes(['login' => false, 'register' => false]);

Route::group(['middleware' => ['auth']], function()
{
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'store'])->name('change.password');
    Route::put('/upload-photo/{id}', [App\Http\Controllers\ProfileController::class, 'uploadPhoto'])->name('upload.photo');
    Route::get('/subjects', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject.view');
    Route::post('/subject', [App\Http\Controllers\SubjectController::class, 'store'])->name('subject.store');
    Route::delete('/subject-delete/{id}', [App\Http\Controllers\SubjectController::class, 'destroy'])->name('subject.destroy');
    Route::get('/assign-subject', [App\Http\Controllers\AssignSubjectController::class, 'index'])->name('assign.subject');
    Route::post('/assign-subject', [App\Http\Controllers\AssignSubjectController::class, 'store'])->name('assign.subject.store');
    Route::get('/students', [App\Http\Controllers\UserController::class, 'index'])->name('student.view');
    Route::delete('/students-delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('student.destroy');
    Route::get('/view-profile/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('view.profile');
    Route::delete('/assigned-subject-delete/{id}', [App\Http\Controllers\AssignSubjectController::class, 'destroy'])->name('assign.subject.destroy');
    Route::post('/user-store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/edit-user/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit.user');
    Route::put('/update-user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update.user');
    Route::get('/enrolled-subjects', [App\Http\Controllers\AssignSubjectController::class, 'studentView'])->name('subject.studentView');
    Route::get('/student-marks/{user}', [App\Http\Controllers\MarksController::class, 'show'])->name('marks.view');
    Route::put('/update-marks/{user}', [App\Http\Controllers\MarksController::class, 'update'])->name('marks.update');
    Route::get('/subjects-pdf', [App\Http\Controllers\PdfGeneratorController::class, 'subjectpdfGenerate'])->name('subject.pdf');
    Route::get('/marks-pdf/{user}', [App\Http\Controllers\PdfGeneratorController::class, 'markspdfGenerate'])->name('marks.pdf');

});
