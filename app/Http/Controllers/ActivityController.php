<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.activity.index');
    }
    public function dataTable()
    {
        $query = Activity::with('attachments','activityCategory');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(Activity $activity) {
                return '<a href="'.route('activity.edit',['activity'=>$activity->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$activity->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';

            })
            ->addColumn('activity_category_name', function(Activity $activity) {
                return $activity->activityCategory->name ?? '';

            })
            ->addColumn('image', function(Activity $activity) {
                return '<img height="100px" src="'.asset($activity->attachments->first()->file ?? '').'">';

            })
            ->rawColumns(['action','image'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ActivityCategory::orderBy('sort')->get();
        return view('backend.activity.create',compact('categories'));
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
            'short_description' => 'required|max:500',
            'category' => 'required',
            'description' => 'nullable',
            'status' => 'required|boolean',
            'attachments' => 'nullable',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $validatedData['user_id'] = auth()->id();
            $validatedData['activity_category_id'] = $request->category;
            unset($validatedData['category']);
            unset($validatedData['attachments']);

            $content = handleImagesInContent($request->description,'uploads/activity/content');
            $validatedData['description'] = $content;

            // Create a new Product record in the database
            $activity = Activity::create($validatedData);
            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$activity->id));
            $activity->update([
                'slug'=>$slug
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$activity->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/activity';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/activity/' . $filename;


                    $attachment = new Attachment([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);
                    $activity->attachments()->save($attachment);


                    $counter++;
                }
            }


            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('activity.index'),
                'message'=>'Activity created successfully',
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
    public function edit(Activity $activity)
    {
        try {
            $categories = ActivityCategory::orderBy('sort')->get();
            // If the Product exists, display the edit view
            return view('backend.activity.edit', compact('activity','categories'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('activity.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        // dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'title' =>[
                'required','max:255',
            ],
            'short_description' => 'required|max:500',
            'category' => 'required',
            'description' => 'nullable',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {


            $content = handleImagesInContent($request->description,'uploads/activity/content');
            $validatedData['description'] = $content;
            $validatedData['activity_category_id'] = $request->category;
            unset($validatedData['category']);
            $activity->update($validatedData);

            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$activity->id));
            $activity->update([
                'slug'=>$slug
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$activity->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/activity';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/activity/' . $filename;


                    $activity->attachments()->create([
                        'user_id' => auth()->id(),
                        'file' => $request->attachment_sort[$counter],
                        'sort' => 1,
                    ]);

                    $counter++;
                }
            }

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('activity.index'),
                'message'=>'Activity created successfully',
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
    public function destroy(Activity $activity)
    {
        try {
            // Delete the Product record
           foreach ($activity->attachments as $attachment){
               if (file_exists(public_path($attachment->file))){
                   unlink(public_path($attachment->file));
               }
               $attachment->delete();
           }

            $activity->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Activity deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
