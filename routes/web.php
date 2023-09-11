<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OwnerAuth\OwnerAuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'welcome']);


//to prevent going back from dashboard to login page
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin','middleware'=>['Admin','auth','PreventBackHistory']],function(){
    Route::get('/','App\Http\Controllers\AdminController@AdminIndex')->name('admindashboard');
    // Route::get('/profile',[AdminController::class,'profile'])->name('adminprofile');

    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
      
});

// Route::group(['prefix'=>'student','middleware'=>['Student','auth']], function(){
//     Route::get('dashboard',[StudentController::class,'index'])->name('studentdashboard');
//     Route::get('profile',[StudentController::class,'profile'])->name('student.profile');
// });
    
Route::group(['prefix'=>'student','middleware'=>['Student','auth','PreventBackHistory']],function(){
    Route::get('/', [StudentController::class,'StudentIndex'])->name('studentdashboard');

    //Profile
    Route::post('update-profile-info',[StudentController::class,'updateInfo'])->name('studentUpdateInfo');
    Route::post('change-profile-picture',[StudentController::class,'updatePicture'])->name('studentPictureUpdate');
    Route::post('change-password',[StudentController::class,'changePassword'])->name('studentChangePassword');
      
});

 
// Auth Owner

Route::prefix('ownerauth')->name('ownerauth.')->group(function(){

    Route::middleware(['guest:ownerauth','PreventBackHistory'])->group(function(){
         Route::view('/login','ownerauth.login')->name('login');
         Route::view('/register','ownerauth.register')->name('register');
         Route::post('/create',[OwnerAuthController::class,'create'])->name('create');
         Route::post('/check',[OwnerAuthController::class,'check'])->name('check');
    });


    Route::middleware(['auth:ownerauth','PreventBackHistory'])->group(function(){
        //  Route::view('/dashboard','ownerauth.dashboard')->name('dashboard');
         Route::post('logout',[OwnerAuthController::class,'logout'])->name('logout');
         Route::get('/dashboard',[OwnerAuthController::class,'OwnerIndex'])->name('dashboard');
         Route::get('/profile',[OwnerAuthController::class,'profile'])->name('ownerauth.profile');
         

        Route::get('/create',function()
        {
            return view('create');
        });

        Route::post('/post',[PostController::class,'store']);
        Route::delete('/delete/{id}',[PostController::class,'destroy']);
        Route::get('/edit/{id}',[PostController::class,'edit']);

        Route::delete('/deleteimage/{id}',[PostController::class,'deleteimage']);
        Route::delete('/deletecover/{id}',[PostController::class,'deletecover']);
        Route::put('/update/{id}',[PostController::class,'update']);

    });
});


Route::group(['middleware'=>['Student','auth','PreventBackHistory']],function(){
    
    
    Route::get('/bookingdata','App\Http\Controllers\BookingController@HouseBookingDetails');

    Route::get('/create',function()
    {
        return view('ManageHouseDetails.Owner.CreateHouse');
    });

    Route::post('/bookingdata/create',[BookingController::class,'store']);
    Route::get('/bookingdata/{id}/delete',[BookingController::class,'destroy']);
    Route::get('/bookingdata/{id}/edit',[BookingController::class,'EditHouseBookingDetails']);
    Route::post('/bookingdata/{id}/update',[BookingController::class,'update']);
    Route::get('/cancelled/{id}',[BookingController::class,'Cancel']);

    Route::get('add-booking/{house_id}/userbooking',[BookingController::class,'AddBooking']);
    Route::post('add-booking',[BookingController::class,'CreateBooking']);
    Route::get('/approved/{house_id}',[BookingController::class,'Approved']);

    Route::get('/list',[HouseController::class,'RentalHouseList']);
    Route::get('/housedata/{id}/edit',[HouseController::class,'ViewRentalHouse']);
    //Star Rating
    Route::post('add-rating',[HouseController::class,'add']);
    //Review
    Route::get('add-review/{house_id}/userreview',[HouseController::class,'AddReview']);
    Route::post('add-review',[HouseController::class,'CreateReview']);
    Route::get('edit-review/{house_id}/userreview',[HouseController::class,'EditReview']);
    Route::put('update-review',[HouseController::class,'UpdateReview']);

    //Profile
    Route::get('/studentprofile',[StudentController::class,'profile']);
    // Route::post('update-profile-info',[StudentController::class,'updateInfo'])->name('studentUpdateInfo');
    // Route::post('change-profile-picture',[StudentController::class,'updatePicture'])->name('studentPictureUpdate');
    // Route::post('change-password',[StudentController::class,'changePassword'])->name('studentChangePassword');

});


