<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CourseManagement\BatchController;
use App\Http\Controllers\Admin\CourseManagement\RagistationController;
use App\Http\Controllers\Admin\CourseManagement\StudentController;
use App\Http\Controllers\Admin\GenaralContent\BlogController;
use App\Http\Controllers\Admin\GenaralContent\CounterController;
use App\Http\Controllers\Admin\GenaralContent\GalleryController;
use App\Http\Controllers\Admin\GenaralContent\NoticeController;
use App\Http\Controllers\Admin\GenaralContent\QuestionController;
use App\Http\Controllers\Admin\GenaralContent\TeamController;
use App\Http\Controllers\Admin\GenaralContent\TestimonialController;
use App\Http\Controllers\Admin\GenaralContent\WhyChooseController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\UserManagement\PermissionController;
use App\Http\Controllers\Admin\UserManagement\RoleController;
use App\Http\Controllers\Admin\UserManagement\ModuleController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;


Route::name('front.')->group(function () {
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('index');

    // Blog
    Route::get('/blog', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'details'])->name('blog.details');

    Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/message/store', [App\Http\Controllers\Frontend\ContactController::class, 'messageStore'])->name('contact.message.store');
    // Comment
    Route::post('/blog/comment/store', [App\Http\Controllers\Frontend\BlogCommentController::class, 'store'])->name('blog.comment.store');

    Route::middleware('auth')->group(function(){
        Route::get('/profile', [App\Http\Controllers\Frontend\ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/edit', [App\Http\Controllers\Frontend\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update/other', [App\Http\Controllers\Frontend\ProfileController::class, 'updateOther'])->name('profile.update.other');
        Route::post('/profile/update/genarel', [App\Http\Controllers\Frontend\ProfileController::class, 'updateGenarel'])->name('profile.update.genarel');
        Route::post('/profile/update/password', [App\Http\Controllers\Frontend\ProfileController::class, 'updatePassword'])->name('profile.update.password');

        Route::get('/ragistation', [App\Http\Controllers\Frontend\RagistationController::class, 'index'])->name('ragistation.index');
        Route::post('/ragistationSubmit', [App\Http\Controllers\Frontend\RagistationController::class, 'ragistationSubmit'])->name('ragistation.submit');
    });
});

// Frontend Route


// Admin Route
Route::prefix('admin/')
    ->name('admin.')
    ->middleware('normal_user_auth', 'auth')
    ->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');

        // Users Management
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('modules', ModuleController::class);

        // Course Management
        // Route::get('batches/students/{id}', [BatchController::class, 'students'])->name('batches.students');
        Route::resource('batches', BatchController::class);

        Route::get('students/{batch?}', [StudentController::class, 'index'])->name('students.index');
        Route::get('students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
        Route::get('students/show/{id}', [StudentController::class, 'show'])->name('students.show');
        Route::post('students/update/{id}', [StudentController::class, 'update'])->name('students.update');
        Route::get('students/delete/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

        Route::get('ragistations', [RagistationController::class, 'index'])->name('ragistations.index');
        Route::get('ragistations/edit/{id}', [RagistationController::class, 'edit'])->name('ragistations.edit');
        Route::get('ragistations/show/{id}', [RagistationController::class, 'show'])->name('ragistations.show');
        Route::get('ragistations/approve/{id}', [RagistationController::class, 'approve'])->name('ragistations.approve');
        Route::post('ragistations/update/{id}', [RagistationController::class, 'update'])->name('ragistations.update');
        Route::get('ragistations/delete/{student}', [RagistationController::class, 'destroy'])->name('ragistations.destroy');
        Route::get('change-satatus/ragistations/{student}/decision/{decision}', [RagistationController::class, 'ragistations_status']);

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

// Route::view('/no-access', [FrontendController::class, 'noAccess'])->name('noAccess');

Route::view('/no-access', 'error.403')->name('noAccess');

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

// /
//
Route::get('/text', function () {
    return view('text');
});

Route::get('test1', [HomeController::class, 'test1'])->name('test1');
Route::get('test2', [HomeController::class, 'test2'])->name('test2');
