<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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


Auth::routes();


// Route::get('/', Home::class)->name('web.home');
 
// Route::get('/contact', Contact::class)->name('web.contact');

Route::get('/', [App\Http\Controllers\WebController::class, 'home'])->name('web.home');
Route::get('/contact', [App\Http\Controllers\WebController::class, 'contact'])->name('web.contact');
Route::get('/about', [App\Http\Controllers\WebController::class, 'about'])->name('web.about');
Route::get('/portofolio', [App\Http\Controllers\WebController::class, 'portofolio'])->name('web.portofolio');

Route::get('/article', [App\Http\Controllers\WebController::class, 'article'])->name('web.article.index');
Route::get('/article/{slug?}', [App\Http\Controllers\WebController::class, 'detail_article'])->name('web.article.detail_article');
Route::get('/article/{username}', [App\Http\Controllers\WebController::class, 'detail_article'])->name('web.article.detail_article');
Route::get('/tags/{slug}', [App\Http\Controllers\WebController::class, 'tags'])->name('web.article.tags');

Route::prefix('/')->middleware(['auth'])->group(function () {

    Route::get('/delete-avatar-admin/{id}', [App\Http\Controllers\AccountController::class, 'delete_avatar'])->name('admin-account.delete');
    Route::get('/password', [App\Http\Controllers\AccountController::class, 'password'])->name('account.password');
    Route::post('/changepwd', [App\Http\Controllers\AccountController::class, 'changepwd'])->name('account.changepwd');

    //user
    Route::post('/add-role', [App\Http\Controllers\UsersController::class, 'add_role'])->name('add.role');
    Route::get('users/login-as/{id}', [App\Http\Controllers\UsersController::class, 'loginAs'])->name('user.login-as');
    Route::get('users/activity/{id}', [App\Http\Controllers\UsersController::class, 'activity'])->name('users.activity');
    Route::get('/users/data', [App\Http\Controllers\UsersController::class, 'data'])->name('users.data');
    Route::resource('/users', App\Http\Controllers\UsersController::class);
    Route::post('/changepwd/{users}', [App\Http\Controllers\UsersController::class, 'resetpwd'])->name('users.resetpwd');
    Route::get('/password/{id}', [App\Http\Controllers\UsersController::class, 'password'])->name('users.password');
    Route::get('/changepassword/{users}', [App\Http\Controllers\UsersController::class, 'change_password'])->name('users.changepassword');
    Route::post('/post-changepassword', [App\Http\Controllers\UsersController::class, 'post_change_password'])->name('users.post_changepassword');
   
    Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/general', [App\Http\Controllers\SettingController::class, 'general'])->name('settings.general');
    Route::post('/settings/mailconfig', [App\Http\Controllers\SettingController::class, 'mailconfig'])->name('settings.mailconfig');
    Route::post('/settings/reload', [App\Http\Controllers\SettingController::class, 'reload'])->name('settings.reload');
    Route::get('/config/data', [App\Http\Controllers\ConfigsController::class, 'data'])->name('config.data');
    Route::get('/profile', [App\Http\Controllers\UsersController::class, 'profile'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\UsersController::class, 'profile_create'])->name('profile.create');
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/blog/data', [App\Http\Controllers\BlogController::class, 'data'])->name('blog.data');

    
   
    Route::resource('/config', App\Http\Controllers\ConfigsController::class);
    Route::resource('/blog', App\Http\Controllers\BlogController::class);
    Route::resource('/account', App\Http\Controllers\AccountController::class);
   
    // Blogs
    Route::get('/category-blog/data', [App\Http\Controllers\CategoryBlogController::class, 'data'])->name('category-blog.data');
    Route::resource('/category-blog', App\Http\Controllers\CategoryBlogController::class);
   

    Route::resource('/permission', App\Http\Controllers\PermissionController::class);
    Route::get('/permission/data', [App\Http\Controllers\PermissionController::class, 'data'])->name('permission.data');
    Route::resource('/roles', App\Http\Controllers\RolesController::class);
    

    //verify email
    Route::get('/email/verify', [App\Http\Controllers\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::get('/email/resend', [App\Http\Controllers\VerificationController::class, 'resend'])->name('verification.resend');
});

