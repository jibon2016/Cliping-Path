<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommonController extends Controller
{
    public function attachmentDelete(Request $request)
    {


        try {
            $attachment = Attachment::where('id',$request->id)->first();
            if (file_exists(public_path($attachment->file))){
                unlink(public_path($attachment->file));
            }
            $attachment->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Attachment deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' => 'Attachment not found: '.$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
    public function attachmentSortUpdate(Request $request)
    {

        try {
            $attachment = Attachment::where('id',$request->id)->first();
            $attachment->sort = $request->sort;
            $attachment->save();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Attachment title updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' => 'Attachment not found: '.$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
