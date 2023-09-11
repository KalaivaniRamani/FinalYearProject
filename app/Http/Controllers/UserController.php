<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome(){
        $houseimage = House::all();
        $single= House::where('house_type','Single Story','house_picture')->take(3)->get();
        $double= House::where('house_type','Double Story')->take(3)->get();
        
        return view('welcome',compact('houseimage','single','double'));
    }

    public function UserDetails(){
        $data_user =\App\Models\User::all();

        return view('ManageUser/Admin/UserDetails',['data_user'=> $data_user]);
    }

    public function EditUserDetails($id ){
        $data_user = \App\Models\User::find($id);
        return view('ManageUser/Admin/EditUserDetails',['data_user'=>$data_user]);
    }

    public function update(Request $request,$id){
        $data_user = \App\Models\User::find($id);
        $data_user -> update($request->all());

        return redirect('/userdata')->with('status','Data Successfully Updated');
}

    public function delete($id){
        $data_user = \App\Models\User::find($id);
        $data_user -> delete($data_user);

        return redirect('/userdata')->with('status','Data Successfully Deleted');
    }

    
}