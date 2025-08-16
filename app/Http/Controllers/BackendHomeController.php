<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\HomeContent;
use App\Models\WCU;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function wcu()
    {
        return view('backend.home_page.wcu.index');
    }

    public function wcuDataTable()
    {
        $query = WCU::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(WCU $wcu) {
                return '<a href="'.route('home-backend.wcu.edit',['wcu'=>$wcu->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$wcu->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';

            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function wcuCreate()
    {
        return view('backend.home_page.wcu.create');
    }

    public function wcuStore(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'title' =>[
                'required','max:255',
            ],
            'description' => 'nullable',
            'status' => 'required|boolean',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

           $wcu = WCU::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'status' => $validatedData['status'],
            ]);

            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString() . $wcu->id . '-' . $key . '.' . $attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/wcu';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/wcu/' . $filename;


                    $attachment = new Attachment([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);
                    $wcu->attachments()->save($attachment);
                    $counter++;
                }
            }

            DB::commit();


            return response()->json([
                'status'=>true,
                'redirect_url'=>route('home-backend.wcu'),
                'message'=>'WCU created successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status'=>false,
                'message'=>$e->getMessage(),
            ]);
        }
    }

    public function wcuEdit(WCU $wcu)
    {
        return view('backend.home_page.wcu.edit', compact('wcu'));
    }

    public function wcuUpdate(WCU $wcu, Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' =>[
                'required','max:255',
            ],
            'description' => 'nullable',
            'status' => 'required|boolean',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $wcu->update($validatedData);

            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$wcu->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/wcu';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/wcu/' . $filename;


                    $wcu->attachments()->create([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);

                    $counter++;
                }
            }

            DB::commit();
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('home-backend.wcu'),
                'message'=>'WCU updated successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status'=>false,
                'message'=>$e->getMessage(),
            ]);
        }
    }

    public function wcuDestroy(WCU $wcu)
    {
        try {

            $wcu->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'WCU deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}

