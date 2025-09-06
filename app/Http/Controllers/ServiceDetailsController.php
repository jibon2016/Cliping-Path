<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class ServiceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.service_details.index');
    }

    public function dataTable()
    {
        $query = Service::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(Service $service) {
                $btn ='<a href="'.route('service-details.edit',['service'=>$service->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                        <a role="button" data-id="'.$service->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->addColumn('icon', function(Service $service) {
                return '<img height="100px" src="'.asset($service->icon ?? '').'">';

            })
            ->rawColumns(['action','icon'])
            ->toJson();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $service->load(['serviceDetails', 'serviceDetails.attachments']);
        try {
            return view('backend.service_details.edit', compact('service',));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Product is not found
            return redirect()->route('service-details.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'description1' => 'nullable',
            'description2' => 'nullable',
            'status' => 'required|boolean',
            'lottie_json' => 'nullable',
            'header_image' => 'nullable|mimes:jpg,jpeg,webp,png|max:2048',
        ]);

        // Start a database transactionn
        DB::beginTransaction();

        try {

            $serviceDetails = ServiceDetail::updateOrCreate(
                [
                    'service_id' => $service->id
                ],
                [
                'service_id' => $service->id,
                'description1' => $validatedData['description1'],
                'description2' => $validatedData['description2'],
                'lottie_json' => $validatedData['lottie_json'],
                'status' => $validatedData['status'],
            ]);

            if ($request->file('attachments')) {
                $counter = 0;
                foreach ($request->file('attachments') as $key => $attachmentFile) {
                    $filename = Uuid::uuid1()->toString().$service->id.'-'.$key.'.' .$attachmentFile->extension();
                    $destinationPath = 'uploads/attachments/services-details';
                    $attachmentFile->move(public_path($destinationPath), $filename);
                    $path = 'uploads/attachments/services-details/' . $filename;

                    $serviceDetails->attachments()->create([
                        'user_id' => auth()->id(),
                        'file' => $path,
                        'sort' => $request->attachment_sort[$counter],
                    ]);

                    $counter++;
                }
            }

//            if ($request->file('lottie_json')) {
//                $filename = Uuid::uuid1()->toString().$service->id .'.lottie';
//                $destinationPath = 'uploads/attachments/services-details/lottie';
//                $request->file('lottie_json')->move(public_path($destinationPath), $filename);
//                $path = 'uploads/attachments/services-details/lottie/' . $filename;
//
//                $serviceDetails->update([
//                    'lottie_json' => $path,
//                ]);
//            }
            if ($request->file('header_image')) {
                $filename = Uuid::uuid1()->toString() . $service->id . '.' . $request->file('header_image')->getClientOriginalExtension();
                $destinationPath = 'uploads/attachments/services-details/header_image';
                $request->file('header_image')->move(public_path($destinationPath), $filename);
                $path = 'uploads/attachments/services-details/header_image/' . $filename;

                $serviceDetails->update([
                    'header_image' => $path,
                ]);
            }

                DB::commit();
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('service-details.index'),
                'message'=>'Service Details Updated successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status'=>false,
                'message'=>$e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
