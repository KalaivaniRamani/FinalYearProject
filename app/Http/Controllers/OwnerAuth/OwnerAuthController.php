<?php

namespace App\Http\Controllers\OwnerAuth;

use App\Models\User;
use App\Models\Owner;

use App\Models\Booking;
use App\Models\Ownerauth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OwnerAuthController extends Controller
{
    function create(Request $request){
          //Validate inputs
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:ownerauths,email',
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password',
             'contactNo'=>'required',
             'owner_ic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

        //   if ($image = $request->file('owner_ic')) 
        //   {
        //     $destinationPath = 'images/ownerimages/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['owner_ic'] = "$profileImage";
        // }
        
            /** Make avatar */

            $path = 'users/images/';
            $fontPath = public_path('fonts/Oliciy.ttf');
            $char = strtoupper($request->name[0]);
            $newAvatarName = random_int(12,34353).time().'_avatar.png';
            $dest = $path.$newAvatarName;

            $createAvatar = makeAvatar($fontPath,$dest,$char);
            $picture = $createAvatar == true ? $newAvatarName : '';

            /** Request all files */
            $ownerauth = new Ownerauth();
            $ownerauth->name = $request->name;
            $ownerauth->email = $request->email;
            $ownerauth->contactNo = $request->contactNo;
            $ownerauth->owner_ic =$request->owner_ic;
            $ownerauth->picture = $picture;

           /** Request for image */
            if($request->hasfile('owner_ic'))
            {
                $file=$request->file("owner_ic");
                $extension = $file->getClientOriginalExtension();
                $profileImage=time().'.'.$extension;
                $file->move('images/ownerimages/',$profileImage);
                $ownerauth->owner_ic = $profileImage;
            }

            $ownerauth->password = Hash::make($request->password);
            $save = $ownerauth->save();

            if( $save ){
                return redirect()->back()->with('success','You are now registered successfully');
            }else{
                return redirect()->back()->with('fail','Something went Wrong, failed to register');
            }
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:ownerauths,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exist.'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('ownerauth')->attempt($creds) ){
            return redirect()->route('ownerauth.dashboard');
        }else{
            return redirect()->route('ownerauth.login')->with('fail','Incorrect Credentials');
        }
    }

    public function OwnerIndex(){

        $house_owner =Ownerauth::count();
        $house_booking = Booking::count();
        $reject = Ownerauth::where('status','Rejected')->count();
        $approve = Ownerauth::where('status','Approved')->count();

        return view('ownerauth.dashboard',compact('house_owner','house_booking','reject','approve'));
    }


    function logout(){
        Auth::guard('ownerauth')->logout();
        return redirect('/');
    }

     // <!-- Owner Profile -->
     public function profile(){
        return view('ownerauth.OwnerProfile');
    }

    public function updateInfo(Request $request, Ownerauth $ownerauth){
           
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:ownerauths,email,'.Auth::user()->id,
            'contactNo'=>'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = Ownerauth::find(Auth::user()->id)->update([
                  'name'=>$request->name,
                  'email'=>$request->email,
                  'contactNo'=>$request->contactNo,
             ]);

             if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
             }else{
                 return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
             }
        }
    }

    public function updatePicture(Request $request){
        $path = 'users/images/';
        $file = $request->file('ownerprofile_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
        }else{
            //Get Old picture
            $oldPicture = Ownerauth::find(Auth::user()->id)->getAttributes()['picture'];

            if( $oldPicture != '' ){
                if( File::exists(public_path($path.$oldPicture))){
                    File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = Ownerauth::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
            }
        }
    }


    public function changePassword(Request $request){
        //Validate form
        $validator = Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if( !Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newpassword'=>'required|min:8|max:30',
            'cnewpassword'=>'required|same:newpassword'
        ],[
            'oldpassword.required'=>'Enter your current password',
            'oldpassword.min'=>'Old password must have atleast 8 characters',
            'oldpassword.max'=>'Old password must not be greater than 30 characters',
            'newpassword.required'=>'Enter new password',
            'newpassword.min'=>'New password must have atleast 8 characters',
            'newpassword.max'=>'New password must not be greater than 30 characters',
            'cnewpassword.required'=>'ReEnter your new password',
            'cnewpassword.same'=>'New password and Confirm new password must match'
        ]);

        if( !$validator->passes() ){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            
        $update = Ownerauth::find(Auth::user()->id)->update(['password'=>Hash::make($request->newpassword)]);

        if( !$update ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
        }else{
            return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
        }
        }
    }

    public function updateICPicture(Request $request){
        $destinationPath = 'images/ownerimages/';
        $image = $request->file('owner_ic');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new IC image
        $upload = $image->move(public_path($destinationPath), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new IC picture failed.']);
        }else{
            //Get Old picture
            $oldPicture = Ownerauth::find(Auth::user()->id)->getAttributes()['owner_ic'];

            if( $oldPicture != '' ){
                if( File::exists(public_path($image.$oldPicture))){
                    File::delete(public_path($image.$oldPicture));
                }
            }

            //Update DB
            $update = Ownerauth::find(Auth::user()->id)->update(['owner_ic'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating IC picture in db failed.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your IC picture has been updated successfully']);
            }
        }
    }

    public function OwnerApprovalStatus(){
        $owners =\App\Models\Ownerauth::all();

        return view('ManageOwnerDetails/Owner/OwnerApprovalStatus',['owners'=> $owners]);
        
    }

    // MANAGE HOUSE OWNER DETAILS (Admin)

    public function OwnerApprovalAction(){
        $owners =\App\Models\Ownerauth::all();

        $progress = \App\Models\Ownerauth::where('status','In the Progress')->count();
        $reject = \App\Models\Ownerauth::where('status','Rejected')->count();
        $accept = \App\Models\Ownerauth::where('status','Approved')->count();


        return view('ManageOwnerDetails/UMPAdmin/OwnerApprovalAction',compact('owners','progress','reject','accept'));
    }

    public function Approved($id)
    {

        $owners=Ownerauth::find($id);

        $owners->status='Approved';

        $owners->save();

        return redirect()->back();
    }

    public function Rejected($id)
    {

        $owners=Ownerauth::find($id);

        $owners->status='Rejected';

        $owners->save();

        return redirect()->back();
    }

    public function ManageOwnersApproval(){
        // $owners =\App\Models\Ownerauth::all();
        $owners =\App\Models\Ownerauth::where('status','Rejected')->get();

        return view('ManageOwnerDetails/UMPAdmin/ManageOwnersApproval',compact('owners'));
    }


    public function DeleteOwner($id){
        // $owners = Ownerauth::find($id);
        // $owners -> delete($owners);
        $owners = Ownerauth::leftJoin('houses','ownerauths.id', '=','houses.owner_id')
                            ->where('ownerauths.id', $id); 
        House::where('owner_id', $id)->delete();                           
        $owners->delete();

        return redirect('/manageownersapproval')->with('status','Data Successfully Deleted');
    }

    public function deleteAll(Request $request)
    {
        // Ownerauth::whereIn('id',explode(",",$ids))->delete();

        $id = $request->id;
        Ownerauth::leftJoin('houses','ownerauths.id', '=','houses.owner_id')
                ->whereIn('ownerauths.id',explode(",",$id))->delete();
        House::whereIn('owner_id', explode(",",$id))->delete();

        return response()->json(['success'=>"Data Successfully Deleted."]);
    }

    
}
