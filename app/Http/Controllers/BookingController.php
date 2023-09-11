<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\House;
use App\Models\Ownerauth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Command\WhereamiCommand;

class BookingController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function HouseBookingDetails()
    {
        // $bookings =Booking::all();
        // $house = House::all();

        $bookings = Booking::join('users', 'bookings.user_id', '=', 'users.id')
        ->join('houses', 'houses.id', '=', 'bookings.house_id')
        ->get();


        return view('ManageHouseBooking/Student/HouseBookingDetails',compact('bookings'));
    }

    public function Cancel($id)
    {   
        // Update the status of the house
        $booking=House::find($id);

        $booking->booking_status='Vacant';

        $booking->save();

        // Delete related data from booking table
        Booking::where('house_id', $id)->delete();

        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $booking =new Booking([
            "owner_id" =>Auth::id(),
            "owner_name" =>$request->owner_name,
            "name" =>Auth::user()->name,
            "email"=>Auth::user()->email,
            "location" =>$request->location,
            "booking_date" =>$request->booking_date,
            
        ]);
        $booking->save();


        return redirect("/bookingdata");

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function EditHouseBookingDetails($id)
    {
       $bookings=Booking::findOrFail($id);
       $owner = Ownerauth::all();


       return view('ManageHouseBooking/Student/EditHouseBookingDetails',compact('bookings','owner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     $booking=Booking::findOrFail($id);
   

        $booking->update([
            "name" =>$request->name,
            "email"=>$request->email,
            "owner_name" =>$request->owner_name,
            "location" =>$request->location,
            "booking_date" =>$request->booking_date,
        ]);

        return redirect("/bookingdata");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $bookings=Booking::findOrFail($id);

         
         $bookings->delete();
         return back();
    }

    public function AddBooking($house_id)
    {
        $house = House::where('id',$house_id)->first();

        $house_id = $house->id;
        $booking = Booking::where('user_id', Auth::id())->where('house_id', $house_id)->first();
        
        return view('ManageHouseDetails/Student/Booking', compact('booking','house'));
            
    }

    public function CreateBooking(Request $request)
    {
        
        $house_id = $request->input('house_id');
        $house = House::where('id', $house_id)->first();

        
        $booking_date = $request->input('booking_date');
        $new_booking = Booking::create([
            'user_id' => Auth::id(),
            'email'=> Auth::user()->email,
            'house_id' => $house_id,
            'booking_date' => $booking_date,
        ]);

        // Change booking status
        $booking=House::find($house_id);

        $booking->booking_status='Booked';

        $booking->save();

        return redirect("/list")->with('status', "Thank you for booking ");
        // return redirect()->back()->with('status', "Thank you for booking ");
    }
}
