<?php

use Mis3085\ForgotPassword\Http\Controllers\ForgotPasswordController;
use Mis3085\ForgotPassword\Http\Controllers\NewPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->name('admin.password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('admin.password.email');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])->name('admin.password.update');
