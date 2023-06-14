<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\AttendanceController;

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
    return view('welcome');
});
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => [ 'auth:sanctum' ,'Admin'],
    ],
    function () {
            Route::get('dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');
            Route::resource('groups', GroupController::class);
            Route::get('create_group_students/{id}', [GroupController::class, 'createStudent'])->name('create_group_students');
            Route::post('store_group_students', [GroupController::class, 'storeGroupStudent'])->name('store_group_students');
            
            Route::resource('levels', LevelController::class);
            Route::resource('courses', CourseController::class);
            Route::resource('students', StudentController::class);
            
            Route::resource('classes', ClassController::class);
            Route::get('end-class/{id}', [ClassController::class, 'endClass'])->name('end-class');
            Route::resource('attendances', AttendanceController::class);
            
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';