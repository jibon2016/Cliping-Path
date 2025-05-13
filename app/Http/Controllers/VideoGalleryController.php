<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\News;
use App\Models\Story;
use App\Models\VideoGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.video_gallery.index');
    }
    public function dataTable()
    {
        $query = VideoGallery::with('attachments');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(VideoGallery $video_gallery) {
                $btn ='<a href="'.route('video-gallery.edit',['video_gallery'=>$video_gallery->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$video_gallery->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
                $btn .=' <a href="'.route('video-gallery.show',['video_gallery'=>$video_gallery->id]).'" class="btn btn-primary bg-gradient-primary btn-sm"><i class="fa fa-viadeo"></i></a>';
                return $btn;
            })
            ->addColumn('video', function (VideoGallery $video_gallery) {
                $videoFile = $video_gallery->attachments->first()->file ?? null;

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
    public function show(VideoGallery $video_gallery)
    {
        return view('backend.video_gallery.stream', compact('video_gallery'));
    }
    public function stream(VideoGallery $video_gallery)
    {
        $filename = $video_gallery->attachments->first()->file ?? null;

        $path = public_path("{$filename}");

        if (!file_exists($path)) {
            abort(404); // Abort with a 404 if file doesn't exist
        }

        $fileSize = filesize($path); // Get the file size

        // Check if the browser sent a range request (for seeking)
        $range = isset($_SERVER['HTTP_RANGE']) ? $_SERVER['HTTP_RANGE'] : null;

        // Handle range requests (for video seeking)
        if ($range) {
            list($start, $end) = explode('-', str_replace('bytes=', '', $range));

            // Set start and end byte positions
            $start = (int)$start;
            $end = $end ? (int)$end : $fileSize - 1;

            // Set proper headers for range requests
            header("HTTP/1.1 206 Partial Content");
            header("Content-Range: bytes {$start}-{$end}/{$fileSize}");
            header("Content-Length: " . ($end - $start + 1));
            header("Accept-Ranges: bytes");

            // Open the file, seek to the start position and send the byte range
            $file = fopen($path, 'rb');
            fseek($file, $start);
            echo fread($file, $end - $start + 1);
            fclose($file);
            exit;
        }

        // If there's no range request, stream the entire video file
        return response()->stream(function () use ($path) {
            $file = fopen($path, 'rb');
            while (!feof($file)) {
                echo fread($file, 1024 * 8); // Stream the file in 8 KB chunks
                flush();
            }
            fclose($file);
        }, 200, [
            "Content-Type" => "video/mp4",  // Video content type
            "Content-Length" => $fileSize,  // Total file size
            "Accept-Ranges" => "bytes",     // Enable range requests
        ]);
    }

    public function saveVideoTime(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'video_gallery_id' => 'required|exists:video_galleries,id',
            'current_time' => 'required|numeric',
        ]);

        // Save the current playback time (this is just an example, you can save it however you like)
        $videoGallery = VideoGallery::find($request->video_gallery_id);
        $videoGallery->last_playback_time = $request->current_time;
        $videoGallery->save();

        return response()->json(['status' => 'success']);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.video_gallery.create');
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
            $video_gallery = VideoGallery::create($validatedData);
            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$video_gallery->id));
            $video_gallery->update([
                'slug'=>$slug
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$video_gallery->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/video_gallery';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/video_gallery/' . $filename;


                    $attachment = new Attachment([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);
                    $video_gallery->attachments()->save($attachment);


                    $counter++;
                }
            }


            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('video-gallery.index'),
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoGallery $video_gallery)
    {
        try {
            // If the Product exists, display the edit view
            return view('backend.video_gallery.edit', compact('video_gallery'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('video-gallery.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoGallery $video_gallery)
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


            $video_gallery->update($validatedData);

            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$video_gallery->id));
            $video_gallery->update([
                'slug'=>$slug
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$video_gallery->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/video_gallery';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/video_gallery/' . $filename;


                    $video_gallery->attachments()->create([
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
                'redirect_url'=>route('video-gallery.index'),
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoGallery $video_gallery)
    {
        try {
            // Delete the Product record
           foreach ($video_gallery->attachments as $attachment){
               if (file_exists(public_path($attachment->file))){
                   unlink(public_path($attachment->file));
               }
               $attachment->delete();
           }

            $video_gallery->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Video gallery deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
