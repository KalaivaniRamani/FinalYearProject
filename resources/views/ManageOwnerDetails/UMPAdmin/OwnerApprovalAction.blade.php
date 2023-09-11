<!-- to be called inside the master.blade.php -->
@extends('layouts.adminDashboardStyle')

<head>
    <title>Approval Details | HRMS</title>
</head>

<style>  
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0.1)} 
        to {transform:scale(1)}
    }

    /* The Close Button */
    .imageclose {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .imageclose:hover,
    .imageclose:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* Responsive Columns */
    @media only screen and (max-width: 700px){
        .responsive {
            width: 49.99999%;
            margin: 6px 0;
        }
        .modal-content {
            width: 100%;
        }
    }

    @media only screen and (max-width: 500px){
        .responsive {
            width: 100%;
        }
    }

</style>


@section('content')

<div class="container">
  <div class="col-lg-12">
          <div class="table">
            <div class="table_header">
                <b><p>House Owner Details</p></b>
                <div>
                <a class="btn btn-primary" href="/manageownersapproval"> Manage Approval</a>
                </div>
            </div>
            <div class="table_section" class="table-wrapper-scroll-y custom-scrollbar">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Owner Name</th>
                            <th>Self Picture</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Owner IC</th>
                            <th>Status</th>
                            <th>Approval</th>
                        </tr>
                    </thead>
                    @foreach ($owners as $owner)
                    <tbody>
                        <tr>
                            <td>{{ $owner->id }}</td>
                            <td>{{ $owner->name }}</td>
                            <td><img src="{{ $owner->picture }}" class="img-fluid"  class="img"  style="display: block;margin-left: auto;margin-right: auto;" ></td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->contactNo }}</td>
                            <td><img src="images/ownerimages/{{ $owner->owner_ic }}"  class="img"  class="img-fluid" style="display: block;margin-left: auto;margin-right: auto;" ></td>
                            <td>{{ $owner->status }} </td>
                            <td>
                                <a class="btn btn-success" href="{{url('success',$owner->id)}}">Approve</a>
                                <a class="btn btn-danger" href="{{url('rejected',$owner->id)}}">Reject</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div>
            <br><p class="text_status"><b><span class="status text-warning">&bull;</span> Total Status (In the Progress): {{$progress}}</b></p> 
            <p class="text_status"><b><span class="status text-danger">&bull;</span> Total Status (Rejected): {{$reject}}</b></p> 
            <p class="text_status"><b><span class="status text-success">&bull;</span>Total Status (Approved): {{$accept}}</b></p> 
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="imageclose">×</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

@endsection('content')