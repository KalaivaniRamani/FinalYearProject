<!-- to be called inside the master.blade.php -->
@extends('layouts.ownerDashboardStyle')

<head>
    <title>Rental House Details | HRMS</title>
</head>

@section('content')

<div class="container">
  <div class="col-lg-12">
        <div class="table">
            <div class="table_header">
                <b><p>Rental House Details</p></b>
                <div>
                    <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Add Details
                    </button>
                </div>
            </div>
            <div class="table_section" class="table-wrapper-scroll-y custom-scrollbar">
                <table>
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Owner Name</th>
                            <th>Distance From UMP (KM)</th>
                            <th>Price (RM)</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>House Picture</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($houses as $house)
                        @if($house->owner_id == Auth::id())
                    <tbody>
                        <tr>
                            <!-- <td>{{ $house->id }}</td> -->
                            <td>{{ $house->owner_name }}</td>
                            <td>{{ $house->distance }}</td>
                            <td>{{ $house->rental_price }}</td>
                            <td>{{ $house->house_type }}</td>
                            <td>{{ $house->location }}</td>
                            <td><img src="house_picture/{{ $house->house_picture }}" style="max-height:100px; max-width:100px;display: block;margin-left: auto;margin-right: auto; " alt="" srcset=""></td>
                            <td>
                                <a href="/edit/{{ $house->id }}" class="btn btn-success"><i class="fa fa-edit" style="font-size:19px;color:black"></i></a>
                                <form action="/delete/{{ $house->id }}" method="post">
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?');" type="submit"><i class="material-icons" style="font-size:20px;color:black">delete</i></a>
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
            

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add House Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

            <form action="/house" method="post" enctype="multipart/form-data">
                {{csrf_field()}}    
                <!-- <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Owner Name</label>
                    <input name="owner_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Name" required="">
                </div> -->

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Estimated Distance From UMP (KM)</label>
                    <input name="distance" type="float" class="form-control" id="exampleFormControlInput1" placeholder="Ex:23.33" required="">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Rental Price (RM)</label>
                    <input name="rental_price" type="float" class="form-control" id="exampleFormControlInput1" placeholder="Ex: 700" required="">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">House Type</label>
                        <select name="house_type" class="form-select" aria-label="house_type" id="exampleFormControlInput1" required="">
                            <option selected disabled>--Select House Type--</option>
                            <option value="Single Story">Single Story</option>
                            <option value="Double Story">Double Story</option>                                               
                        </select>
                    </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <!-- <div>
                        <iframe class="mb-4 mb-lg-0" src="https://maps.google.com/maps?q=Universiti%20Malaysia%20Pahang%2026600%20Pekan%20Pahang,%20Malaysia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 80%; height: 184px;" allowfullscreen></iframe>
                    </div><br> -->
                    <input name="location" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Address" required="">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">House Picture (only 1)</label>
                <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="house_picture" required="">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">House Interior Pictures (many pictures)</label>
                <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple required="">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection('content')