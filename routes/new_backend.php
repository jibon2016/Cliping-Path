<?php

use App\Http\Controllers\BackendHomeController;
use App\Http\Controllers\BackendServiceController;
use App\Http\Controllers\ClientFeedbackController;
use App\Http\Controllers\HowItWorksController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceDetailsController;

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

Route::resource('home-backend/services', BackendServiceController::class)->except(['show']);
Route::get('home-backend/services-datatable', [BackendServiceController::class, 'dataTable'])->name('home-backend.services.datatable');

Route::resource('how-it-works', HowItWorksController::class)->except('show');
Route::get('how-it-works/datatabel', [HowItWorksController::class, 'dataTable'])->name('how-it-works.datatable');

Route::resource('home-backend/client-feedback', ClientFeedbackController::class)->except(['show']);
Route::get('home-backend/client-feedback-datatable', [ClientFeedbackController::class, 'dataTable'])->name('home-backend.client-feedback.datatable');

Route::get('service-details', [ServiceDetailsController::class, 'index'])->name('service-details.index');
Route::get('service-details/{service}/edit', [ServiceDetailsController::class, 'edit'])->name('service-details.edit');
Route::put('service-details/{service}', [ServiceDetailsController::class, 'update'])->name('service-details.update');
Route::get('service-details-datatable', [ServiceDetailsController::class, 'dataTable'])->name('service-details.datatable');

Route::resource('service', ServiceController::class)->except(['show']);
Route::get('backend/services-datatable', [ServiceController::class, 'dataTable'])->name('backend.services.datatable');
