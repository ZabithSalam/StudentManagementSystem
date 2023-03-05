@extends('layouts.layouts')
@section('content')
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Update Student</h4>
                @if(session('msg'))
                  <div class="col-md-12 ">
                    <p class="alert alert-success mb-2">{{session('msg')}}</p>
                  </div>
                  @endif
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
              </div>
              <div class="card-body">

              <form method="POST" action="{{ route('update.user', $user->id) }}">
                        @csrf
                        @method('PUT')
                        
              <div class="modal-body">
              <h5 class="mt-5"><strong>Personal Info</strong></h6>

                  <div class="row">
                     <div class="form-group col-lg-4">
                       <label for="first_name" class="col-form-label">First Name</label>
                       <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
                     </div>
                     <div class="form-group col-lg-4">
                      <label for="last_name" class="col-form-label">Last Name</label>
                      <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                     </div>
                     <div class="form-group col-lg-4">
                      <label for="batch" class="col-form-label">Batch</label>
                      <input type="text" class="form-control" name="batch" value="{{$user->batch}}">
                     </div>
                     <div class="form-group col-lg-4">
                       <label for="gender" class="col-form-label">Gender</label>
                      <select  class="form-control" name="gender" >
                        <option value="{{$user->gender}}">{{$user->gender}}</option>
                        @if($user->gender == 'Male')
                        <option value="Female">Female</option>
                        @else
                        <option value="Male">Male</option>
                        @endif
                      </select>
                     </div>
                     <div class="form-group col-lg-4">
                      <label for="dob" class="col-form-label">DOB</label>
                      <input type="date" class="form-control" name="dob" value="{{$user->dob}}">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="nic" class="col-form-label">NIC</label>
                      <input type="text" class="form-control" name="nic" value="{{$user->nic}}">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">City</label>
                        <input type="text" class="form-control" name="city" value="{{$user->city}}">
                      </div>
                  </div>
                 
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <h5 class="mt-5"><strong>Change Password</strong></h6>

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
                        <button type="submit" class="btn btn-primary">Change password</button>
                </form>

                
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@endSection