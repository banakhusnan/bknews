<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Http\Request;

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
Route::get('/', [PostNewsController::class, 'index'])->name('home');
Route::get('/about', [PostNewsController::class, 'about']);
Route::get('/read/{slug:slug}', [PostNewsController::class, 'detailNews']);
Route::get('/news/{slugCategory:slug}', [CategoryController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function(){
    Route::middleware('is_admin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');

        Route::resource('/dashboard/users', UserController::class);
        Route::resource('/dashboard/news', NewsController::class);
    });
    Route::get('/pengaduan', [PengaduanController::class, 'index']);
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        
        return back()->with('resend', 'Verifikasi telah dikirim ke email kamu!');
    })->middleware('throttle:6,1')->name('verification.resend');
});


