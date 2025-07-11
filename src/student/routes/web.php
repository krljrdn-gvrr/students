<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('students')->middleware(['auth'])->name('students.')->controller(StudentController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/add', 'student')->name('add');
    Route::post('/create', 'student_add')->name('create');
    Route::get('/edit/{id}', 'student_edit_form')->name('edit.form');
    Route::put('/edit/{id}', 'student_edit')->name('edit');
    Route::delete('/delete/{id}', 'student_delete')->name('delete');
});

Route::prefix('users')->middleware(['auth'])->name('users.')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/add', 'store')->name('add');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
});

Route::resource('post', PostController::class);

require __DIR__.'/auth.php';
