<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\House;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class ReportController extends Controller
{

    public function BookingReportDetails(){

        $house = House::all();

        $bookings = Booking::join('users', 'bookings.user_id', '=', 'users.id')
                            ->join('houses', 'houses.id', '=', 'bookings.house_id')
                            ->get();
                                                

        return view('ManageBookingReport/Owner/BookingReportDetails',compact('bookings','house'));
    }

    public function ViewBookingReport(){
        
        $bookings = Booking::join('users', 'bookings.user_id', '=', 'users.id')
                            ->join('houses', 'houses.id', '=', 'bookings.house_id')
                            ->get();
        
        return view('ManageBookingReport/UMPAdmin/ViewBookingReport', compact('bookings'));
    }

    public function filterdate(Request $request){
        
        $todayDate = Carbon::now()->format('Y-m-d');
        
        $bookings= Booking::join('users', 'bookings.user_id', '=', 'users.id')
                            ->join('houses', 'houses.id', '=', 'bookings.house_id')
                            ->when($request->date != null, function ($q) use ($request)
                            {
                                return $q->whereDate('booking_date', $request->date);
                            }, function ($q) use ($todayDate){

                                return $q->whereDate('booking_date',$todayDate);
                            })->paginate(10);

        return view('ManageBookingReport/UMPAdmin/ViewBookingReport',compact('bookings'));
    }

    public function EmailView($id)
    {
        $bookings=Booking::find($id);

        return view('ManageBookingReport/Owner/EmailView',compact('bookings'));
    }

    public function sendemail(Request $request,$id)
    {
        $bookings=Booking::find($id);
        $details=[
            'greeting'=> $request->greeting,
            'body'=> $request->body,
            'actiontext'=> $request->actiontext,
            'actionurl'=> $request->actionurl,
            'endpart'=> $request->endpart
        ];

        Notification::send($bookings,new SendEmailNotification($details));

        return redirect()->back()->with('status','Email send is successful');
    }

    public function ViewReportPDF(){
        
        $bookings = Booking::join('users', 'bookings.user_id', '=', 'users.id')
                            ->join('houses', 'houses.id', '=', 'bookings.house_id')
                            ->get();

        return view('ManageBookingReport/UMPAdmin/generatePDF',compact('bookings'));
    }

    public function generatePDF(){
        
        $bookings = Booking::join('users', 'bookings.user_id', '=', 'users.id')
                            ->join('houses', 'houses.id', '=', 'bookings.house_id')
                            ->get();

        $data = ['bookings' => $bookings];
        $pdf = Pdf::loadView('ManageBookingReport/UMPAdmin/generatePDF', $data);
        return $pdf->download('Report.pdf');
    }


}
