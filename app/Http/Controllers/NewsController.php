<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.news.index');
    }
    public function dataTable()
    {
        $query = News::with('attachments');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(News $news) {
                return '<a href="'.route('news.edit',['news'=>$news->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$news->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';

            })
            ->addColumn('image', function(News $news) {
                return '<img height="100px" src="'.asset($news->attachments->first()->file ?? '').'">';

            })
            ->rawColumns(['action','image'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.news.create');
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
            'description' => 'nullable',
            'status' => 'required|boolean',
            'attachments' => 'required',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $validatedData['user_id'] = auth()->id();
            unset($validatedData['attachments']);

            $content = handleImagesInContent($request->description,'uploads/news/content');
            $validatedData['description'] = $content;

            // Create a new Product record in the database
            $news = News::create($validatedData);
            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$news->id));
            $news->update([
                'slug'=>$slug
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$news->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/news';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/news/' . $filename;


                    $attachment = new Attachment([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);
                    $news->attachments()->save($attachment);


                    $counter++;
                }
            }


            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('news.index'),
                'message'=>'News created successfully',
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
    public function edit(News $news)
    {
        try {
            // If the Product exists, display the edit view
            return view('backend.news.edit', compact('news'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('news.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        // dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'title' =>[
                'required','max:255',
            ],
            'short_description' => 'required|max:500',
            'description' => 'nullable',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {


            $content = handleImagesInContent($request->description,'uploads/news/content');
            $validatedData['description'] = $content;
            $news->update($validatedData);

            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$news->id));
            $news->update([
                'slug'=>$slug
            ]);
            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$news->id.'-'.$key.'.' .$attachmentFile->extension();

                    $destinationPath = 'uploads/attachments/news';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/news/' . $filename;


                    $news->attachments()->create([
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
                'redirect_url'=>route('news.index'),
                'message'=>'News created successfully',
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
    public function destroy(News $news)
    {
        try {
            // Delete the Product record
           foreach ($news->attachments as $attachment){
               if (file_exists(public_path($attachment->file))){
                   unlink(public_path($attachment->file));
               }
               $attachment->delete();
           }

            $news->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'News deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
