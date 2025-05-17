<?php

use App\Http\Controllers\BackendHomeController;
use App\Http\Controllers\BackendServiceController;

Route::get('home-backend', [BackendHomeController::class, 'index'])->name('home-backend.index');
Route::get('home-backend-datatable', [BackendHomeController::class, 'dataTable'])->name('home-backend.datatable');
Route::get('home-backend-video/{home_content}', [BackendHomeController::class, 'edit'])->name('home-backend-video.edit');
Route::put('home-backend-video/{home_content}', [BackendHomeController::class, 'update'])->name('home-backend-video.update');

Route::get('home-backend-wcu', [BackendHomeController::class, 'wcu'])->name('home-backend.wcu');
Route::get('home-backend-wcu-datatable', [BackendHomeController::class, 'wcuDataTable'])->name('home-backend.wcu.datatable');
Route::get('home-backend-wcu-create', [BackendHomeController::class, 'wcuCreate'])->name('home-backend.wcu.create');
Route::post('home-backend-wcu-store', [BackendHomeController::class, 'wcuStore'])->name('home-backend.wcu.store');
Route::get('home-backend-wcu-edit/{wcu}', [BackendHomeController::class, 'wcuEdit'])->name('home-backend.wcu.edit');
Route::put('home-backend-wcu-update/{wcu}', [BackendHomeController::class, 'wcuUpdate'])->name('home-backend.wcu.update');
Route::delete('home-backend-wcu-delete/{wcu}', [BackendHomeController::class, 'wcuDestroy'])->name('home-backend.wcu.delete');

Route::resource('home-backend/services', BackendServiceController::class);
Route::get('/home-backend/services-datatable', [BackendServiceController::class, 'dataTable'])->name('home-backend.services.datatable');
