@extends('layouts.layouts')
@section('content')
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Profile</h5>
              </div>  
              <div class="card-body">
                  @if(session('message'))
                  <div class="col-md-12 ">
                    <p class="alert alert-success mb-2">{{session('message')}}</p>
                  </div>
                  @endif
                  @if(session('message2'))
                  <div class="col-md-12 ">
                    <p class="alert alert-danger mb-2">{{session('message2')}}</p>
                  </div>
                  @endif
                  @if($errors->any())
                  <div class="col-md-12 ">
                      @foreach($errors->all() as $error)
                        <p class="alert alert-danger text-black">{{$error}}</p>
                      @endforeach
                  </div>
                  @endif
                <form action="/upload-photo/{{Auth::user()->id}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                        @method('PUT')
                  <div class="col-md-12 ">
                    <div class="form-group">
                       <!--Avatar-->
                       <div>
                        <div class="d-flex justify-content-center mb-4">
                        @if(!Auth::user()->photo == null)
                           
                            <img  id="img" class="img img-fluid img-thumbnail"  src="{{asset('storage/photos/'.Auth::user()->photo)}}" alt="" />

                        @else
                            <img  id="img" class="img  img-fluid img-thumbnail"  src="/assets/img/no-image-available.png" alt="" />
                        @endif
                        </div>
                        <div class="d-flex justify-content-center ">

                            <div class="btn btn-primary">
                                <label class="form-label text-white" for="imgInp" style="font-size: 20px;"><i class="fa fa-upload"></i></label>
                                <input type="file" class="profilePhoto"  id="imgInp" accept="image/*" name="photo" />
                                
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded" style="font-size: 11px;" >Save</button>

                        </div>

                    </div>

                </form>
                      @if(Auth::user()->role == 'Teacher')
                          <h5><strong>Teacher ID:</strong> {{Auth::user()->code}}</h6>
                         @elseif(Auth::user()->role == 'Student')
                          <h5><strong>Student ID:</strong> {{Auth::user()->code}}</h6>
                         @else
                          <h5><strong>Admin ID:</strong> {{Auth::user()->code}}</h6>
                      @endif

                       <p><strong>Role:</strong> {{Auth::user()->role}}</p> 

                       @if(Auth::user()->role == 'Teacher')

                        <p><strong>Teacher Name:</strong> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</p> 
                        <p><strong>Date Of Birth:</strong> {{Auth::user()->dob}}</p> 
                        <p><strong>City:</strong> {{Auth::user()->city}}</p> 
                        <p><strong>NIC:</strong> {{Auth::user()->nic}}</p> 
                        <p><strong>Gender:</strong> {{Auth::user()->gender}}</p> 
                        <p><strong>Subjects:</strong> <span style="background-color: rgb(65, 165, 73); padding: 4px; border-radius: 6px; color: #fff;">Science</span> <span style="background-color: rgb(65, 165, 73); padding: 4px; border-radius: 6px; color: #fff;">Maths</span> <span style="background-color: rgb(65, 165, 73); padding: 4px; border-radius: 6px; color: #fff;">English</span></p> 
                      
                        @elseif(Auth::user()->role == 'Student')
                       
                        <p><strong>Teacher Name:</strong> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</p> 
                        <p><strong>Date Of Birth:</strong> {{Auth::user()->dob}}</p> 
                        <p><strong>City:</strong> {{Auth::user()->city}}</p> 
                        <p><strong>NIC:</strong> {{Auth::user()->nic}}</p> 
                        <p><strong>Gender:</strong> {{Auth::user()->gender}}</p> 
                        <p><strong>Batch:</strong> {{Auth::user()->batch}}</p> 
                        <p><strong>Subjects:</strong> <span style="background-color: rgb(65, 165, 73); padding: 4px; border-radius: 6px; color: #fff;">Science</span> <span style="background-color: rgb(65, 165, 73); padding: 4px; border-radius: 6px; color: #fff;">Maths</span> <span style="background-color: rgb(65, 165, 73); padding: 4px; border-radius: 6px; color: #fff;">English</span></p> 
                        <p><strong>Marks:</strong> <a href="./marks.html">View</a></p> 

                       @else
                        <p><strong>Admin Name:</strong> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</p> 

                       @endif

                    </div>
                  </div>
                <form action="{{url('change-password')}}" method="POST">
                    @csrf
                  <div class="row">

                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label>Current-Password </label>
                        <input type="password" class="form-control" name="current_password"  placeholder="Current-Password" >
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label>New-Password</label>
                        <input type="password" class="form-control" name="password" placeholder="New-Password" >
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label>Confirm-Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm-Password" >
                      </div>
                    </div>

                  </div>
                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Change Password</button>
                    </div>
                  </div>
            </form>

            </div>
          </div>
        </div>
      </div>
@endsection