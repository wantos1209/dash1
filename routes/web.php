<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PemberitahuanController;
use App\Http\Controllers\BoController;
use App\Http\Controllers\BeritaController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('changepassword', function () {
//     return 'test';
// });


// AUTHENTIKASI

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
});

//CHANGE_PASSWORD
Route::get('changepassword', [App\Http\Controllers\AuthController::class, 'change_password'])->middleware('auth')->name('changepassword');
Route::post('update-changepassword', [App\Http\Controllers\AuthController::class, 'update_change_password'])->middleware('auth')->name('changepassword.update');


// Route::get('registration', [AuthController::class, 'registration'])->name('register');
// Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');;

//DASHBOARD
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth');


// NOTIF
Route::get('notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi')->middleware('auth');
Route::post('update-notifikasi', [NotifikasiController::class, 'update'])->name('notifikasi.update')->middleware('auth');

// CONTACT
Route::get('contact', [ContactController::class, 'index'])->name('contact')->middleware('auth');
Route::post('update-contact', [ContactController::class, 'update'])->name('contact.update')->middleware('auth');

// LINK
Route::get('link', [LinkController::class, 'index'])->name('link')->middleware('auth');
Route::get('form-link/{id}', [LinkController::class, 'form'])->name('link.form')->middleware('auth');
Route::post('create-link', [LinkController::class, 'create'])->name('link.create')->middleware('auth');
Route::get('delete-link/{id}',[LinkController::class, 'delete'])->name('link.delete')->middleware('auth');
// Route::post('update-link/{id}',[LinkController::class, 'update'])->name('link.update');

// SETTINGS
Route::get('setting', [SettingController::class, 'index'])->name('setting')->middleware('auth');
Route::post('update-setting', [SettingController::class, 'update'])->name('setting.update')->middleware('auth');

// PEMBERITAHUAN
Route::get('pemberitahuan', [PemberitahuanController::class, 'index'])->name('pemberitahuan')->middleware('is_admin');
Route::get('form-pemberitahuan/{id}', [PemberitahuanController::class, 'form'])->name('pemberitahuan.form')->middleware('is_admin');
Route::post('create-pemberitahuan', [PemberitahuanController::class, 'create'])->name('pemberitahuan.create')->middleware('is_admin');
Route::get('delete-pemberitahuan/{id}',[PemberitahuanController::class, 'delete'])->name('pemberitahuan.delete')->middleware('is_admin');
// Route::post('update-pemberitahuan/{id}',[PemberitahuanControlle::class, 'update'])->name('pemberitahuan.update');

//BERITA
Route::get('berita', [BeritaController::class, 'index'])->name('berita')->middleware('auth');
Route::post('update-berita', [BeritaController::class, 'update'])->name('berita.update')->middleware('auth');

// BO
Route::get('bo', [BoController::class, 'index'])->name('bo')->middleware('is_admin');
Route::get('form-bo/{id}', [BoController::class, 'form'])->name('bo.form')->middleware('is_admin');
Route::post('create-bo', [BoController::class, 'create'])->name('bo.create')->middleware('is_admin');
Route::get('delete-bo/{id}',[BoController::class, 'delete'])->name('bo.delete')->middleware('is_admin');
// Route::post('update-bo/{id}',[BoController::class, 'update'])->name('bo.update');

// USER
Route::get('user', [UserController::class, 'index'])->name('user')->middleware('is_admin');
Route::get('form-user/{id}', [UserController::class, 'form'])->name('user.form')->middleware('is_admin');
Route::post('create-user', [UserController::class, 'create'])->name('user.create')->middleware('is_admin');
Route::get('delete-user/{id}',[UserController::class, 'delete'])->name('user.delete')->middleware('is_admin');
// Route::post('update-user/{id}',[UserController::class, 'update'])->name('user.update');




















