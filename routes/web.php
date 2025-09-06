<?php

use App\Http\Controllers\ActivityCategoryController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExecutiveCommitteeController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoGalleryController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->prefix('admin')->group(function () {
    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //Slider
    Route::resource('slider', SliderController::class);
    Route::get('slider-datatable', [SliderController::class, 'dataTable'])->name('slider.datatable');


    //Activity Category
    Route::resource('activity-category', ActivityCategoryController::class);
    Route::get('activity-category-datatable', [ActivityCategoryController::class, 'dataTable'])->name('activity-category.datatable');

    //Activity
    Route::resource('activity', ActivityController::class);
    Route::get('activity-datatable', [ActivityController::class, 'dataTable'])->name('activity.datatable');

    //Customer
    Route::resource('customer', CustomerController::class);
    Route::get('customer-datatable', [CustomerController::class, 'dataTable'])->name('customer.datatable');

    //News
    Route::resource('news', NewsController::class);
    Route::get('news-datatable', [NewsController::class, 'dataTable'])->name('news.datatable');
    //Success Story
    Route::resource('story', StoryController::class);
    Route::get('story-datatable', [StoryController::class, 'dataTable'])->name('story.datatable');
    //Image Gallery
    Route::resource('gallery', GalleryController::class);
    Route::get('gallery-datatable', [GalleryController::class, 'dataTable'])->name('gallery.datatable');
    //Video Gallery
    Route::resource('video-gallery', VideoGalleryController::class);
    Route::get('video-gallery-datatable', [VideoGalleryController::class, 'dataTable'])->name('video-gallery.datatable');
    Route::get('video-stream/{video_gallery}', [VideoGalleryController::class, 'stream'])->name('video-gallery.stream');

    //Program
    Route::resource('programs', ProgramController::class);
    Route::get('programs-datatable', [ProgramController::class, 'dataTable'])->name('programs.datatable');


    //About Us
    Route::get('about-us', [CompanyInformationController::class, 'aboutUs'])->name('about-us');
    Route::get('contact-us', [CompanyInformationController::class, 'contactUs'])->name('contact-us');
    Route::get('management-message', [CompanyInformationController::class, 'managementMessage'])->name('management.message');
    //Who We Are
    Route::get('background', [CompanyInformationController::class, 'background'])->name('background');
    Route::get('vision', [CompanyInformationController::class, 'vision'])->name('vision');
    Route::get('mission', [CompanyInformationController::class, 'mission'])->name('mission');
    Route::get('objectives', [CompanyInformationController::class, 'objectives'])->name('objectives');
    Route::get('legal-status', [CompanyInformationController::class, 'legalStatus'])->name('legal-status');
    Route::get('organogram', [CompanyInformationController::class, 'organogram'])->name('organogram');
    Route::get('working-area', [CompanyInformationController::class, 'workingArea'])->name('working-area');
    Route::get('at-a-glance', [CompanyInformationController::class, 'atAGlance'])->name('at-a-glance');
    Route::post('company-information/update/{company_information}', [CompanyInformationController::class, 'update'])->name('company-information.update');


    //Team Member
    Route::resource('team-members', TeamMemberController::class);
    Route::get('team-members-datatable', [TeamMemberController::class, 'dataTable'])->name('team-members.datatable');

    //Executive Committee
    Route::resource('executive-committees', ExecutiveCommitteeController::class);
    Route::get('executive-committees-datatable', [ExecutiveCommitteeController::class, 'dataTable'])->name('executive-committees.datatable');



    //Contact information
    Route::get('contact-information/edit', [ContactInformationController::class, 'edit'])->name('contact-information.edit');
    Route::post('contact-information/update/{contact_information}', [ContactInformationController::class, 'update'])->name('contact-information.update');

    //Contact Message
    Route::resource('contact-message', ContactMessageController::class);
    Route::get('contact-message-datatable', [ContactMessageController::class, 'dataTable'])->name('contact-message.datatable');

    //Contact Message
    Route::resource('signup-user', NewsLetterController::class);
    Route::get('signup-user-datatable', [NewsLetterController::class, 'dataTable'])->name('signup-user.datatable');


    //User
    Route::resource('user', UserController::class);
    Route::get('user-datatable', [UserController::class, 'dataTable'])->name('user.datatable');

    //Common
    Route::post('attachment-delete/file', [CommonController::class, 'attachmentDelete'])->name('attachment-delete');
    Route::post('attachment-sort/update', [CommonController::class, 'attachmentSortUpdate'])->name('attachment-sort-update');

    //Profile
    Route::get('/dark-mode-change', [ProfileController::class, 'darkModeChange'])->name('dark_mode_change');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile-edit', [ProfileController::class, 'editPost'])->name('profile.edit_post');
    Route::get('/password-change', [ProfileController::class, 'passwordEdit'])->name('profile.password_change');
    Route::post('/password-change', [ProfileController::class, 'passwordUpdate']);

    //notification
    Route::get('notification', [NotificationController::class,'notification'])->name('notification');
    Route::get('notification-datatable', [NotificationController::class,'datatable'])->name('notification.datatable');
    Route::get('notification/mark-read', [NotificationController::class,'markRead'])->name('notification_mark_read');
    Route::get('notification/scroll-data', [NotificationController::class,'scrollData'])->name('notification_scroll_data');
    Route::get('/notification-fetch', [NotificationController::class, 'fetch'])->name('notifications.fetch');

    require __DIR__.'/db_backup.php';
    require __DIR__.'/new_backend.php';
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('image-gallery', [HomeController::class, 'imageGallery'])->name('image-gallery');
Route::get('success-stories', [HomeController::class, 'successStories'])->name('success-stories');
Route::get('success-stories/{slug}', [HomeController::class, 'successStoryShow'])->name('success-stories.show');
Route::get('news-and-events', [HomeController::class, 'newsAndEvents'])->name('news-and-events');
Route::get('news-and-events/{slug}', [HomeController::class, 'newsAndEventsShow'])->name('news-and-events.show');


Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about_us');
//Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/chairman-message', [HomeController::class, 'chairmanMessage'])->name('chairman-message');
Route::get('/managing-director-message', [HomeController::class, 'managingDirectorMessage'])->name('managing-director-message');

//Services Page
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/{service:slug}', [HomeController::class, 'serviceClipping'])->name('services.all');

Route::get('/background-page', [HomeController::class, 'background'])->name('background.show');
Route::get('vision-mission-objectives', [HomeController::class, 'visionMissionObjectives'])->name('vision-mission-objectives');
Route::get('legal-status', [HomeController::class, 'legalStatus'])->name('legal-status.page');
Route::get('organogram', [HomeController::class, 'organogram'])->name('organogram.page');
Route::get('working-area', [HomeController::class, 'workingArea'])->name('working-area.page');
Route::get('at-a-glance', [HomeController::class, 'atAGlance'])->name('at-a-glance.page');
Route::get('executive-committees', [HomeController::class, 'executiveCommittee'])->name('executive-committees');
Route::get('team-members', [HomeController::class, 'teamMembers'])->name('team-members');

Route::get('/activity/{slug}', [HomeController::class, 'activityShow'])->name('activity-show');
Route::get('/program/{slug}', [HomeController::class, 'programShow'])->name('program-show');

Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact_us');
Route::post('/contact-us', [HomeController::class, 'contactUsPost'])->name('contact_us.post');

Route::post('signup', [HomeController::class,'signup'])->name('signup');

Route::get('donation', [HomeController::class, 'donation'])->name('donation');
Route::post('donation-pay', [HomeController::class, 'donationPay'])->name('donation.pay');

Route::get('aamar/payment/success', [HomeController::class, 'successShow'])->name('aamar.payment.success');
Route::post('aamar/payment/success', [HomeController::class, 'success'])->name('aamar.payment.success');

Route::get('aamar/payment/fail', [HomeController::class, 'failShow'])->name('aamar.payment.fail');
Route::post('aamar/payment/fail', [HomeController::class, 'fail'])->name('aamar.payment.fail');

Route::get('aamar/payment/cancel', [HomeController::class, 'cancelShow'])->name('aamar.payment.cancel');
Route::post('aamar/payment/cancel', [HomeController::class, 'cancel'])->name('aamar.payment.cancel');



require __DIR__.'/auth.php';

Route::get('/clear', function () {
    Artisan::call('cache:forget spatie.permission.cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

Route::get('/migrate', function (){
   Artisan::call('migrate');
    return "Migrated!";
});
