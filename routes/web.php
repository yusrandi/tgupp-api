<?php

use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\MeetAttendanceController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\MeetResultController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/employment', [EmploymentController::class, 'index'])->name('employment');
    Route::get('/title', [TitleController::class, 'index'])->name('title');
    Route::resource('user', UserController::class)->except(['store', 'update', 'destroy', 'show']);
    Route::resource('meet', MeetController::class);
    Route::get('meet/delete/{meet}', [MeetController::class, 'destroy']);
    Route::get('meet/status/{id}', [MeetController::class, 'updateStatus']);
    Route::get('meet-result/{meet}', [MeetResultController::class, 'index'])->name('meet-result.index');
    Route::put('meet-result/{meetResult}', [MeetResultController::class, 'update'])->name('meet-result.update');
    Route::post('meet-result', [MeetResultController::class, 'store'])->name('meet-result.store');
    Route::get('meet-attendance/{meet}', [MeetAttendanceController::class, 'index'])->name('meet-attendance.index');
    Route::post('meet-attendance', [MeetAttendanceController::class, 'store'])->name('meet-attendance.store');
});
