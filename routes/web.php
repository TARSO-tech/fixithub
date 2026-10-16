<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepairRequestController;
use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('repair-requests', RepairRequestController::class)->only(['index', 'create', 'store']);
    Route::get('/technicians', [TechnicianController::class, 'index'])->name('technicians.index');
    Route::get('/technicians/{id}', [TechnicianController::class, 'show'])->name('technicians.show');
    Route::resource('appointments', AppointmentController::class)->only(['index', 'create', 'store']);
    Route::resource('conversations', ConversationController::class)->only(['index', 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
