<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Customer;
use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.team_member.index');
    }
    public function dataTable()
    {
        $query = TeamMember::with('attachments');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(TeamMember $team_member) {
                return '<a href="'.route('team-members.edit',['team_member'=>$team_member->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$team_member->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';

            })
            ->addColumn('image', function(TeamMember $team_member) {
                return '<img height="100px" src="'.asset($team_member->attachments->first()->file ?? '').'">';

            })
            ->rawColumns(['action','image'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sortMax = TeamMember::max('sort') + 1;
        return view('backend.team_member.create',compact('sortMax'));
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
            $team_member = TeamMember::create($validatedData);
            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->name).'-'.$team_member->id));
            $team_member->update(['slug'=>$slug]);

            if ($request->file('attachments')) {
                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$team_member->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/team_member';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/team_member/' . $filename;

                $attachment = new Attachment([
                    'user_id' => auth()->id(),
                    'file' => $path,
                    'sort' => 1,
                ]);
                $team_member->attachments()->save($attachment);
            }
            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('team-members.index'),
                'message'=>'Team Member created successfully',
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
    public function edit(TeamMember $team_member)
    {
        try {
            // If the Product exists, display the edit view
            return view('backend.team_member.edit',compact('team_member'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('team-members.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamMember $team_member)
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

            $validatedData['slug'] = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->name).'-'.$team_member->id));
            // Update the Product record in the database
            unset($validatedData['attachments']);
            $team_member->update($validatedData);
            if ($request->file('attachments')) {
                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$team_member->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/team_member';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/team_member/' . $filename;

                $attachment = $team_member->attachments()->first();
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $team_member->attachments()->delete();
                $team_member->attachments()->create([
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
                'redirect_url'=>route('team-members.index'),
                'message'=>'Team member updated successfully',
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
    public function destroy(TeamMember $team_member)
    {
        try {
            foreach ($team_member->attachments as $attachment){
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $attachment->delete();
            }
            // Delete the Product record
            $team_member->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Team member deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
