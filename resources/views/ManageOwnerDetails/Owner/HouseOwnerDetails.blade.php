<!-- to be called inside the master.blade.php -->
@extends('layouts.ownerDashboardStyle')

<head>
    <title>House Owner Details | HRMS</title>
</head>
     
@section('content')

<div class="container">
  <div class="col-lg-12">
        <div class="table">
            <div class="table_header">
                <b><p>House Owner Details</p></b>
                <div>
                    <button  class="add_new" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Add Details
                    </button>
                    <a class="add_new" href="/ownerdata"> Approval</a>
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
                            <th>Contact Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    @foreach ($owners as $owner)
                    <tbody>
                        <tr>
                            <td>{{ $owner->id }}</td>
                            <td>{{ $owner->owner_name }}</td>
                            <td><img src="images/ownerimages/{{ $owner->owner_picture }}"  style="display: block;margin-left: auto;margin-right: auto;"></td>
                            <td>{{ $owner->owner_email }}</td>
                            <td>{{ $owner->contact_no }}</td>
                            <td>
                                <form action="{{ route('owners.destroy',$owner->id) }}" method="POST">
                    
                                    <a class="btn btn-primary" href="{{ route('owners.edit',$owner->id) }}"><i class="fa fa-edit" style="font-size:19px;color:black"></i></a>
                    
                                    @csrf
                                    @method('DELETE')
                        
                                    <button type="submit" class="btn btn-danger" onClick = "return confirm('Are you sure you want to delete this data?')"><i class="material-icons" style="font-size:20px;color:black">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            {!! $owners->links() !!}
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

            <form action="{{ route('owners.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}    
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Owner Name</label>
                    <input name="owner_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Name" required="">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email Address</label>
                    <input name="owner_email" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Matric No" required="">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                    <input name="contact_no" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Address" required="">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Self Picture (only 1)</label>
                <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="owner_picture">
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