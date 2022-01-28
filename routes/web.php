<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\StudentController;

// simple crud routing
Route::get('/',[StudentController::class,'view']);
Route::get('/insert',[StudentController::class,'insert']);
Route::post('/insert',[StudentController::class,'store'])->name('student.store');
Route::get('/delete',[StudentController::class,'delete'])->name('student.delete');
Route::get('/edit/',[StudentController::class,'edit'])->name('student.edit');
Route::post('/update/',[StudentController::class,'update'])->name('student.update');

// ajax crud routing
Route::post('/save',[StudentController::class,'saveData'])->name('student.store');
Route::get('show-std',[StudentController::class,'fetchData']);
Route::delete('deleteStd/{id}',[StudentController::class,'deleteData']);



