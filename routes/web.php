

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaseEvaluationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;

// الصفحة الرئيسية - ترحيبية
Route::get('/', function () {
    return view('welcome');
});
// إضافة مستخدم جديد (للادمن فقط)
Route::middleware(['auth', 'admin'])->post('/users/store', [UserController::class, 'store'])->name('users.store');



// تسجيل الدخول والتسجيل
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// جميع المسارات المحمية تحتاج تسجيل دخول
Route::middleware(['auth'])->group(function () {
    // لوحة التحكم
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('admin/change-password', [\App\Http\Controllers\AdminController::class, 'showChangePasswordForm'])->name('admin.change-password');
    Route::post('admin/change-password', [\App\Http\Controllers\AdminController::class, 'changePassword']);
    Route::get('admin/user-activity', [\App\Http\Controllers\AdminController::class, 'userActivity'])->name('admin.user-activity');
    Route::get('attendance/print', [\App\Http\Controllers\AttendanceController::class, 'print'])->name('attendance.print');
    Route::post('attendance/store', [\App\Http\Controllers\AttendanceController::class, 'store'])->name('attendance.store');

    // الأطفال - Children
    Route::resource('children', ChildController::class);
    // إدارة تقييم الحالة المرتبط بالطفل
    Route::resource('case-evaluations', CaseEvaluationController::class);
    Route::get('/case-evaluations/create', [CaseEvaluationController::class, 'create'])->name('case-evaluations.create');
    Route::post('/case-evaluations/store', [CaseEvaluationController::class, 'store'])->name('case-evaluations.store');
    Route::get('/case-evaluations/show/{id}', [CaseEvaluationController::class, 'show'])->name('case-evaluations.show');
    
    // التقارير - Reports
    Route::prefix('reports')->group(function () {
        Route::get('create', [\App\Http\Controllers\ReportController::class, 'create'])->name('reports.create');
        Route::post('store', [ReportController::class, 'store'])->name('reports.store');
        Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
        Route::get('index', [ReportController::class, 'index'])->name('reports.index');
        // Add this line for daily reports resource routes
        Route::resource('daily-reports', \App\Http\Controllers\DailyReportController::class);
    });
});
// مسارات الحسابات - Accounts
// Accounts routes WITHOUT the 'accountant' middleware
Route::middleware(['auth'])->prefix('accounts')->name('accounts.')->group(function () {
    Route::get('/', [\App\Http\Controllers\AccountsController::class, 'dashboard'])->name('dashboard');
    Route::get('/revenues', [\App\Http\Controllers\AccountsController::class, 'revenues'])->name('revenues');
    Route::post('/revenues', [\App\Http\Controllers\AccountsController::class, 'storeRevenue'])->name('revenues.store');
    Route::delete('/revenues/{id}', [\App\Http\Controllers\AccountsController::class, 'destroyRevenue'])->name('revenues.destroy');
    Route::get('/revenues-trash', [\App\Http\Controllers\AccountsController::class, 'trashedRevenues'])->name('revenues.trash');
    Route::get('/expenses', [\App\Http\Controllers\AccountsController::class, 'expenses'])->name('expenses');
    Route::post('/expenses', [\App\Http\Controllers\AccountsController::class, 'storeExpense'])->name('expenses.store');
    Route::get('/categories', [\App\Http\Controllers\AccountsController::class, 'categories'])->name('categories');
    Route::post('/categories', [\App\Http\Controllers\AccountsController::class, 'storeCategory'])->name('categories.store');
    Route::delete('/categories/{id}', [\App\Http\Controllers\AccountsController::class, 'destroyCategory'])->name('categories.destroy');
    Route::get('/accounts', [\App\Http\Controllers\AccountsController::class, 'accounts'])->name('accounts');
    Route::post('/accounts', [\App\Http\Controllers\AccountsController::class, 'storeAccount'])->name('accounts.store');

    // New feature routes
    Route::get('/reports', [\App\Http\Controllers\AccountsController::class, 'reports'])->name('reports');
    Route::get('/closing', [\App\Http\Controllers\AccountsController::class, 'closing'])->name('closing');
    Route::get('/filters', [\App\Http\Controllers\AccountsController::class, 'filters'])->name('filters');
    Route::get('/budget', [\App\Http\Controllers\AccountsController::class, 'budget'])->name('budget');
    Route::get('/debts', [\App\Http\Controllers\AccountsController::class, 'debts'])->name('debts');
    Route::get('/settings', [\App\Http\Controllers\AccountsController::class, 'settings'])->name('settings');
    Route::post('/close-period', [AccountsController::class, 'closePeriod'])->name('closePeriod');
});

// Define the route for updating settings
Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
// مسارات الخطابات الرسمية
Route::middleware(['auth'])->prefix('letters')->name('letters.')->group(function () {
    Route::get('/', [\App\Http\Controllers\LetterController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\LetterController::class, 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\LetterController::class, 'store'])->name('store');
    Route::get('/{id}', [\App\Http\Controllers\LetterController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [\App\Http\Controllers\LetterController::class, 'edit'])->name('edit');
    Route::put('/{id}', [\App\Http\Controllers\LetterController::class, 'update'])->name('update');
    Route::delete('/{id}', [\App\Http\Controllers\LetterController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/print', [\App\Http\Controllers\LetterController::class, 'print'])->name('print');
});


