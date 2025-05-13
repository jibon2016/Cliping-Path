<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.gallery.index');
    }
    public function dataTable()
    {
        $query = Gallery::with('attachments');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(Gallery $gallery) {
                return '<a href="'.route('gallery.edit',['gallery'=>$gallery->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$gallery->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';

            })
            ->addColumn('image', function(Gallery $gallery) {
                return '<img height="100px" src="'.asset($gallery->attachments->first()->file ?? '').'">';

            })
            ->rawColumns(['action','image'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.gallery.create');
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
            'status' => 'required|boolean',
            'attachments' => 'required',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $validatedData['user_id'] = auth()->id();
            unset($validatedData['attachments']);

            // Create a new Product record in the database
            $gallery = Gallery::create($validatedData);
            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$gallery->id));
            $gallery->update([
                'slug'=>$slug
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$gallery->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/gallery';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/gallery/' . $filename;


                    $attachment = new Attachment([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);
                    $gallery->attachments()->save($attachment);


                    $counter++;
                }
            }


            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('gallery.index'),
                'message'=>'Gallery created successfully',
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
    public function edit(Gallery $gallery)
    {
        try {
            // If the Product exists, display the edit view
            return view('backend.gallery.edit', compact('gallery'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('gallery.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        // dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'title' =>[
                'required','max:255',
            ],
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {


            $gallery->update($validatedData);

            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$gallery->id));
            $gallery->update([
                'slug'=>$slug
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$gallery->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/gallery';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/gallery/' . $filename;


                    $gallery->attachments()->create([
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
                'redirect_url'=>route('gallery.index'),
                'message'=>'Gallery created successfully',
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
    public function destroy(Gallery $gallery)
    {

        try {
            // Delete the Product record
           foreach ($gallery->attachments as $attachment){
               if (file_exists(public_path($attachment->file))){
                   unlink(public_path($attachment->file));
               }
               $attachment->delete();
           }

            $gallery->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Gallery deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
