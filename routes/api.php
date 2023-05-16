<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Auth;
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


// Route::get('company', [CompanyController::class, 'index']);
// Route::post('company', [CompanyController::class, 'store']);
// Route::get('company/{id}', [CompanyController::class, 'show']);
// // Route::get('company/{id}/edit', [CompanyController::class, 'edit']);
// Route::put('company/{id}/edit', [CompanyController::class, 'update']);
// Route::delete('company/{id}/delete', [CompanyController::class, 'destroy']);

//employee
// Route::get('employee', [EmployeeController::class, 'index'])->middleware('auth:sanctum');
// Route::post('employee', [EmployeeController::class, 'store']);
// Route::get('employee/{id}', [EmployeeController::class, 'show']);
// // Route::get('employee/{id}/edit', [EmployeeController::class, 'edit']);
// Route::put('employee/{id}/edit', [EmployeeController::class, 'update']);
// Route::delete('employee/{id}/delete', [EmployeeController::class, 'destroy']);

Route::post("register",[AuthController::class,'registerUser']);

Route::post("login",[AuthController::class,'loginUser']);

Route::apiResource('employee',EmployeeController::class)->middleware('auth:sanctum');

Route::apiResource('companie',CompanyController::class)->middleware('auth:sanctum');
