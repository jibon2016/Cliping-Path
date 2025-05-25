<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.services.index');
    }

    public function dataTable()
    {
        $query = Service::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(Service $service) {
                $btn ='<a href="'.route('service.edit',['service'=>$service->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                        <a role="button" data-id="'.$service->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->addColumn('icon', function(Service $service) {
                return '<img height="100px" src="'.asset($service->icon ?? '').'">';

            })
            ->rawColumns(['action','icon'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' =>[
                'required','max:255',
            ],
            'description' => 'nullable',
            'status' => 'required|boolean',
            'attachments' => 'nullable',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            // Create a new Product record in the database
            $service = Service::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'status' => $validatedData['status'],
            ]);

            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$service->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/services/icon';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/services/icon/' . $filename;


//                    $attachment = new Attachment([
//                        'user_id' => auth()->id(),
//                        'file' => $path,
//                        'sort' => $request->attachment_sort[$counter],
//                    ]);
//                    $service->attachments()->save($attachment);

                    $service->update([
                        'icon' => $path,
                    ]);

                    $counter++;
                }
            }


            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('service.index'),
                'message'=>'Service created successfully',
            ]);
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollback();

            // Handle the error and redirect with an error message
            return response()->json([
                'status'=>false,
                'message'=>$e->getMessage(),
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        try {
            return view('backend.services.edit', compact('service',));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('service.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'title' =>[
                'required','max:255',
            ],
            'description' => 'nullable',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $service->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'status' => $validatedData['status'],
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$service->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/services';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/services/' . $filename;

//
//                    $service->attachments()->create([
//                        'user_id' => auth()->id(),
//                        'file' => $path,
//                        'sort' => $request->attachment_sort[$counter],
//                    ]);


                    $service->update([
                        'icon' => $path,
                    ]);

                    $counter++;
                }
            }

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('service.index'),
                'message'=>'Service Updated successfully',
            ]);
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollback();

            // Handle the error and redirect with an error message
            return response()->json([
                'status'=>false,
                'message'=>$e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
