<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\House;
use App\Models\Image;
use App\Models\Rating;
use App\Models\Review;
use App\Models\HouseImage;
use App\Models\Ownerauth;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use PHPUnit\Runner\Hook;

class HouseController extends Controller
{
    
    //House Owner
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses=House::all();
        return view('ManageHouseDetails.Owner.RentalHouseDetails')->with('houses',$houses);
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
        if($request->hasFile("house_picture")){
            $file=$request->file("house_picture");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("house_picture/"),$imageName);

            $house =new House([
                "owner_name" =>Auth::user()->name,
                "owner_id" =>Auth::id(),
                "owner_status" =>Auth::user()->status,
                "distance" =>$request->distance,
                "rental_price"=>$request->rental_price,
                "house_type"=>$request->house_type,
                "location" =>$request->location,
                "house_picture" =>$imageName,
            ]);
           $house->save();
        }

            if($request->hasFile("images")){
                $files=$request->file("images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['house_id']=$house->id;
                    $request['image']=$imageName;
                    $file->move(\public_path("/images"),$imageName);
                    Image::create($request->all());

            }
            }

            return redirect("/addhouse");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $houses=House::findOrFail($id);
        return view('ManageHouseDetails.Owner.EditRentalHouseDetails')->with('houses',$houses);
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
     $house=House::findOrFail($id);
     if($request->hasFile("house_picture")){
         if (File::exists("house_picture/".$house->house_picture)) {
             File::delete("house_picture/".$house->house_picture);
         }
         $file=$request->file("house_picture");
         $house->house_picture=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/house_picture"),$house->house_picture);
         $request['house_picture']=$house->house_picture;
     }

        $house->update([
            "owner_name" =>$request->owner_name,
            "distance" =>$request->distance,
            "rental_price" =>$request->rental_price,
            "house_type" =>$request->house_type,
            "location" =>$request->location,
            "house_picture"=>$house->house_picture,
        ]);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request["house_id"]=$id;
                $request["image"]=$imageName;
                $file->move(\public_path("images"),$imageName);
                Image::create($request->all());

            }
        }

        return redirect("/addhouse");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $houses=House::findOrFail($id);

         if (File::exists("house_picture/".$houses->house_picture)) {
             File::delete("house_picture/".$houses->house_picture);
         }
         $images=Image::where("house_id",$houses->id)->get();
         foreach($images as $image){
         if (File::exists("images/".$image->image)) {
            File::delete("images/".$image->image);
        }
         }
         $houses->delete();
         return back();


    }

    public function deleteimage($id){
        $images=Image::findOrFail($id);
        if (File::exists("images/".$images->image)) 
        {
           File::delete("images/".$images->image);
        }

       Image::find($id)->delete();
       return back();
   }

    public function deletehouse_picture($id){
        $house_picture=House::findOrFail($id)->house_picture;
        if (File::exists("house_picture/".$house_picture)) 
        {
        File::delete("house_picture/".$house_picture);
        }
        return back();
    }

    //UMP Admin

    public function RentalHouseRejection(){
        $houses =\App\Models\House::all();

        return view('ManageHouseDetails/UMPAdmin/RentalHouseRejection',['houses'=> $houses]);
    }

    public function removeHouseDetails($id){
        $houses = \App\Models\House::find($id);
        $houses -> delete($houses);

        return redirect('/rentalhouserejection')->with('status','Data Successfully Deleted');
    }

    //Student
    public function RentalHouseList(Request $request){
        $rental_house =House::all()->where('booking_status', '=','Vacant');
        
        if($request->get('sort') == "less_than_10")
        {
            $rental_house = House::all()->whereBetween('distance', [0,10]);
        }
        elseif($request->get('sort')  == "less_than_20"){
            $rental_house = House::all()->whereBetween('distance', [0,20]);
        }
        elseif($request->get('sort')  == "less_than_30"){
            $rental_house = House::all()->whereBetween('distance', [0,30]);
        }
        elseif($request->get('sort')  == "less_than_40"){
            $rental_house = House::all()->whereBetween('distance', [0,40]);
        }
        elseif($request->get('sort')  == "less_than_50"){
            $rental_house = House::all()->whereBetween('distance', [0,50]);
        }
        elseif($request->get('sort')  == "more_than_50"){
            $rental_house = House::all()->where('distance', '>', 50);
        }
        else{
            $rental_house =House::all()->where('booking_status', '=','Vacant');
        }

        return view('ManageHouseDetails.Student.RentalHouseList',compact('rental_house'));
    }

    public function ViewRentalHouse($id ){
        $house_details = \App\Models\House::find($id);
        $ratings = Rating::where('house_id', $house_details->id)->get();
        $rating_sum = Rating::where('house_id', $house_details->id)->sum('stars_rated');
        $user_rating = Rating::where('house_id', $house_details->id)->where('user_id',Auth::id())->first();
        $reviews = Review::where('house_id', $house_details->id)->get();
        
        if($ratings->count() > 0)
        {
            $rating_value = $rating_sum/$ratings->count();
        }
        else{
            $rating_value = 0;
        }
        return view('ManageHouseDetails/Student/ViewRentalHouse',compact('house_details','ratings','rating_value','user_rating','reviews'));
    }

    public function ViewDetails(Request $request,$id){
        $house_details = \App\Models\House::find($id);
        $house_details -> update($request->all());

        return redirect('/housedata')->with('status','Data Successfully Updated');
    }

    // student rating
    public function add(Request $request){
        
        $stars_rated = $request->input('house_rating');
        $house_id = $request->input('house_id');

        // $house_check = House::where('id', $house_id)->get();

        $existing_rating = Rating::where('user_id', Auth::id())->where('house_id',$house_id)->first();
        if($existing_rating)
        {
            $existing_rating-> stars_rated = $stars_rated;
            $existing_rating->update();
        }
        else
        {
            Rating::create([
                'user_id' => Auth::id(),
                'house_id' => $house_id,
                'stars_rated' => $stars_rated
            ]);
        }
        return redirect()->back()->with('status', "Thank you for rating this house");
    }

    //Student Review
    public function AddReview($house_id)
    {
        $house = House::where('id',$house_id)->first();

        if($house)
        {
            $house_id = $house->id;
            $review = Review::where('user_id', Auth::id())->where('house_id', $house_id)->first();
            
            if($review)
            {
                return view('ManageHouseDetails/Student/EditReviews', compact('review','house'));
            }
            else
            {
                return view('ManageHouseDetails/Student/Reviews', compact('house'));
            }

        }
        else
        {
            return redirect()->back()->with('status', "The link you followed was broken");
        }

    }

    public function CreateReview(Request $request)
    {
        $house_id = $request->input('house_id');
        $house = House::where('id', $house_id)->first();

        if($house)
        {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'house_id' => $house_id,
                'user_review' => $user_review
            ]);
            return redirect()->back()->with('status', "Thank you for writting a review ");
        }
        else
        {
            return redirect()->back()->with('status', "The link you followed was broken");
        } 

    }

    public function EditReview($house_id)
    {
        $house = House::where('id',$house_id)->first();

        if($house)
        {
            $house_id = $house->id;
            $review = Review::where('user_id', Auth::id())->where('house_id', $house_id)->first();

            if($review)
            {
                return view('ManageHouseDetails/Student/EditReviews', compact('review','house'));
            }
            else
            {
                return redirect()->back()->with('status', "The link you followed was broken");
            }
        }
        else
        {
            return redirect()->back()->with('status', "The link you followed was broken");
        }      

    }

    public function UpdateReview(Request $request)
    {
        $user_review = $request->input('user_review');
        
        if($user_review != '')
        {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();

            if($review)
            {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('housedata/'.$review->house->id.'/'.'edit')->with('status', "Review Updated successfully");

            }
            else
            {
                return redirect()->back()->with('status', "The link you followed was broken");
            }
        }
        else
        {
            return redirect()->back()->with('status', "You cannot submit an empty review");
        }           
    }

}
