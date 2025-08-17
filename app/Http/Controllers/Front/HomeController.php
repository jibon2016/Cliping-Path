<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SliderController;
use App\Models\Activity;
use App\Models\Attachment;
use App\Models\Brand;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\ClientFeedback;
use App\Models\Collection;
use App\Models\Color;
use App\Models\CompanyInformation;
use App\Models\ContactInformation;
use App\Models\Customer;
use App\Models\Donation;
use App\Models\DonationFund;
use App\Models\ExecutiveCommittee;
use App\Models\Gallery;
use App\Models\HomeContent;
use App\Models\HowItWorks;
use App\Models\Look;
use App\Models\News;
use App\Models\Program;
use App\Models\Service;
use App\Models\Size;
use App\Models\Space;
use App\Models\ContactMessage;
use App\Models\NewsLetter;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Story;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Surface;
use App\Models\TeamMember;
use App\Models\Transaction;
use App\Models\Type;
use App\Models\User;
use App\Models\WCU;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Slider::where('status',1)
            ->orderBy('sort')
            ->with('attachments')
            ->get();
        $customers = Customer::where('status',1)
            ->orderBy('sort')
            ->take(6)
            ->with('attachments')
            ->get();
        $stories = Story::where('status',1)
            ->latest()
            ->take(3)
            ->with('attachments')
            ->get();
        $galleries = Attachment::whereHas('attachable', function ($query) {
            $query->where('attachable_type', Gallery::class)
                ->where('status', 1); // Filter galleries where status is 1
        })->latest()->take(12)->get();

        $wcus= WCU::where('status',1)->get();
        $services= Service::where('status',1)->orderBy('id', 'ASC')->get();
        $clientFeedbacks = ClientFeedback::where('status', 1)->get();

        $homePageVideo = HomeContent::where('title','Video')
            ->with('attachments')
            ->first();
        $howItWorks = HowItWorks::where('status', 1)->get();

        return view('frontend.home',compact('sliders','customers','stories','galleries',
            'services', 'clientFeedbacks' ,'wcus', 'homePageVideo', 'howItWorks'));
    }
    public function imageGallery()
    {

        $galleries = Attachment::whereHas('attachable', function ($query) {
            $query->where('attachable_type', Gallery::class)
                ->where('status', 1); // Filter galleries where status is 1
        })->latest()->simplePaginate(16);

        return view('frontend.image_gallery',compact('galleries'));
    }
    public function successStories()
    {

        $stories = Story::where('status',1)
            ->latest()
            ->with('attachments')
            ->simplePaginate(3);

        return view('frontend.success_stories',compact('stories'));
    }
    public function successStoryShow($slug)
    {

        $story = Story::where('status',1)
            ->where('slug',$slug)
            ->with('attachments')
            ->first();
        if (!$story){
            abort('404');
        }

        return view('frontend.success_stories_show',compact('story'));
    }

    public function itemList(Request $request)
    {
        $query = Product::query();
        $searchOption = null;
        if ($request->space != ''){
            $searchOption = Space::where('slug',$request->space)->first();
            $query->where('space_id',$searchOption->id);
        }
        if ($request->category != ''){
            $searchOption = Category::where('slug',$request->category)->first();
            $query->where('category_id',$searchOption->id);
        }
        if ($request->collection != ''){
            $searchOption = Collection::where('slug',$request->collection)->first();
            $query->where('collection_id',$searchOption->id);
        }
        if ($request->s != ''){
            $query->where('name','LIKE','%'.$request->s.'%');
        }
        if ($request->order != ''){
            if ($request->order == 'name_asc'){
                $query->orderBy('name','asc');
            }elseif ($request->order == 'name_desc'){
                $query->orderBy('name','desc');
            }elseif ($request->order == 'date_asc'){
                $query->orderBy('created_at','asc');
            }elseif ($request->order == 'date_desc'){
                $query->orderBy('created_at','desc');
            }
        }

        $products = $query->paginate(18);


        $spaces = Space::where('status',1)->orderBy('sort')->get();
        $categories = Category::where('status',1)->orderBy('sort')->get();
        $sizes = Size::where('status',1)->orderBy('sort')->get();
        $types = Type::where('status',1)->orderBy('sort')->get();
        $colors = Color::where('status',1)->orderBy('sort')->get();
        $surfaces = Surface::where('status',1)->orderBy('sort')->get();
        $looks = Look::where('status',1)->orderBy('sort')->get();

        return view('frontend.item_list',compact('products','searchOption',
        'spaces','categories','sizes','types','colors','surfaces','looks'
        ));
    }
    public function itemListDetails(Request $request)
    {
        $product = Product::where('status',1)->where('slug',$request->slug)->first();
        if (!$product){
            abort('404');
        }

        return view('frontend.item_list_details',compact('product' ));
    }
    public function catalogue(Request $request)
    {
        $catalogues = Catalogue::where('status',1)
            ->orderBy('sort')
            ->paginate(12);

        return view('frontend.catalogue',compact('catalogues'));
    }
    public function newsAndEvents(Request $request)
    {
        $news = News::where('status',1)
            ->orderBy('created_at','desc')
            ->with('attachments')
            ->paginate(12);

        return view('frontend.news',compact('news'));
    }
    public function newsAndEventsShow($slug)
    {
        $news = News::where('status',1)->where('slug',$slug)->first();
        if (!$news){
            abort('404');
        }

        return view('frontend.news_show',compact('news'));
    }

    //Services pages
    public function services()
    {
        return view('frontend.service.all_services');
    }
    public function serviceClipping(Service $service)
    {
        $service->load(['serviceDetails.attachments', 'serviceDetails' ]);
        return view('frontend.service.single_service', compact('service'));
    }

    public function aboutUs()
    {
        $companyInformation = CompanyInformation::first();
        return view('frontend.about_us.about_us',compact('companyInformation'));
    }
    public function portfolio()
    {
        return view('frontend.portfolio');
    }
    public function pricing()
    {
        return view('frontend.pricing');
    }
    public function chairmanMessage()
    {
        $companyInformation = CompanyInformation::first();
        return view('frontend.about_us.chairman_message',compact('companyInformation'));
    }
    public function managingDirectorMessage()
    {
        $companyInformation = CompanyInformation::first();
        return view('frontend.about_us.managing_director_message',compact('companyInformation'));
    }
    public function background()
    {
        $companyInformation = CompanyInformation::first();
        return view('frontend.who_we_are.background',compact('companyInformation'));
    }
    public function visionMissionObjectives()
    {
        $companyInformation = CompanyInformation::first();
        return view('frontend.who_we_are.vision_mission_objectives',compact('companyInformation'));
    }
    public function legalStatus()
    {
        $companyInformation = CompanyInformation::first();
        return view('frontend.who_we_are.legal_status',compact('companyInformation'));
    }
    public function organogram()
    {
        $companyInformation = CompanyInformation::first();
        return view('frontend.who_we_are.organogram',compact('companyInformation'));
    }
    public function workingArea()
    {
        $companyInformation = CompanyInformation::first();
        return view('frontend.who_we_are.working_area',compact('companyInformation'));
    }
    public function atAGlance()
    {
        $companyInformation = CompanyInformation::first();
        return view('frontend.who_we_are.at_a_glance',compact('companyInformation'));
    }
    public function executiveCommittee()
    {
        $executiveCommittees = ExecutiveCommittee::orderBy('sort')
            ->where('status',1)
            ->with('attachments')
            ->get();

        return view('frontend.who_we_are.executive_committee',compact('executiveCommittees'));
    }
    public function teamMembers()
    {
        $teamMembers = TeamMember::orderBy('sort')
            ->where('status',1)
            ->with('attachments')
            ->get();

        return view('frontend.who_we_are.team_members',compact('teamMembers'));
    }
    public function activityShow($slug)
    {
        $activity = Activity::with('activityCategory')
            ->whereHas('activityCategory',function ($query) use ($slug){
                $query->where('slug',$slug);
            })->first();
        if (!$activity){
            abort('404');
        }
        return view('frontend.activity',compact('activity'));
    }
    public function programShow($slug)
    {
        $program = Program::where('slug',$slug)->first();
        if (!$program){
            abort('404');
        }
        return view('frontend.program',compact('program'));
    }
    public function contactUs()
    {
        $contactInformation = ContactInformation::first();
        return view('frontend.contact_us',compact('contactInformation'));
    }
    public function contactUsPost(Request $request)
    {

        $request->validate([
            'name'=>'required|max:50',
            'email'=>'required|email|max:100',
            'phone'=>['required','digits:11','regex:/^01\d{9}$/'],
            'message'=>'required|max:1000',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            $message = new ContactMessage();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->mobile_no = $request->phone;
            $message->subject = 'Contact Message';
            $message->message = $request->message;
            $message->ip_address = $request->ip();
            $message->remember = $request->remember ? 1 : 0;
            $message->save();


            $users = User::where('status',1)->get();
            $array = [
                'title'=>$request->subject,
                'content'=>$request->message,
                'action'=> 'https://photopixelqa.com/'
            ];


                $message->notify(new \App\Notifications\ContactMessage($array));


            // Commit the transaction
            DB::commit();

            // Redirect to the index page with a success message
            return redirect()->route('contact_us')->with('message','Message send successfully');

        }catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollback();

            // Handle the error and redirect with an error message
            return redirect()->route('contact_us')->withInput()->with('error',$e->getMessage());

        }
    }
    public function donation()
    {
        $donationFunds = DonationFund::where('status',1)->orderBy('sort')->get();
        return view('frontend.donation',compact('donationFunds'));
    }

    public function donationPay(Request $request){


        //If donation

        $request['customer_name'] = $request->first_name . ' ' . $request->last_name;

        $donationData = [
            'donation_fund_id' => $request->donation_fund,
            'is_organisation' => $request->is_organisation ?? 0,
            'organisation_name' => $request->organisation,
            'name' => $request->customer_name,
            'email' => $request->email,
            'mobile_no' => $request->contact_number,
            'amount' => $request->donation_amount,
            'status' => 'Pending',
            'address' => $request->address,
        ];
        $donation = Donation::create($donationData);
        $tranId = $this->generateOrderNo('INV-','transactions','transaction_id');
       // dd($tranId);
        $transactionData = [
            'donation_id' => $donation->id,
            'amount' => $request->donation_amount,
            'status' => 'Pending',
            'transaction_id' => $tranId,
            'currency' => 'BDT',
            'user_id' => auth()->id(),
        ];

        Transaction::create($transactionData);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://sandbox.aamarpay.com/jsonpost.php', [
            'store_id' => 'aamarpaytest',
            'tran_id' => $tranId,
            'success_url' => route('aamar.payment.success'),
            'fail_url' => route('aamar.payment.fail'),
            'cancel_url' => route('aamar.payment.cancel'),
            'amount' => (string)$request->donation_amount,
            'currency' => 'BDT',
            'signature_key' => 'dbb74894e82415a2f7ff0ec3a97e4183',
            'desc' => 'Donation Payment',
            'cus_name' => $request->customer_name,
            'cus_email' => $request->email ?? 'test@example.com',
            'cus_add1' => $request->address,
            'cus_add2' => 'Mohakhali DOHS',
            'cus_city' => 'Dhaka',
            'cus_state' => 'Dhaka',
            'cus_postcode' => '1206',
            'cus_country' => 'Bangladesh',
            'cus_phone' => $request->contact_number,
            'type' => 'json',
        ]);

        // Get the response body
        $response = json_decode($response->body());

