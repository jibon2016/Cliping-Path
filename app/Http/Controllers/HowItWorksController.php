<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\HowItWorks;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class HowItWorksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.home_page.how_it_works.index');
    }

    public function dataTable()
    {
        $query = HowItWorks::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(HowItWorks $howItWorks) {
                $btn ='<a href="'.route('how-it-works.edit',['how_it_work'=>$howItWorks->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                        <a role="button" data-id="'.$howItWorks->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->addColumn('image', function(HowItWorks $howItWorks) {
                return '<img height="100px" src="'.asset($howItWorks->attachments->file ?? '').'">';
            })
            ->rawColumns(['action','image'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.home_page.how_it_works.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => [
                'required', 'max:255',
            ],
            'details' => 'nullable',
            'status' => 'required|boolean',
            'attachments' => 'nullable',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            // Create a new Product record in the database
            $howItWorks = HowItWorks::create([
                'name' => $validatedData['name'],
                'details' => $validatedData['details'],
                'status' => $validatedData['status'],
            ]);

            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString() . $howItWorks->id . '-' . $key . '.' . $attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/how_it_works';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/how_it_works/' . $filename;


                    $attachment = new Attachment([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);
                    $howItWorks->attachments()->save($attachment);


                    $counter++;
                }
            }


            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status' => true,
                'redirect_url' => route('how-it-works.index'),
                'message' => 'Data Saved successfully',
            ]);
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollback();

            // Handle the error and redirect with an error message
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HowItWorks $howItWork)
    {
        try {
            return view('backend.home_page.how_it_works.edit', compact('howItWork',));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('how-it-works.index')->with('error',$e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HowItWorks $howItWork)
    {
        $validatedData = $request->validate([
            'name' => [
                'required', 'max:255',
            ],
            'details' => 'nullable',
            'status' => 'required|boolean',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $howItWork->update([
                'name' => $validatedData['name'],
                'details' => $validatedData['details'],
                'status' => $validatedData['status'],
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$howItWork->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/how_it_works';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/how_it_works/' . $filename;


                    $howItWork->attachments()->create([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);

                    $counter++;
                }
            }

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('how-it-works.index'),
                'message'=>'Data Updated successfully',
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
    public function destroy(HowItWorks $howItWork)
    {
        try {
            // Delete the Product record
            if ( $attachment = $howItWork->attachments){
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $attachment->delete();
            }

            $howItWork->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Data deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
