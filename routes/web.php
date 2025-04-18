<?php

use App\Http\Controllers\CohortController;
use App\Http\Controllers\CommonLifeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

// Redirect the root path to /dashboard
Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Verified routes
    Route::middleware('verified')->group(function () {

        // Cohorts
        Route::get('/cohorts', [CohortController::class, 'index'])->name('cohort.index');
        Route::get('/cohorts/{cohort}', [CohortController::class, 'show'])->name('cohort.show');

        // Teachers
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');

        // Students
        Route::get('/students', [StudentController::class, 'index'])->name('student.index');

        // Knowledge
        Route::get('/knowledge', [KnowledgeController::class, 'index'])->name('knowledge.index');

        // Groups
        Route::get('/groups', [GroupController::class, 'index'])->name('group.index');

        // Retros
        Route::get('/retros', [RetroController::class, 'index'])->name('retro.index');

        // Common Life
        Route::get('/common-life', [CommonLifeController::class, 'index'])->name('commonLife.index');

        // Dashboard (optionally prefixed under "admin")
        Route::get('/dashboard', [DashboardController::class, 'overview'])->name('admin.dashboard');
    });
});

require __DIR__.'/auth.php';
