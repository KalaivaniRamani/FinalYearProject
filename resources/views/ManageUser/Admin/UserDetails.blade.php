<!-- to be called inside the master.blade.php -->
@extends('layouts.adminDashboardStyle')

<head>
    <title>User Details | HRMS</title>
</head>

@section('content')

<div class="container">
  <div class="col-lg-12">
          <div class="table">
            <div class="table_header">
                <b><p>User Details</p></b>
                <div>
                    <!-- <button  class="add_new" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Add Details
                    </button> -->
                </div>
            </div>
            <div class="table_section" class="table-wrapper-scroll-y custom-scrollbar">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Student ID</th>
                            <th>Profile</th>
                            <th>Email</th>
                            <th>Role ( 1 = Admin, 2 = Student )</th>
                            <th>Contact No</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    @foreach($data_user as $user)
                    <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->studentId}}</td>
                            <td><img src="{{ $user->picture}}"  style="max-height:100px; max-width:100px;display: block;margin-left: auto;margin-right: auto;"></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>                        
                            <td>{{$user->contactNo}}</td>
                            <td>
                            <a href="userdata/{{$user->id}}/edit" class="btn btn-success"><i class="fa fa-edit" style="font-size:19px;color:black"></i></a>
                            <a href="userdata/{{$user->id}}/delete" class="btn btn-danger" onClick = "return confirm('Are you sure you want to delete this data?')"><i class="material-icons" style="font-size:20px;color:black">delete</i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
        
@endsection('content')



