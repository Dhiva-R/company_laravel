<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
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

Route::get('/', function () {


    return view('welcome');
});



Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
     Route::resource('/company', CompaniesController::class);
     Route::resource('/employees', EmployeesController::class);
     Route::get('/', [EmployeesController::class, 'index'])->name('employees.index');
     Route::get('/', [CompaniesController::class, 'index'])->name('companies.index');


    //  Route::resource('/employees', [EmployeesController::class,'getCompanyName']);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/testroute', [MailController::class,'sendMail']);

Route::get('employees/export', [EmployeesController::class, 'export'])->name('employees.export');
