<?php

use App\Http\Controllers\DatabaseBackupController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


Route::resource('database-backups',DatabaseBackupController::class);
Route::get('database-backups-datatable', [DatabaseBackupController::class, 'dataTable'])->name('database-backups.datatable');
Route::get('backup_file_download/{filename}', [DatabaseBackupController::class,'backupDownload'])->name('backup_file.download');


Route::get('database-backup',function (){
    Artisan::call('backup:run --only-db');
    return redirect()->route('backup')->with('message','Database Backup Successful');
})->name('db_backup')->middleware('auth');
