<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.customer.index');
    }
    public function dataTable()
    {
        $query = Customer::with('attachments');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(Customer $customer) {
                return '<a href="'.route('customer.edit',['customer'=>$customer->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a> <a role="button" data-id="'.$customer->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';

            })
            ->addColumn('image', function(Customer $customer) {
                return '<img height="100px" src="'.asset($customer->attachments->first()->file ?? '').'">';

            })
            ->rawColumns(['action','image'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sortMax = Customer::max('sort') + 1;
        return view('backend.customer.create',compact('sortMax'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'name' =>[
                'required','max:255',
                Rule::unique('customers')
            ],
            'sort' => 'required|integer',
            'attachments' => 'required',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new Product record in the database
            unset($validatedData['attachments']);
            $customer = Customer::create($validatedData);
            $slug = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->name).'-'.$customer->id));
            $customer->update(['slug'=>$slug]);

            if ($request->file('attachments')) {
                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$customer->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/customer';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/customer/' . $filename;

                $attachment = new Attachment([
                    'user_id' => auth()->id(),
                    'file' => $path,
                    'sort' => 1,
                ]);
                $customer->attachments()->save($attachment);
            }
            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('customer.index'),
                'message'=>'Customer created successfully',
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
    public function edit(Customer $customer)
    {
        try {
            // If the Product exists, display the edit view
            return view('backend.customer.edit',compact('customer'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('customer.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' =>[
                'required','max:255',
                Rule::unique('customers')
                    ->ignore($customer)
            ],
            'sort' => 'required|integer',
            'attachments' => 'nullable',
            'status' => 'required|boolean', // Ensure 'status' is boolean
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $validatedData['slug'] = str_replace('--','-',strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '-', $request->name).'-'.$customer->id));
            // Update the Product record in the database
            unset($validatedData['attachments']);
            $customer->update($validatedData);
            if ($request->file('attachments')) {
                $attachmentFile = $request->file('attachments');
                $filename = Uuid::uuid1()->toString().$customer->id.'.' .$attachmentFile->extension();
                $destinationPath = 'uploads/attachments/customer';
                $attachmentFile->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/customer/' . $filename;

                $attachment = $customer->attachments()->first();
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $customer->attachments()->delete();
                $customer->attachments()->create([
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
                'redirect_url'=>route('customer.index'),
                'message'=>'Customer updated successfully',
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
    public function destroy(Customer $customer)
    {
        try {
            foreach ($customer->attachments as $attachment){
                if (file_exists(public_path($attachment->file))){
                    unlink(public_path($attachment->file));
                }
                $attachment->delete();
            }
            // Delete the Product record
            $customer->delete();
            // Return a JSON success response
            return response()->json(['success'=>true,'message' => 'Customer deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors, such as record not found
            return response()->json(['success'=>false,'message' =>$e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
