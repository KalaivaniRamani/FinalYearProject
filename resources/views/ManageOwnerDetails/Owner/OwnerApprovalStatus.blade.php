<!-- to be called inside the master.blade.php -->
@extends('layouts.ownerDashboardStyle')

<head>
    <title>Approval Status | UMP-HRMS</title>

</head>
     
@section('content')


<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Attention!</strong> Please update your profile picture by clicking on the "Profile" option on the top right corner in the drop down list of your page to make sure the Admin approve your identity.
</div>

<div class="container">
  <div class="col-lg-12">
          <div class="table">
            <div class="table_header">
                <b><p>Approval Status</p></b>
                <div>
                <!-- <a class="add_new" href="/owners"> Back</a> -->
                </div>
            </div>
            <div class="table_section" class="table-wrapper-scroll-y custom-scrollbar">
                <table>
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Owner Name</th>
                            <th>Self Picture</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Status</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    @foreach ($owners as $owner)
                        @if($owner->id == Auth::id())
                    <tbody>
                        <tr>
                            <!-- <td>{{ $owner->id }}</td> -->
                            <td>{{ $owner->name }}</td>
                            <td><img src="{{ $owner->picture}}"  style=" display: block;margin-left: auto;margin-right: auto;"></td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->contactNo }}</td>
                            <td>{{ $owner->status }} </td>
                            <!-- <td>
                                <a class="btn btn-success" href="{{url('approved',$owner->id)}}">Approve</a>
                                <a class="btn btn-danger" href="{{url('cancelled',$owner->id)}}">Cancel</a>
                            </td> -->
                        </tr>
                    </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection('content')