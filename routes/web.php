<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TestCaseController;
use App\Http\Controllers\GuestTestCaseController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [GuestTestCaseController::class, 'index'])->name('guest.testcases.index');
Route::post('/testcases-export-selected', [GuestTestCaseController::class, 'exportSelected'])->name('guest.testcases.exportSelected');

// AUTHENTICATION ROUTE
// Rute untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Rute lengkap CRUD TestCase
    Route::get('/admin/testcases', [TestCaseController::class, 'index'])->name('admin.testcases.index');
    Route::get('/admin/testcases/create', [TestCaseController::class, 'create'])->name('admin.testcases.create');
    Route::post('/admin/testcases', [TestCaseController::class, 'store'])->name('admin.testcases.store');
    Route::get('/admin/testcases/{testcase}/edit', [TestCaseController::class, 'edit'])->name('admin.testcases.edit');
    Route::put('/admin/testcases/{testcase}', [TestCaseController::class, 'update'])->name('admin.testcases.update');
    Route::delete('/admin/testcases/{testcase}', [TestCaseController::class, 'destroy'])->name('admin.testcases.destroy');
    Route::get('/admin/testcases-export', [TestCaseController::class, 'export'])->name('admin.testcases.export');
    Route::post('/admin/testcases-export-selected', [TestCaseController::class, 'exportSelected'])->name('admin.testcases.exportSelected');
});

// Rute untuk Guest View Only
Route::middleware(['auth', 'guestonly'])->group(function () {
    Route::get('/guest/testcases', [GuestTestCaseController::class, 'index'])->name('guest.testcases.index');
    Route::get('/guest/testcases-export', [GuestTestCaseController::class, 'export'])->name('guest.testcases.export');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');