<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', [StudentController::class, 'index'])->name('index');

// Route::prefix('students')->name('students.')->controller(StudentController::class)->group(function () {
//     Route::get('/view', [StudentController::class, 'student'])->name('view');
//     Route::put('/edit', [StudentController::class, 'student_edit'])->name('edit');
//     Route::get('/add', [StudentController::class, 'student_add'])->name('add');
//     Route::get('/delete/{id}', [StudentController::class, 'student_delete'])->name('delete');
// });

Route::prefix('students')->name('students.')->controller(StudentController::class)->group(function () {
    Route::get('/add', 'student')->name('add');
    Route::post('/create', 'student_add')->name('create');
    Route::get('/edit/{id}', 'student_edit_form')->name('edit.form');
    Route::put('/edit/{id}', 'student_edit')->name('edit');
    Route::delete('/delete/{id}', 'student_delete')->name('delete');
});

Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/add', 'store')->name('add');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
});

Route::resource('post', PostController::class);

// Route::middelware('auth')->group(function () {

// });


Route::prefix('students')->name('students.')->controller(StudentDataController::class)->group(function () {
    Route::get('/view', [StudentDataController::class, 'index'])->name('view');
});




// Route::group(['prefix' => '/students', 'as' => 'students.'], function() {
//     Route::get('show', function () {
//         $name = "Mardyon";
//         $grade = "Grade 1";
//         $address = ["Bulacan", "Laguna"];
//         return view('students.students', compact('name', 'grade', 'address'));
//     })->name('show');

    
// });

// Route::get('/index', function () {
//     return view('index');
// })->name('index');

// Route::redirect('/', 'index');