<?php

use App\Http\Controllers\AdvanceOfPayController;
use App\Http\Controllers\AnnualtaxeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarexpenseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MonthlytaxeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SchoolExpenseController;
use App\Http\Controllers\SchoolexpenseController as ControllersSchoolexpenseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('cms.auth.login');
});


Route::prefix('cms/user')->middleware('guest:web')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('cms.login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('cms/')->middleware('auth:web')->group(function () {
    // Users
    Route::resource('users', UserController::class);
    // Students
    Route::get('students/{student}/lessons', [StudentController::class, 'viewLessons'])->name('students.view_lessons');
    Route::get('students/{student}/payments', [StudentController::class, 'viewPayments'])->name('students.view_payments');
    Route::resource('students', StudentController::class);
    // Lessons
    Route::resource('lessons', LessonController::class);
    // payments
    Route::resource('payments', PaymentController::class);
    // employee
    Route::get('employees/{employee}/AdvanceOfPays', [EmployeeController::class, 'viewAdvanceOfPays'])->name('employees.viewAdvanceOfPays');
    Route::resource('employees', EmployeeController::class);
    // advancePays
    Route::resource('AdvanceOfPays', AdvanceOfPayController::class);
    // cars
    Route::get('cars/{car}/carexpenses', [CarController::class, 'viewcarexpenses'])->name('cars.viewcarexpenses');
    Route::resource('cars', CarController::class);

    // carexpenses
    Route::resource('carexpenses', CarexpenseController::class);
    // SchoolExpense
    Route::resource('schoolexpenses', SchoolExpenseController::class);

    // Annualtaxes
    Route::get('annualtaxe/{annualtaxe}/monthlytaxes', [AnnualtaxeController::class, 'viewmonthlytaxes'])->name('annualtaxes.viewmonthlytaxes');
    Route::resource('annualtaxes', AnnualtaxeController::class);
    // monthlytaxe
    Route::resource('monthlytaxes', MonthlytaxeController::class);
    // trainer
    Route::resource('trainers', TrainerController::class);
    // Logout
    Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');
});
