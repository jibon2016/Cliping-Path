<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Customer;
use App\Models\ExecutiveCommittee;
use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class ExecutiveCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.executive_committee.index');
    }
    public function dataTable()
    {
        $query = ExecutiveCommittee::with('attachments');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(ExecutiveCommittee $executive_committee) {
                return '<a href="'.route('executive-committees.edit',['executive_committee'=>$executive_committee->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$executive_committee->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';

            })
            ->addColumn('image', function(ExecutiveCommittee $executive_committee) {
                return '<img height="100px" src="'.asset($executive_committee->attachments->first()->file ?? '').'">';

            })
            ->rawColumns(['action','image'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sortMax = ExecutiveCommittee::max('sort') + 1;
        return view('backend.executive_committee.create',compact('sortMax'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'name' =>[
                'required','max:255'
            ],
            'designation' => 'required|max:255',
            'education' => 'nullable|max:255',
            'sort' => 'required|integer',
            'attachments' => 'required',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new Product record in the database
            unset($validatedData['attachments']);
            $executive_committee = ExecutiveCommittee::create($validatedData);
            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->name).'-'.$executive_committee->id));
            $executive_committee->update(['slug'=>$slug]);

            if ($request->file('attachments')) {
                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$executive_committee->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/executive_committee';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/executive_committee/' . $filename;

                $attachment = new Attachment([
                    'user_id' => auth()->id(),
                    'file' => $path,
                    'sort' => 1,
                ]);
                $executive_committee->attachments()->save($attachment);
            }
            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('executive-committees.index'),
                'message'=>'Executive committee created successfully',
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
    public function edit(ExecutiveCommittee $executive_committee)
    {
        try {
            // If the Product exists, display the edit view
            return view('backend.executive_committee.edit',compact('executive_committee'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('executive-committees.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExecutiveCommittee $executive_committee)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' =>[
                'required','max:255'
            ],
            'designation' => 'required|max:255',
            'education' => 'nullable|max:255',
            'sort' => 'required|integer',
            'attachments' => 'nullable',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $validatedData['slug'] = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->name).'-'.$executive_committee->id));
            // Update the Product record in the database
            unset($validatedData['attachments']);
            $executive_committee->update($validatedData);
            if ($request->file('attachments')) {
                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$executive_committee->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/executive_committee';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/executive_committee/' . $filename;

                $attachment = $executive_committee->attachments()->first();
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $executive_committee->attachments()->delete();
                $executive_committee->attachments()->create([
                    'user_id' => auth()->id(),
                    'file' => $path,
                    'sort' => 1,
                ]);
            }

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('executive-committees.index'),
                'message'=>'Executive committee updated successfully',
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
    public function destroy(ExecutiveCommittee $executive_committee)
    {
        try {
            foreach ($executive_committee->attachments as $attachment){
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $attachment->delete();
            }
            // Delete the Product record
            $executive_committee->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Executive committee deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
