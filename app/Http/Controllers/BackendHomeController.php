<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class BackendHomeController extends Controller
{
    public function index()
    {
        return view('backend.home_page.index');
    }
    public function dataTable()
    {
        $query = HomeContent::where('title','Video')->
        with('attachments');

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(HomeContent $home_content) {
                $btn ='<a href="'.route('home-backend-video.edit',['home_content'=>$home_content->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                        <a role="button" data-id="'.$home_content->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->addColumn('video', function (HomeContent $homeContent) {
                $videoFile = $homeContent->attachments->first()->file ?? null;

                if ($videoFile) {
                    return '<video controls width="150">
                    <source src="' . asset($videoFile) . '" type="video/mp4">
                    Your browser does not support the video tag.
                </video>';
                }

                return 'No video available';
            })
            ->rawColumns(['action','video'])
            ->toJson();
    }

    public function edit(HomeContent $homeContent)
    {
        return view('backend.home_page.edit', compact('homeContent'));
    }

    public function update(Request $request, HomeContent $homeContent)
    {
        // dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {


            $homeContent->update($validatedData);

//            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', 'Home Page Video').'-'.$homeContent->id));
//            $homeContent->update([
//                'slug'=>$slug
//            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$homeContent->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/home_page/video_gallery';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/home_page/video_gallery/' . $filename;


                    $homeContent->attachments()->create([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => 1,
                    ]);

//                    $homeContent->update([
//                        'value' => $path,
//                    ]);

                    $counter++;
                }
            }

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('home-backend.index'),
                'message'=>'Video gallery created successfully',
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
}
