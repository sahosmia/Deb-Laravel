<?php

use App\Http\Controllers\Admin\CourseManagement\BatchController;
use App\Http\Controllers\Admin\CourseManagement\StudentController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Frontend\FrontendController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\UserManagement\PermissionController;
use App\Http\Controllers\Admin\UserManagement\RoleController;
use App\Http\Controllers\Admin\UserManagement\ModuleController;



Route::middleware('auth')->group(function () {

    // Admin Route
    Route::prefix('admin/')->name('admin.')->middleware('normal_user_auth')->group(function () {

        Route::get('home', [HomeController::class, 'index'])->name('home');

        // users
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('modules', ModuleController::class);

        // Course Management
        // Route::get('batches/students/{id}', [BatchController::class, 'students'])->name('batches.students');
        Route::resource('batches', BatchController::class);

        Route::get('students/{batch}', [StudentController::class, 'index'])->name('students.index');
        Route::get('students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
        Route::post('students/update/{id}', [StudentController::class, 'update'])->name('students.update');
        Route::get('students/delete/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
        Route::get('change-satatus/students/{student}/decision/{decision}', [StudentController::class, 'students_status']);
    });

    // Frontend Route
    Route::name('frontend.')->group(function () {
        Route::get('/', [FrontendController::class, 'index'])->name('index');
        Route::get('/ragistation', [FrontendController::class, 'ragistation'])->name('ragistation');
        Route::post('/ragistationSubmit', [FrontendController::class, 'ragistationSubmit'])->name('ragistationSubmit');
    });
});





Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-submit', [LoginController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register-submit', [RegisterController::class, 'registerSubmit'])->name('registerSubmit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//
//
//
//
// /
// /
//
// /
//
Route::get('/text', function () {
    return view('text');
});



// Route::get('/roles-create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('roles.create');
// Route::post('/create-role', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store');
// Route::get('/edit-role/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('edit-role');
// Route::put('/update-role/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('update-role');

// Route::get('/permissions', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('permissions');
// Route::post('/create-permission', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('create-permission');
