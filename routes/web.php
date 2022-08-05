<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/about', [NewsController::class, 'about']);
Route::get('/read/{slug:slug}', [NewsController::class, 'detailNews']);
Route::get('/news/{slugCategory:slug}', [CategoryController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function(){
    Route::middleware('is_admin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/users', [DashboardController::class, 'users'])->name('dashboard.users');
        Route::get('/news', [DashboardController::class, 'news'])->name('dashboard.news');
    });
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        
        return back()->with('resend', 'Verifikasi telah dikirim ke email kamu!');
    })->middleware('throttle:6,1')->name('verification.resend');
});


