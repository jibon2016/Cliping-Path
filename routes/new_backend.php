<?php

use App\Http\Controllers\BackendHomeController;

Route::get('home-backend', [BackendHomeController::class, 'index'])->name('home-backend.index');
Route::get('home-backend-datatable', [BackendHomeController::class, 'dataTable'])->name('home-backend.datatable');
Route::get('home-backend-video/{home_content}', [BackendHomeController::class, 'edit'])->name('home-backend-video.edit');
Route::put('home-backend-video/{home_content}', [BackendHomeController::class, 'update'])->name('home-backend-video.update');
