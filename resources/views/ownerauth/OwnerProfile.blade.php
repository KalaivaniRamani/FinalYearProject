@extends('layouts.ownerDashboardStyle')

<head>
    <base href="{{ \URL::to('/') }}">
</head>


@section('content')

<head>  
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/dashboard/css/style.default.css" id="theme-stylesheet">
</head>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/ownerauth/dashboard">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid" >
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline shadow-lg p-3 mb-3 bg-white" style="border-radius: 6px;">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle ownerprofile_picture" src="{{ Auth::user()->picture }}" alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center owner_name">{{Auth::user()->name}}</h3>
  
                  <p class=" text-center">House Owner</p>

                  <input type="file" name="ownerprofile_image" id="ownerprofile_image" style="opacity: 0;height:1px;display:none">
                  <a href="javascript:void(0)" class="btn btn-profile btn-block" id="change_picture_btn"><b>Change picture</b></a>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="profile-card shadow">
                <div class="profile-card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="profile-nav-link active" href="#personal_info" data-toggle="tab">Personal Information</a></li>
                    <li class="nav-item"><a class="profile-nav-link" href="#change_password" data-toggle="tab">Change Password</a></li>
                    <li class="nav-item"><a class="profile-nav-link" href="#change_icpicture" data-toggle="tab">Change IC Picture</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <form class="form-horizontal" method="POST" action="{{ route('ownerUpdateInfo') }}" id="OwnerInfoForm" enctype="multipart/form-data">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label" style="color: black;">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}" name="name">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label" style="color: black;">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputContactNumber" class="col-sm-2 col-form-label" style="color: black;">Contact Number</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputContactNumber" placeholder="Contact No" value="{{ Auth::user()->contactNo }}" name="contactNo">
                            <span class="text-danger error-text contactNo_error"></span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="savebutton">Save Changes</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane(change_password) -->
                    <div class="tab-pane" id="change_password">
                        <form class="form-horizontal" action="{{ route('ownerChangePassword') }}" method="POST" id="changePasswordOwnerForm">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label" style="color: black;">Old Passord</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputName" placeholder="Enter current password" name="oldpassword">
                              <span class="text-danger error-text oldpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label" style="color: black;">New Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                              <span class="text-danger error-text newpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label" style="color: black;">Confirm New Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="savebutton">Update Password</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    <!-- /.end tab-pane(change_password) -->

                    <!-- /.tab-pane(change_ic Picture) -->
                    <div class="tab-pane" id="change_icpicture">
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label for="inputICPicture" class="col-sm-2 col-form-label" style="color: black;">IC Picture</label>
                          <div class="col-sm-10">
                            <img class="owner_icpicture" src="/images/ownerimages/{{ Auth::user()->owner_ic }}" alt="User IC picture" style="max-height: 200px; max-width: 200px;border-radius: 8px;border: 6px solid #ddd;">
                            <input type="file" name="owner_ic" id="owner_ic" style="opacity: 0;height:1px;display:none">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <a href="javascript:void(0)" class="savebutton" id="change_icpicture_btn"><b>Change picture</b></a>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.end tab-pane(change_ic Picture) -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
  <!-- Profile -->
    <!-- jQuery -->
    <script src="ProfileDesign/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="ProfileDesign/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('ProfileDesign/plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="ProfileDesign/dist/js/adminlte.min.js"></script>

    {{-- CUSTOM JS CODES --}}
    <script>

      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
      });
      
      $(function(){

        /* UPDATE ADMIN PERSONAL INFO */

        $('#OwnerInfoForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
              url:$(this).attr('action'),
              method:$(this).attr('method'),
              data:new FormData(this),
              processData:false,
              dataType:'json',
              contentType:false,
              beforeSend:function(){
                  $(document).find('span.error-text').text('');
              },
              success:function(data){
                    if(data.status == 0){
                      $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                      });
                    }else{
                      $('.owner_name').each(function(){
                        $(this).html( $('#OwnerInfoForm').find( $('input[name="name"]') ).val() );
                      });
                      alert(data.msg);
                    }
              }
            });
        });



        $(document).on('click','#change_picture_btn', function(){
          $('#ownerprofile_image').click();
        });


        $('#ownerprofile_image').ijaboCropTool({
              preview : '.ownerprofile_picture',
              setRatio:1,
              allowedExtensions: ['jpg', 'jpeg','png'],
              buttonsText:['CROP','QUIT'],
              buttonsColor:['#30bf7d','#ee5155', -15],
              processUrl:'{{ route("ownerPictureUpdate") }}',
              // withCSRF:['_token','{{ csrf_token() }}'],
              onSuccess:function(message, element, status){
                alert(message);
              },
              onError:function(message, element, status){
                alert(message);
              }
          });

          $(document).on('click','#change_icpicture_btn', function(){
          $('#owner_ic').click();
        });


        $('#owner_ic').ijaboCropTool({
              preview : '.owneric_picture',
              setRatio:1,
              allowedExtensions: ['jpg', 'jpeg','png'],
              buttonsText:['CROP','QUIT'],
              buttonsColor:['#30bf7d','#ee5155', -15],
              processUrl:'{{ route("ownerChangeICPicture") }}',
              // withCSRF:['_token','{{ csrf_token() }}'],
              onSuccess:function(message, element, status){
                alert(message);
              },
              onError:function(message, element, status){
                alert(message);
              }
          });


        $('#changePasswordOwnerForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                  $(document).find('span.error-text').text('');
                },
                success:function(data){
                  if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                      $('span.'+prefix+'_error').text(val[0]);
                    });
                  }else{
                    $('#changePasswordOwnerForm')[0].reset();
                    alert(data.msg);
                  }
                }
            });
        });

        
      });
      
</script>

@endsection
