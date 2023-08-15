<?php
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\CoursesController;
use Illuminate\Support\Facades\Route;


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
// Route::get('/student', function () {
//     return view('admin.index');
// });
Route::group((['prefix','admin']),function () {
    Route::resource([
        'students'=>StudentController::class,
        'departments'=>DepartmentController::class,
        'topics'=>TopicController::class,
        'instructors'=>InstructorController::class,
        'courses'=>CoursesController::class
    ]);

});
