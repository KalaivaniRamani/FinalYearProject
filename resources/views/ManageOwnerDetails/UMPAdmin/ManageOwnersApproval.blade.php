<!-- to be called inside the master.blade.php -->
@extends('layouts.adminDashboardStyle')

<head>
    <title>Approval Details | UMP-HRMS</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
     
@section('content')
<div class="container">
  <div class="col-lg-12">
        <div class="table">
        <div class="table_header">
            <b><p>House Owner Details</p></b>
            <div>
            <button style="margin: 4px 2px; " class="btn btn-primary delete_all" data-url="{{ url('/manageownersapprovalDeleteAll') }}">Delete All Selected</button>
                
                <a class="btn btn-success" href="/ownerapprovalstatus"> Back</a>
            </div>
            
        </div>
        <div class="table_section" class="table-wrapper-scroll-y custom-scrollbar">
            <table>
                <thead>
                    <tr>
                        <th width="50px"><input type="checkbox" id="master"></th>
                        <th>Owner Name</th>
                        <th>Self Picture</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th style="background-color:black">Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($owners as $owner)
                <tbody>
                    <tr id="sid{{ $owner->id}}">
                        <td><input type="checkbox" class="sub_chk" data-id="{{$owner->id}}"></td>
                        <td>{{ $owner->name }}</td>
                        <td><img src="{{ $owner->picture}}"  style="max-height:100px; max-width:100px;display: block;margin-left: auto;margin-right: auto;"></td>
                        <td>{{ $owner->email }}</td>
                        <td>{{ $owner->contactNo }}</td>
                        <td style="background-color:#b3b3ff">{{ $owner->status }} </td>
                        <td>
                            <!-- <form action="{{ route('owners.destroy',$owner->id) }}" method="POST">
                
                                @csrf
                                @method('DELETE')
                    
                                <button type="submit" class="btn btn-danger" onClick = "return confirm('Are you sure you want to delete this data?')"><i class="material-icons" style="font-size:20px;color:black">delete</i></button>
                            </form> -->
                            <a href="manageownersapproval/{{$owner->id}}/delete" class="btn btn-danger" onClick = "return confirm('Are you sure you want to delete this data?')"><i class="material-icons" style="font-size:20px;color:black">delete</i></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    </div>  
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });

        $('.delete_all').on('click', function(e) {

            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  

            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  

                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  

                    var join_selected_values = allVals.join(","); 

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'id='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });

        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });

        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();

            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });

            return false;
        });
    });
</script>

@endsection('content')