<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamInsightsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;

Route::get('/', fn () => redirect('/dashboard'));

Route::get('/dashboard',      [DashboardController::class, 'index'])->name('dashboard');
Route::get('/insights',       [TeamInsightsController::class, 'index'])->name('insights');
Route::get('/team',           [TeamController::class, 'index'])->name('team.index');
Route::get('/clients',        [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/services',       [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show'); 
Route::get('/catalog',        [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/payments',       [PaymentController::class, 'index'])->name('payments.index');
Route::get('/documents',      [DocumentController::class, 'index'])->name('documents.index');
Route::get('/notifications',  [NotificationController::class, 'index'])->name('notifications.index');
