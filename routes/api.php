<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::get('/expenses', [ExpenseController::class, 'index']);
Route::post('/expenses', [ExpenseController::class, 'store']);
Route::get('/expenses/filter', [ExpenseController::class, 'filter']);
Route::get('/expenses/export', [ExpenseController::class, 'export_csv']);
Route::patch('/expenses/limitset', [ExpenseController::class, 'limit_set']);
Route::get('/expenses/{id}', [ExpenseController::class, 'show']);
Route::patch('/expenses/{id}', [ExpenseController::class, 'update']);
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy']);
