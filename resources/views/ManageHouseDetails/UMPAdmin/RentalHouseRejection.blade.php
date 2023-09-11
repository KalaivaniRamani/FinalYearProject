<!-- to be called inside the master.blade.php -->
@extends('layouts.adminDashboardStyle')

<head>
    <title>Rental House Details | HRMS</title>
</head>

@section('content')

<div class="container">
  <div class="col-lg-12">
        <div class="table">
        <div class="table_header">
            <b><p>Rental House Details</p></b>
        </div>
        <div class="table_section" class="table-wrapper-scroll-y custom-scrollbar">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Owner Name</th>
                        <th>Distance From UMP (km)</th>
                        <th>Location</th>
                        <th>House Picture</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($houses as $house)
                <tbody>
                    <tr>
                        <td>{{ $house->id }}</td>
                        <td>{{ $house->owner_name }}</td>
                        <td>{{ $house->distance }}</td>
                        <td>{{ $house->location }}</td>
                        <td><img src="house_picture/{{ $house->house_picture }}" class="img-responsive" style="max-height:100px; max-width:100px;display: block;margin-left: auto;margin-right: auto;" alt="" srcset=""></td>
                        <td>
                            <a href="rentalhouserejection/{{$house->id}}/delete" class="btn btn-danger" onClick = "return confirm('Are you sure you want to delete this data?')"><i class="material-icons" style="font-size:20px;color:black">delete</i></a>
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