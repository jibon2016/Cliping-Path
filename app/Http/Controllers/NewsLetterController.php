<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.signup_users.index');
    }
    public function dataTable()
    {
        $query = NewsLetter::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(NewsLetter $newsLetter) {
                return '<a role="button" data-id="'.$newsLetter->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
            })
            ->editColumn('created_at', function(NewsLetter $newsLetter) {
                return $newsLetter->created_at->format('d-m-Y h:i:s A');
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsLetter $signup_user)
    {
        $news_letter = $signup_user;
        try {
            // Delete the Product record
            $news_letter->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Email deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' => 'Email not found: '.$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
