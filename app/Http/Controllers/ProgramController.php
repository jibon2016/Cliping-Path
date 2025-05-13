<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\News;
use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = ProgramCategory::where('id',$request->program_category)->firstOrFail();
        return view('backend.program.index',compact('category'));
    }
    public function dataTable()
    {
        $query = Program::where('program_category_id',request('program_category'));
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(Program $program) {
                return '<a href="'.route('programs.edit',['program'=>$program->id,'program_category'=>$program->program_category_id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i> Content</a> <a role="button" data-id="'.$program->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category = ProgramCategory::where('id',$request->program_category)->firstOrFail();
        $sortMax = Program::where('program_category_id',$category->id)->max('sort') + 1;

        return view('backend.program.create',compact('category','sortMax'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = ProgramCategory::where('id',$request->program_category)->firstOrFail();

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'sort' => 'required|integer',
            'program_category' => 'required',
            'status' => 'required|boolean',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $validatedData['user_id'] = auth()->id();
            $validatedData['program_category_id'] = $request->program_category;
            unset($validatedData['program_category']);

            $content = handleImagesInContent($request->description,'uploads/program/content');
            $validatedData['description'] = $content;

            // Create a new Product record in the database
            $program = Program::create($validatedData);
            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$program->id));
            $program->update([
                'slug'=>$slug
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('programs.index',['program_category'=>$category->id]),
                'message'=>$category->name.' new created successfully',
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
    public function edit(Program $program,Request $request)
    {
        try {
            $category = ProgramCategory::where('id',$request->program_category)->firstOrFail();

            // If the Product exists, display the edit view
            return view('backend.program.edit', compact('program','category'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('programs.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $category = ProgramCategory::where('id',$request->program_category)->firstOrFail();

        // Validate the request data
        $validatedData = $request->validate([
            'title' =>['required','max:255'],
            'sort' => 'required|integer',
            'description' => 'required',
            'program_category' => 'required',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {


            $content = handleImagesInContent($request->description,'uploads/program/content');
            $validatedData['description'] = $content;
            $validatedData['program_category_id'] = $request->program_category;
            unset($validatedData['program_category']);
            $program->update($validatedData);

            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->title).'-'.$program->id));
            $program->update([
                'slug'=>$slug
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('programs.index',['program_category'=>$category->id]),
                'message'=>$category->name.' updated successfully',
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
    public function destroy(Program $program)
    {
        try {

            $program->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
