<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use Illuminate\Http\Request;

class ContactInformationController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        $contact_information = ContactInformation::first();
        if (!$contact_information){
            $contact_information = ContactInformation::create([]);
        }

        return view('backend.contact_information.edit',compact('contact_information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactInformation $contact_information)
    {

        $validateData = $request->validate([
            'mobile_no'=>'nullable|max:255',
            'telephone_no'=>'nullable|max:255',
            'fax_no'=>'nullable|max:255',
            'email'=>'nullable|max:255',
            'address'=>'nullable|max:255',
            'facebook_url'=>'nullable',
            'instragram_url'=>'nullable',
            'linkedin_url'=>'nullable',
            'x_url'=>'nullable',
            'whatsapp_no'=>'nullable',
        ]);

        try {
            $contact_information->update($validateData);

            // Redirect to the index page with a success message
            return response()->json([
                'status'=>true,
                'redirect_url'=>route('contact-information.edit'),
                'message'=>'Contact Information updated successfully',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status'=>false,
                'message'=>$exception->getMessage(),
            ]);
        }

    }

}
