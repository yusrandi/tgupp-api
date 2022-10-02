<?php

use App\Http\Controllers\api\MeetController;
use App\Http\Controllers\api\MeetAttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/schedule', [MeetController::class, 'schedule']);
Route::get('/history', [MeetController::class, 'history']);
Route::get('/attendance/{userid}', [MeetController::class, 'attendance']);
Route::get('/meet/{barcode}', [MeetController::class, 'meet']);
Route::post('/attendance', [MeetAttendanceController::class, 'store']);
