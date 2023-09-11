<!-- to be called inside the master.blade.php -->
@extends('layouts.studentDashboardStyle')

<head>
    <title>Student Details | HRMS</title>
</head>

@section('content')

<div class="container">
  <div class="col-lg-12">
          <div class="table">
            <div class="table_header">
                <b><p>Student Details</p></b>
                <div>
                    <button  class="add_new" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Add Details
                    </button>
                </div>
            </div>
            <div class="table_section" class="table-wrapper-scroll-y custom-scrollbar">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Matric No</th>
                            <th>Student Email</th>
                            <th>Contact No</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    @foreach($data_student as $student)
                    <tbody>
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->std_name}}</td>
                            <td>{{$student->matric_no}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->std_contactNo}}</td>
                            <td>
                                
                            <a href="studentdata/{{$student->id}}/edit" class="btn btn-success"><i class="fa fa-edit" style="font-size:19px;color:black"></i></a>
                            <a href="studentdata/{{$student->id}}/delete" class="btn btn-danger" onClick = "return confirm('Are you sure you want to delete this data?')"><i class="material-icons" style="font-size:20px;color:black">delete</i></a>
                            </td>
                        </tr>
                    </tbody>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

            <form action="/studentdata/create" method="POST">
                {{csrf_field()}}    
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Student Name</label>
                    <input name="std_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Name" required="">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Matric No</label>
                    <input name="matric_no" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Matric No" required="">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Student Email</label>
                    <input name="email" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Email Address" required="">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact No</label>
                    <input name="std_contactNo" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Input Contact No" required="">
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



