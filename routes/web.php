<?php
use App\Http\Controllers\InstructorController;
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
Route::post('/store', [InstructorController::class, 'store'])->name('store');
Route::get('/fetchall', [InstructorController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [InstructorController::class, 'delete'])->name('delete');
Route::get('/edit', [InstructorController::class, 'edit'])->name('edit');
Route::post('/update', [InstructorController::class, 'update'])->name('update');