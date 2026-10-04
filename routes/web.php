<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\MembershipStatusController;

Route::get('/', function () {
    return redirect()->route('members.index');
});

Route::get('/members', [MemberController::class, 'index'])
    ->name('members.index');

Route::get('/members/create', [MemberController::class, 'create'])
    ->name('members.create');

Route::post('/members', [MemberController::class, 'store'])
    ->name('members.store');

Route::get('/', function () {
    return view('home');
});

Route::get('/admin-login', function () {
    return view('auth.login');
})->name('admin.login');

use App\Http\Controllers\AuthController;

Route::post('/admin-login', [AuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/members/{id}/edit', [MemberController::class, 'edit'])
    ->name('members.edit');

Route::put('/members/{id}', [MemberController::class, 'update'])
    ->name('members.update');

Route::delete('/members/{id}', [MemberController::class, 'destroy'])
    ->name('members.destroy');

Route::get('/plans', [PlanController::class, 'index'])
    ->name('plans.index');

Route::get('/plans/create', [PlanController::class, 'create'])
    ->name('plans.create');

Route::post('/plans', [PlanController::class, 'store'])
    ->name('plans.store');

Route::get('/plans/{id}/edit', [PlanController::class, 'edit'])
    ->name('plans.edit');

Route::put('/plans/{id}', [PlanController::class, 'update'])
    ->name('plans.update');

Route::delete('/plans/{id}', [PlanController::class, 'destroy'])
    ->name('plans.destroy');

Route::get('/membership-status', [MembershipStatusController::class, 'index'])
    ->name('membership.status');