<?php

use App\Http\Controllers\Admin\CourseManagement\BatchController;
use App\Http\Controllers\Admin\CourseManagement\StudentController;
use App\Http\Controllers\Admin\GenaralContent\BlogController;
use App\Http\Controllers\Admin\GenaralContent\CounterController;
use App\Http\Controllers\Admin\GenaralContent\GalleryController;
use App\Http\Controllers\Admin\GenaralContent\NoticeController;
use App\Http\Controllers\Admin\GenaralContent\QuestionController;
use App\Http\Controllers\Admin\GenaralContent\TeamController;
use App\Http\Controllers\Admin\GenaralContent\TestimonialController;
use App\Http\Controllers\Admin\GenaralContent\WhyChooseController;
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
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::middleware('auth')->group(function () {

    // Admin Route
    Route::prefix('admin/')->name('admin.')->middleware('normal_user_auth')->group(function () {

        Route::get('home', [HomeController::class, 'index'])->name('home');

        // Users Management
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

        // Genaral Content
        Route::resource('blogs', BlogController::class);
        Route::resource('counters', CounterController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('notices', NoticeController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('why-chooses', WhyChooseController::class);
    });

    // Frontend Route
    Route::name('frontend.')->group(function () {
        Route::get('/', [FrontendController::class, 'index'])->name('index');
        Route::get('/ragistation', [FrontendController::class, 'ragistation'])->name('ragistation');
        Route::post('/ragistationSubmit', [FrontendController::class, 'ragistationSubmit'])->name('ragistationSubmit');
    });

    // Route::view('/no-access', [FrontendController::class, 'noAccess'])->name('noAccess');

    Route::view('/no-access', 'error.403')->name("noAccess");
});





Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-submit', [LoginController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register-submit', [RegisterController::class, 'registerSubmit'])->name('registerSubmit');
Route::get('/register-otp', [RegisterController::class, 'registerOtp'])->name('registerOtp');
Route::post('/register-otp-submit', [RegisterController::class, 'registerOtpSubmit'])->name('registerOtpSubmit');
Route::get('/resend-otp', [RegisterController::class, 'resendOtp'])->name('resendOtp');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/password-forget', [ForgotPasswordController::class, 'passwordForget'])->name('passwordForget');
Route::post('/password-forget-submit', [ForgotPasswordController::class, 'passwordForgetSubmit'])->name('passwordForgetSubmit');
Route::get('/password-reset/{email}/{id}', [ForgotPasswordController::class, 'passwordReset'])->name('passwordReset');
Route::post('/password-reset-submit', [ForgotPasswordController::class, 'passwordResetSubmit'])->name('passwordResetSubmit');


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

Route::get('test1', [HomeController::class, 'test1'])->name('test1');
Route::get('test2', [HomeController::class, 'test2'])->name('test2');

// Route::get('/roles-create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('roles.create');
// Route::post('/create-role', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store');
// Route::get('/edit-role/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('edit-role');
// Route::put('/update-role/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('update-role');

// Route::get('/permissions', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('permissions');
// Route::post('/create-permission', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('create-permission');
