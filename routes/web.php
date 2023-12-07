<?php
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
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
Route::get('/', [InstructorController::class, 'index']);
Route::get('/course', [InstructorController::class, 'course']);

Route::post('/instructor-store', [InstructorController::class, 'store'])->name('instructor-store');
Route::get('/instructor-fetchall', [InstructorController::class, 'fetchAll'])->name('instructor-fetchAll');
Route::delete('/instructor-delete', [InstructorController::class, 'delete'])->name('instructor-delete');
Route::get('/instructor-edit', [InstructorController::class, 'edit'])->name('instructor-edit');
Route::post('/instructor-update', [InstructorController::class, 'update'])->name('instructor-update');


Route::post('/course-store', [CourseController::class, 'store'])->name('course-store');
Route::get('/course-fetchall', [CourseController::class, 'fetchAll'])->name('course-fetchAll');
Route::delete('/course-delete', [CourseController::class, 'delete'])->name('course-delete');
Route::get('/course-edit', [CourseController::class, 'edit'])->name('course-edit');
Route::post('/course-update', [CourseController::class, 'update'])->name('course-update');