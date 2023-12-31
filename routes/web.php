<?php
use  App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TopicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\CourseInstructorController;
use App\Http\Controllers\CousreInstructor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

Route::group(['prefix'=>'admin'],function(){
    Route::get('students/archive',[StudentController::class,'archive'])->name('students.archive');
    Route::post('students/restore/{id}',[StudentController::class,'restore'])->name('students.restore');
    Route::delete('students/deleteArchive/{id}',[StudentController::class,'deleteArchive'])->name('students.deleteArchive');
    Route::resources([
        'instructors'=>InstructorController::class,
        'students'=>StudentController::class,
        // 'departments'=>DepartmentController::class,
        'topics'=>TopicController::class,
        'departments'=>DepartmentController::class,
        'courses'=>CoursesController::class,
        'courseInstructor'=>CourseInstructorController::class,
    ]);

});
// Route::get('departments', function () {
//     return view('admin.departments.index');
// })->name('departments.index');

// Route::get('department', function () {
//     return view('admin.departments.create');
// })->name('departments.create');
// Route::get('topics', function () {
//     return view('admin.topics.index');
// })->name('topics.index');

// Route::get('topic', function () {
//     return view('admin.topics.create');
// })->name('topics.create');
