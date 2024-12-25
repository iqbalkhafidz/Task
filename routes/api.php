<?php

use App\Http\Controllers\api\authController;
use App\Livewire\Actions\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route Login
Route::post('login', [authController::class, "Login"]);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('ApiTask', ApiController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});


// Role RBAC
Route::group(['middleware' => ['role:admin']], function () {
    // Route untuk API task
    Route::apiResource('tasks', TaskController::class);
});

