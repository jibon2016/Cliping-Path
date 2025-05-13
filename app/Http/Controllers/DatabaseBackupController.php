<?php

namespace App\Http\Controllers;

use App\Models\DatabaseBackup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use ZipArchive;

class DatabaseBackupController extends Controller
{
    public function index()
    {
        return view('database_backup.index');
    }
    public function dataTable()
    {
        $query = DatabaseBackup::with('user');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(DatabaseBackup $databaseBackup) {

                $btn = ' <a role="button" data-id="' . $databaseBackup->id . '" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
                return $btn;

            })
            ->addColumn('user_name', function(DatabaseBackup $databaseBackup) {
                return $databaseBackup->user->name ?? '';
            })
            ->addColumn('database_path', function (DatabaseBackup $databaseBackup) {
                $filePath = 'laravel-backup/'. $databaseBackup->database_path;
                if (Storage::exists($filePath)) {
                    $url = route('backup_file.download', ['filename' => $databaseBackup->database_path]);
                    return '<a href="' . $url . '" class="btn btn-success bg-gradient-success btn-xs"><i class="fa fa-download"></i></a>';
                } else {
                    return '<span class="badge badge-danger">File missing</span>';
                }
            })

            ->editColumn('created_at', function(DatabaseBackup $databaseBackup) {
                return Carbon::parse($databaseBackup->created_at)->format('d-m-Y, h:i:s a');
            })
            ->rawColumns(['action','database_path'])
            ->toJson();
    }
    public function backupDownload($filename)
    {
        $filePath = storage_path('laravel-backup/private/' . $filename);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        abort(404, 'File not found');
    }
    public function create()
    {
        //Artisan::call('db:backup');
        Artisan::call('backup:run --only-db');
        //Artisan::call('backup:run');
        $path = storage_path('app/private/laravel-backup');
        $files = File::allFiles($path);
        foreach ($files as $file){
            $dbPath = $file->getFilename();
            $checkExist = DatabaseBackup::where('database_path',$dbPath)->first();
            if (!$checkExist) {
                DatabaseBackup::create([
                    'database_path' =>$dbPath,
                    'create_user_id' => auth()->id(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::parse($file->getCTime()),
                ]);
            }
        }

        return redirect()->route('database-backups.index')->with('message','Database Backup Successful');
    }

    public function destroy(DatabaseBackup $database_backup)
    {
        try {

            $filePath = 'app/private/laravel-backup/'. $database_backup->database_path;
            if(File::exists(storage_path($filePath))){
                File::delete(storage_path($filePath));
            }else{

                return response()->json(['success' => false, 'message' => 'Opps... Something Wrong']);
            }

            $database_backup->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Database backup deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_OK);
        }
    }

}
