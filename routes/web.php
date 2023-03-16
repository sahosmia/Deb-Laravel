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
use App\Http\Controllers\Admin\GenaralContent\SettingController;
use App\Http\Controllers\Admin\GenaralContent\TeamController;
use App\Http\Controllers\Admin\GenaralContent\TestimonialController;
use App\Http\Controllers\Admin\GenaralContent\WhyChooseController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Frontend\PaymentController;
use Illuminate\Support\Facades\Route;

Route::name('front.')->group(function () {
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('index');
    Route::get('/gallries', [App\Http\Controllers\Frontend\GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/notices', [App\Http\Controllers\Frontend\NoticeController::class, 'index'])->name('notice.index');
    Route::get('/about-us', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about.index');

    // Blog
    Route::get('/blogs', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'details'])->name('blog.details');

    // Course
    Route::get('/courses', [App\Http\Controllers\Frontend\CourseController::class, 'index'])->name('course.index');
    Route::get('/courses/{slug}', [App\Http\Controllers\Frontend\CourseController::class, 'details'])->name('course.details');
    Route::post('/courses/review/store', [App\Http\Controllers\Frontend\CourseController::class, 'reviewStore'])->name('course.review.store');

    Route::get('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'checkout'])->name('checkout');

    Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/message/store', [App\Http\Controllers\Frontend\ContactController::class, 'messageStore'])->name('contact.message.store');

    // Comment
    Route::post('/blog/comment/store', [App\Http\Controllers\Frontend\BlogCommentController::class, 'store'])->name('blog.comment.store');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [App\Http\Controllers\Frontend\ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/dashboard', [App\Http\Controllers\Frontend\ProfileController::class, 'dashboard'])->name('profile.dashboard');
        Route::get('/profile/dashboard/course/{course_slug}/{lesson_id?}', [App\Http\Controllers\Frontend\ProfileController::class, 'dashboardCourse'])->name('profile.dashboard.course');
        Route::get('/profile/edit', [App\Http\Controllers\Frontend\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update/other', [App\Http\Controllers\Frontend\ProfileController::class, 'updateOther'])->name('profile.update.other');
        Route::post('/profile/update/genarel', [App\Http\Controllers\Frontend\ProfileController::class, 'updateGenarel'])->name('profile.update.genarel');
        Route::post('/profile/update/password', [App\Http\Controllers\Frontend\ProfileController::class, 'updatePassword'])->name('profile.update.password');

        Route::get('/carts', [App\Http\Controllers\Frontend\CartController::class, 'index'])->name('cart.index');
        Route::get('/carts/store/{id}', [App\Http\Controllers\Frontend\CartController::class, 'store'])->name('cart.store');
        Route::get('/carts/delete/{id}', [App\Http\Controllers\Frontend\CartController::class, 'delete'])->name('cart.delete');
    });
});

// Frontend Route

// Admin Route
Route::prefix('admin/')
    ->name('admin.')
    ->middleware('normal_user_auth', 'auth')
    ->group(function () {
        Route::get('dashboard', [HomeController::class, 'index'])->name('home');

        // Users Management
        Route::resource('users', App\Http\Controllers\Admin\UserManagement\UserController::class);
        Route::resource('roles', App\Http\Controllers\Admin\UserManagement\RoleController::class);
        Route::resource('permissions', App\Http\Controllers\Admin\UserManagement\PermissionController::class);
        Route::resource('modules', App\Http\Controllers\Admin\UserManagement\ModuleController::class);

        // Genaral Content
        Route::resource('blogs', BlogController::class);
        Route::resource('counters', CounterController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('notices', NoticeController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('why-chooses', WhyChooseController::class);

        // Course Management
        Route::resource('courses', App\Http\Controllers\Admin\CourseManagement\CourseController::class);
        Route::get('courses/{slug}/{lesson_id}', [App\Http\Controllers\Admin\CourseManagement\CourseController::class, 'show'])->name('courses.show.lesson');

        Route::get('chapters/create/{course_id}', [App\Http\Controllers\Admin\CourseManagement\ChapterController::class, 'create'])->name('chapters.create');
        Route::post('chapters/store', [App\Http\Controllers\Admin\CourseManagement\ChapterController::class, 'store'])->name('chapters.store');
        Route::get('chapters/edit/{id}', [App\Http\Controllers\Admin\CourseManagement\ChapterController::class, 'edit'])->name('chapters.edit');
        Route::post('chapters/update/{id}', [App\Http\Controllers\Admin\CourseManagement\ChapterController::class, 'update'])->name('chapters.update');
        Route::get('chapters/delete/{id}', [App\Http\Controllers\Admin\CourseManagement\ChapterController::class, 'destroy'])->name('chapters.delete');

        Route::get('lessons/create/{course_chapter_id}', [App\Http\Controllers\Admin\CourseManagement\LessonController::class, 'create'])->name('lessons.create');
        Route::post('lessons/store', [App\Http\Controllers\Admin\CourseManagement\LessonController::class, 'store'])->name('lessons.store');
        Route::get('lessons/edit/{id}', [App\Http\Controllers\Admin\CourseManagement\LessonController::class, 'edit'])->name('lessons.edit');
        Route::post('lessons/update/{id}', [App\Http\Controllers\Admin\CourseManagement\LessonController::class, 'update'])->name('lessons.update');
        Route::get('lessons/delete/{course_slug}/{id}', [App\Http\Controllers\Admin\CourseManagement\LessonController::class, 'destroy'])->name('lessons.delete');

        Route::resource('enrolls', App\Http\Controllers\Admin\CourseManagement\EnrollController::class);

        Route::get('settings/index', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings/contact/update', [SettingController::class, 'contactUpdate'])->name('settings.contact.update');
        Route::post('settings/logo/update', [SettingController::class, 'logoUpdate'])->name('settings.logo.update');
        Route::post('settings/banner/update', [SettingController::class, 'bannerUpdate'])->name('settings.banner.update');
        Route::post('settings/about/update', [SettingController::class, 'aboutUpdate'])->name('settings.about.update');
        Route::post('settings/notice/update', [SettingController::class, 'noticeUpdate'])->name('settings.notice.update');
        Route::post('settings/blog/update', [SettingController::class, 'blogUpdate'])->name('settings.blog.update');
        Route::post('settings/team/update', [SettingController::class, 'teamUpdate'])->name('settings.team.update');
        Route::post('settings/testimonial/update', [SettingController::class, 'testimonialUpdate'])->name('settings.testimonial.update');
        Route::post('settings/question/update', [SettingController::class, 'questionUpdate'])->name('settings.question.update');
        Route::post('settings/why_choose/update', [SettingController::class, 'why_chooseUpdate'])->name('settings.why_choose.update');
        Route::post('settings/modal/update', [SettingController::class, 'modalUpdate'])->name('settings.modal.update');
    });

Route::view('/no-access', 'error.403')->name('noAccess');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login-submit', [App\Http\Controllers\Auth\LoginController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register-submit', [App\Http\Controllers\Auth\RegisterController::class, 'registerSubmit'])->name('registerSubmit');
Route::get('/register-otp', [App\Http\Controllers\Auth\RegisterController::class, 'registerOtp'])->name('registerOtp');
Route::post('/register-otp-submit', [App\Http\Controllers\Auth\RegisterController::class, 'registerOtpSubmit'])->name('registerOtpSubmit');
Route::get('/resend-otp', [App\Http\Controllers\Auth\RegisterController::class, 'resendOtp'])->name('resendOtp');

Route::get('/password-forget', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'passwordForget'])->name('passwordForget');
Route::post('/password-forget-submit', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'passwordForgetSubmit'])->name('passwordForgetSubmit');
Route::get('/password-reset/{email}/{id}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'passwordReset'])->name('passwordReset');
Route::post('/password-reset-submit', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'passwordResetSubmit'])->name('passwordResetSubmit');

Route::get('/login/facebook', [SocialLoginController::class, 'facebook'])->name('login.facebook');
Route::get('/login/google', [SocialLoginController::class, 'google'])->name('login.google');

Route::get('/socialite/facebook/callback', [SocialLoginController::class, 'facebookCallback'])->name('login.facebook.callback');
Route::get('/socialite/google/callback', [SocialLoginController::class, 'googleCallback'])->name('login.google.callback');

Route::get('/text', function () {
    return view('text');
});

Route::get('test2', [HomeController::class, 'test'])->name('test2');
