<?php

namespace App\Http\Controllers;

use App\Models\CompanyInformation;
use Illuminate\Http\Request;

class CompanyInformationController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function aboutUs()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.about_us',compact('company_information'));
    }
    public function managementMessage()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.management_message',compact('company_information'));
    }
    public function background()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.background',compact('company_information'));
    }
    public function vision()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.vision',compact('company_information'));
    }
    public function mission()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.mission',compact('company_information'));
    }
    public function objectives()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.objectives',compact('company_information'));
    }
    public function legalStatus()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.legal_status',compact('company_information'));
    }
    public function organogram()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.organogram',compact('company_information'));
    }
    public function workingArea()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.work_area',compact('company_information'));
    }
    public function atAGlance()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.about_us.at_a_glance',compact('company_information'));
    }
    public function edit()
    {

        $company_information = CompanyInformation::first();
        if (!$company_information){
            $company_information = CompanyInformation::create([]);
        }

        return view('backend.company_information.edit',compact('company_information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyInformation $company_information)
    {


        $rules = [];
        if ($request->has('about_us')) {
            $rules['about_us'] = 'required';
        }
        if ($request->has('chairman_message')) {
            $rules['chairman_message'] = 'required';
        }
        if ($request->has('managing_director_message')) {
            $rules['managing_director_message'] = 'required';
        }
        if ($request->has('background')) {
            $rules['background'] = 'required';
        }
        if ($request->has('vision')) {
            $rules['vision'] = 'required';
        }
        if ($request->has('mission')) {
            $rules['mission'] = 'required';
        }
        if ($request->has('objectives')) {
            $rules['objectives'] = 'required';
        }
        if ($request->has('legal_status')) {
            $rules['legal_status'] = 'required';
        }
        if ($request->has('organogram')) {
            $rules['organogram'] = 'required';
        }
        if ($request->has('working_area')) {
            $rules['working_area'] = 'required';
        }
        if ($request->has('at_a_glance')) {
            $rules['at_a_glance'] = 'required';
        }

        $request->validate($rules);

        try {

            if ($request->has('about_us')) {
                $content = handleImagesInContent($request->about_us,'uploads/about_us/content');
                $company_information->about_us = $content;
            }
            if ($request->has('chairman_message')) {
                $content = handleImagesInContent($request->chairman_message,'uploads/chairman_message/content');
                $company_information->chairman_message = $content;
            }
            if ($request->has('managing_director_message')) {
                $content = handleImagesInContent($request->managing_director_message,'uploads/managing_director_message/content');
                $company_information->managing_director_message = $content;
            }
            if ($request->has('background')) {
                $content = handleImagesInContent($request->background,'uploads/background/content');
                $company_information->background = $content;
            }
            if ($request->has('vision')) {
                $content = handleImagesInContent($request->vision,'uploads/vision/content');
                $company_information->vision = $content;
            }
            if ($request->has('mission')) {
                $content = handleImagesInContent($request->mission,'uploads/mission/content');
                $company_information->mission = $content;
            }
            if ($request->has('objectives')) {
                $content = handleImagesInContent($request->objectives,'uploads/objectives/content');
                $company_information->objectives = $content;
            }
            if ($request->has('legal_status')) {
                $content = handleImagesInContent($request->legal_status,'uploads/legal_status/content');
                $company_information->legal_status = $content;
            }
            if ($request->has('organogram')) {
                $content = handleImagesInContent($request->organogram,'uploads/organogram/content');
                $company_information->organogram = $content;
            }
            if ($request->has('working_area')) {
                $content = handleImagesInContent($request->working_area,'uploads/working_area/content');
                $company_information->working_area = $content;
            }
            if ($request->has('at_a_glance')) {
                $content = handleImagesInContent($request->at_a_glance,'uploads/at_a_glance/content');
                $company_information->at_a_glance = $content;
            }

            $company_information->save();

            // Redirect to the index page with a success message
            return response()->json([
                'status' => true,
                'redirect_url' => url()->previous(),
                'message' => 'Information updated successfully',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status'=>false,
                'message'=>$exception->getMessage(),
            ]);
        }

    }


}
