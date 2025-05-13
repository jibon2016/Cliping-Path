<?php

namespace App\Http\Controllers;

use App\Models\ActivityCategory;
use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class ActivityCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.activity.category.index');
    }
    public function dataTable()
    {
        $query = ActivityCategory::with('attachments');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(ActivityCategory $activity_category) {
                return '<a href="'.route('activity-category.edit',['activity_category'=>$activity_category->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$activity_category->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
            })
            ->addColumn('image', function(ActivityCategory $activity_category) {
                return '<img height="100px" src="'.asset($activity_category->attachments->first()->file ?? '').'">';

            })
            ->rawColumns(['action','image'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sortMax = ActivityCategory::max('sort') + 1;
        return view('backend.activity.category.create',compact('sortMax'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'name' =>[
                'required','max:255',
                Rule::unique('activity_categories')
            ],
            'sort' => 'required|integer',
            'attachments' => 'nullable',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new Product record in the database
            unset($validatedData['attachments']);
            $category = ActivityCategory::create($validatedData);
            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->name).'-'.$category->id));
            $category->update(['slug'=>$slug]);
            if ($request->file('attachments')) {
                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$category->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/activity_category';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/activity_category/' . $filename;

                $attachment = new Attachment([
                    'user_id' => auth()->id(),
                    'file' => $path,
                    'sort' => 1,
                ]);
                $category->attachments()->save($attachment);
            }



            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('activity-category.index'),
                'message'=>'Activity category created successfully',
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
    public function edit(ActivityCategory $activity_category)
    {
        try {
            // If the Product exists, display the edit view
            return view('backend.activity.category.edit',compact('activity_category'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('activity-category.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityCategory $activity_category)
    {
        // dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'name' =>[
                'required','max:255',
                Rule::unique('activity_categories')
                    ->ignore($activity_category)
            ],
            'sort' => 'required|integer',
            'attachments' => 'nullable',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $validatedData['slug'] = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->name).'-'.$activity_category->id));
            // Update the Product record in the database
            unset($validatedData['attachments']);
            $activity_category->update($validatedData);
            if ($request->file('attachments')) {
                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$activity_category->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/activity_category';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/activity_category/' . $filename;

                $attachment = $activity_category->attachments()->first();

                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $activity_category->attachments()->delete();
                $activity_category->attachments()->create([
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
                'redirect_url'=>route('activity-category.index'),
                'message'=>'Activity category created successfully',
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
    public function destroy(ActivityCategory $activity_category)
    {
        try {
//            $product = Product::where('category_id',$category->id)->first();
//            if ($product) {
//                // If a related Supplier exists, return an error message
//                return response()->json(['success' => false, 'message' => 'It has product logs. Cannot delete.'], Response::HTTP_OK);
//            }
            foreach ($activity_category->attachments as $attachment){
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $attachment->delete();
            }
            // Delete the Product record
            $activity_category->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Activity aategory deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