// Check if decoding was successful and `tran_id` exists
        if (isset($response->tran_id) && $response->tran_id != '') {
            return redirect()->route('aamar.payment.fail');
        }

        if (isset($response->result) && $response->result == 'true' && isset($response->payment_url)) {
            return redirect()->away($response->payment_url);
        } else {
            return redirect()->route('aamar.payment.fail');
        }


    }

    protected function generateOrderNo($prefix, $table, $column = null)
    {
        if (!$column) {
            $column = 'transaction_id';
        }
        $maxNumberQuery = DB::table($table);

        $maxNumber = $maxNumberQuery->where($column, 'LIKE', "{$prefix}%")
            ->select(DB::raw("MAX(CAST(SUBSTRING($column, LENGTH('{$prefix}') + 1) AS UNSIGNED)) as max_number"))
            ->value('max_number');
        $newNumber = $maxNumber ? $maxNumber + 1 : 1;
        if ($newNumber < 10000) {
            $newOrderNo = $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newOrderNo = $prefix . $newNumber;
        }

        return $newOrderNo;
    }


    public function successShow(Request $request)
    {
        $msg = "Transaction is Successful";
        return view('donation.success')
            ->with('message', $msg);
    }
    public function success(Request $request)
    {

        $tran_id = $request->input('mer_txnid');
        $payStatus= $request->input('pay_status');

        $order_details = DB::table('transactions')
            ->where('transaction_id', $tran_id)
            ->select('user_id', 'transaction_id',
                'donation_id', 'status', 'currency', 'amount'
            )->first();

        if ($payStatus == 'Successful'){
            $update_product = DB::table('transactions')
                ->where('transaction_id', $tran_id)
                ->update([
                    'status' => 'Complete',
                    'json_response' => json_encode($request->all()),
                ]);


            $msg = "Transaction is Successful";
            return view('donation.success')
                ->with('message', $msg);
        }else{
            $msg = "Transaction is Failed";
            $update_product = DB::table('transactions')
                ->where('transaction_id', $tran_id)
                ->update([
                    'status' => 'Failed',
                    'json_response' => json_encode($request->all()),
                ]);
            return view('donation.fail')
                ->with('message', $msg);
        }


    }

    public function cancelShow(Request $request)
    {


        return view('donation.cancel')
            ->with('message', 'Transaction failed.');
    }
    public function failShow(Request $request)
    {
        return view('donation.fail')
            ->with('message', 'Transaction failed.');
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('mer_txnid');
        $payStatus= $request->input('pay_status');

        $order_details = DB::table('transactions')
            ->where('transaction_id', $tran_id)
            ->select('user_id', 'transaction_id',
                'donation_id', 'status', 'currency', 'amount'
            )->first();
        if ($order_details->user_id) {
            $user = User::find($order_details->user_id);
            Auth::login($user, true);
        }
        if ($payStatus == 'Failed'){
            $msg = "Transaction is Failed";
            $update_product = DB::table('transactions')
                ->where('transaction_id', $tran_id)
                ->update([
                    'status' => 'Failed',
                    'json_response' => json_encode($request->all()),
                ]);
            return view('donation.fail')
                ->with('message', $msg);
        }

    }

    public function signup(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:100|unique:news_letters',
        ];

        $customMessages = [
            'email.unique' => 'The email address has already been subscribed.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }
        // Start a database transaction
        DB::beginTransaction();

        try {
            $newsletter = NewsLetter::where('email',$request->email)->first();

            if (!$newsletter){
                $newsletter = new NewsLetter();
                $newsletter->email = $request->email;
                $newsletter->ip_address = $request->ip();
                $newsletter->save();
            }

            // Commit the transaction
            DB::commit();
            // Redirect to the index page with a success message
            return response()->json(['success' => true, 'message' => 'Your signup successful.']);

        }catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollback();
            // Handle the error and redirect with an error message
            return response()->json(['success' => false, 'message' => 'An error occurred while signup: '.$e->getMessage()]);

        }


        return response()->json(['success' => true, 'message' => 'Your signup successful.']);

    }

}
