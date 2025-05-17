<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\ClientFeedback;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class ClientFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.home_page.client_feedback.index');
    }

    public function dataTable()
    {
        $query = ClientFeedback::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(ClientFeedback $clientFeedback) {
                $btn ='<a href="'.route('client-feedback.edit',['client_feedback'=>$clientFeedback->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                        <a role="button" data-id="'.$clientFeedback->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->addColumn('image', function(ClientFeedback $clientFeedback) {
                return '<img height="100px" src="'.asset($clientFeedback->attachments->file ?? '').'">';

            })
            ->rawColumns(['action','image'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.home_page.client_feedback.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'client_name' => [
                'required', 'max:255',
            ],
            'subject' => [
                'required', 'max:255',
            ],
            'location' => [
                'required', 'max:255',
            ],
            'feedback' => 'nullable',
            'date' => 'nullable',
            'status' => 'required|boolean',
            'attachments' => 'nullable',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            // Create a new Product record in the database
            $clientFeedback = ClientFeedback::create([
                'client_name' => $validatedData['client_name'],
                'subject' => $validatedData['subject'],
                'location' => $validatedData['location'],
                'feedback' => $validatedData['feedback'],
                'date' => $validatedData['date'],
                'status' => $validatedData['status'],
            ]);

            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString() . $clientFeedback->id . '-' . $key . '.' . $attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/client_feedback';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/client_feedback/' . $filename;


                    $attachment = new Attachment([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);
                    $clientFeedback->attachments()->save($attachment);


                    $counter++;
                }
            }


            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status' => true,
                'redirect_url' => route('client-feedback.index'),
                'message' => 'Client Feedback created successfully',
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
    public function edit(ClientFeedback $clientFeedback)
    {
        try {
            return view('backend.home_page.client_feedback.edit', compact('clientFeedback',));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('client-feedback.index')->with('error',$e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientFeedback $clientFeedback)
    {
        $validatedData = $request->validate([
            'client_name' => [
                'required', 'max:255',
            ],
            'subject' => [
                'required', 'max:255',
            ],
            'location' => [
                'required', 'max:255',
            ],
            'feedback' => 'nullable',
            'date' => 'nullable',
            'status' => 'required|boolean',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $clientFeedback->update([
                'client_name' => $validatedData['client_name'],
                'subject' => $validatedData['subject'],
                'location' => $validatedData['location'],
                'feedback' => $validatedData['feedback'],
                'date' => $validatedData['date'],
                'status' => $validatedData['status'],
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$clientFeedback->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/client_feedback';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/client_feedback/' . $filename;


                    $clientFeedback->attachments()->create([
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
                'redirect_url'=>route('client-feedback.index'),
                'message'=>'Client Feedback Updated successfully',
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
    public function destroy(ClientFeedback $clientFeedback)
    {
        try {
            // Delete the Product record
            if ( $attachment = $clientFeedback->attachments){
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $attachment->delete();
            }

            $clientFeedback->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Client Feedback deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }

}