Route::group(['middleware'=>['Admin','auth','PreventBackHistory']],function(){

    // User Details
    Route::get('/userdata','App\Http\Controllers\UserController@UserDetails');
    Route::get('/userdata/{id}/edit','App\Http\Controllers\UserController@EditUserDetails');
    Route::post('/userdata/{id}/update','App\Http\Controllers\UserController@update');
    Route::get('/userdata/{id}/delete','App\Http\Controllers\UserController@delete');

    //Owner Approval
    Route::get('/ownerapprovalstatus',[OwnerAuthController::class,'OwnerApprovalAction']);
    Route::get('/success/{id}',[OwnerAuthController::class,'Approved']);
    Route::get('/rejected/{id}',[OwnerAuthController::class,'Rejected']);
    Route::get('/manageownersapproval',[OwnerAuthController::class,'ManageOwnersApproval']);
    Route::get('/manageownersapproval/{id}/delete',[OwnerAuthController::class,'DeleteOwner']);
    
    Route::delete('/manageownersapprovalDeleteAll', [OwnerAuthController::class, 'deleteAll']);

    //Rental House Rejection
    Route::get('/rentalhouserejection','App\Http\Controllers\HouseController@RentalHouseRejection');
    Route::get('/rentalhouserejection/{id}/delete','App\Http\Controllers\HouseController@removeHouseDetails');

    //Booking Report
    Route::get('/booking',[ReportController::class,'ViewBookingReport']);
    Route::get('/date',[ReportController::class,'filterdate']);
    Route::get('/generatePDF',[ReportController::class,'ViewReportPDF']);
    Route::get('/generatePDF/generate',[ReportController::class, 'generatePDF']);


    //Profile
    Route::get('/profile',[AdminController::class,'profile'])->name('adminprofile');
      
});


Route::middleware(['auth:ownerauth','PreventBackHistory'])->group(function(){

    Route::get('/addhouse','App\Http\Controllers\HouseController@index');

    Route::get('/create',function(){
        return view('ManageHouseDetails.Owner.CreateHouse');
    });

    Route::post('/house',[HouseController::class,'store']);
    Route::delete('/delete/{id}',[HouseController::class,'destroy']);
    Route::get('/edit/{id}',[HouseController::class,'edit']);
    Route::delete('/deleteimage/{id}',[HouseController::class,'deleteimage']);
    Route::delete('/deletehouse_picture/{id}',[HouseController::class,'deletehouse_picture']);
    Route::put('/update/{id}',[HouseController::class,'update']);

    Route::resource('owners', OwnerController::class);

    // Route::get('/ownerdata','App\Http\Controllers\OwnerController@OwnerApprovalStatus');
    Route::get('/owner-approval',[OwnerAuthController::class,'OwnerApprovalStatus']);

    //Booking Report
    Route::get('/bookingreport',[ReportController::class,'BookingReportDetails']);

    
    //Email
    Route::get('/emailview/{id}',[ReportController::class,'EmailView']);

    Route::post('/sendemail/{id}',[ReportController::class,'sendemail']);
 
    //Profile
    // Route::get('/profile',[OwnerAuthController::class,'profile'])->name('ownerauth.profile');
    Route::post('update-profile-info',[OwnerAuthController::class,'updateInfo'])->name('ownerUpdateInfo');
    Route::post('change-profile-picture',[OwnerAuthController::class,'updatePicture'])->name('ownerPictureUpdate');
    Route::post('change-ic-picture',[OwnerAuthController::class,'updateICPicture'])->name('ownerChangeICPicture');
    Route::post('change-password',[OwnerAuthController::class,'changePassword'])->name('ownerChangePassword');

});
