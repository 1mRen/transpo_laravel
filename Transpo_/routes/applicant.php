<?php

use App\Http\Controllers\Applicant\ApplicantController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/applicants', [ApplicantController::class, 'index'])->name('applicants.index');
    Route::get('/applicants/create', [ApplicantController::class, 'create'])->name('applicants.create');
    Route::post('/applicants', [ApplicantController::class, 'store'])->name('applicants.store');
    Route::get('/applicants/{applicant}', [ApplicantController::class, 'show'])->name('applicants.show');
    Route::get('/applicants/{applicant}/edit', [ApplicantController::class, 'edit'])->name('applicants.edit');
    Route::put('/applicants/{applicant}', [ApplicantController::class, 'update'])->name('applicants.update');
    Route::delete('/applicants/{applicant}', [ApplicantController::class, 'destroy'])->name('applicants.destroy');
});
