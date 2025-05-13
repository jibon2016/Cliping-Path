<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.slider.index');
    }
    public function dataTable()
    {
        $query = Slider::with('attachments');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(Slider $slider) {
                return '<a href="'.route('slider.edit',['slider'=>$slider->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$slider->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';

            })
            ->addColumn('image', function(Slider $slider) {
                return '<img height="150px" src="'.asset($slider->attachments->first()->file ?? '').'">';

            })
            ->rawColumns(['action','image'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sortMax = Slider::max('sort') + 1;
        return view('backend.slider.create',compact('sortMax'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'title' =>'nullable|max:255',
            'sub_title' =>'nullable|max:255',
            'link' =>'nullable|max:255',
            'sort' => 'required|integer',
            'attachments' => 'required',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            // Create a new Slider record in the database
            unset($validatedData['attachments']);
            $slider = Slider::create($validatedData);
            if ($request->file('attachments')) {
                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$slider->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/slider';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/slider/' . $filename;

                $attachment = new Attachment([
                    'user_id' => auth()->id(),
                    'file' => $path,
                    'sort' => 1,
                ]);
                $slider->attachments()->save($attachment);
            }

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('slider.index'),
                'message'=>'Slider created successfully',
            ]);
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollback();

            // Handle the error and redirect with an error message
            return response()->json([
                'status'=>false,
                'message'=>'An error occurred while creating the : Slider'.$e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        try {
            // If the Slider exists, display the edit view
            return view('backend.slider.edit',compact('slider'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Slider is not found
            return redirect()->route('slider.index')->with('error', 'Slider not found: '.$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'title' =>'nullable|max:255',
            'sub_title' =>'nullable|max:255',
            'link' =>'nullable|max:255',
            'sort' => 'required|integer',
            'attachments' => 'nullable',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            // Update the Slider record in the database
            unset($validatedData['attachments']);
            $slider->update($validatedData);
            if ($request->file('attachments')) {

                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$slider->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/slider';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/slider/' . $filename;


                $attachment = $slider->attachments()->first();
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $slider->attachments()->delete();
                $slider->attachments()->create([
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
                'redirect_url'=>route('slider.index'),
                'message'=>'Updated created successfully',
            ]);
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollback();

            // Handle the error and redirect with an error message
            return response()->json([
                'status'=>false,
                'message'=>'An error occurred while creating the : Slider'.$e->getMessage(),
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        try {

            foreach ($slider->attachments as $attachment){
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $attachment->delete();
            }
            // Delete the Slider record
            $slider->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Slider deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' => 'Slider not found: '.$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
