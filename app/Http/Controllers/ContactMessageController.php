<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.contact_inbox_message.index');
    }

    public function show(ContactMessage $contact_message,Request $request)
    {

        $notification = auth()->user()->Notifications->find($request->notification_id);
        if ($notification) {
            $notification->markAsRead();
        }

        return view('backend.contact_inbox_message.show',compact('contact_message'));
    }
    public function dataTable()
    {
        $query = ContactMessage::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(ContactMessage $contactMessage) {
                $btn ='<a href="'.route('contact-message.show',['contact_message'=>$contactMessage->id]).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
                $btn .= '<a role="button" data-id="'.$contactMessage->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->editColumn('created_at', function(ContactMessage $contactMessage) {
                return $contactMessage->created_at->format('d-m-Y h:i:s A');
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        try {
            // Delete the Product record
            $contactMessage->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Message deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' => 'Message not found: '.$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
