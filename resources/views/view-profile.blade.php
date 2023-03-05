@extends('layouts.layouts')
@section('content')
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Profile</h5>
                @if(session('deleted'))
                    <div class="col-md-12 ">
                      <p class="alert alert-success mb-2">{{session('deleted')}}</p>
                    </div>
                  @endif
              </div>  
              <div class="card-body">
                  <div class="col-md-12 ">
                    <div class="form-group">

                       <!--Avatar-->
                       <div>
                        <div class="d-flex  mb-4">
                        @if(!$user->photo == null)
                           
                            <img  id="img" class="img img-fluid img-thumbnail"  src="{{asset('storage/photos/'.$user->photo)}}" alt="" />

                        @else
                            <img  id="img" class="img  img-fluid img-thumbnail"  src="/assets/img/no-image-available.png" alt="" />
                        @endif
                        </div>
                       </div>

                      @if($user->role == 'Teacher')
                          <h5><strong>Teacher ID:</strong> {{$user->code}}</h6>
                         @else
                          <h5><strong>Student ID:</strong> {{$user->code}}</h6>
                      @endif

                       <p><strong>Role:</strong> {{$user->role}}</p> 

                       @if($user->role == 'Teacher')

                        <p><strong>Teacher Name:</strong> {{$user->first_name}} {{$user->last_name}}</p> 
                   
                        @else
                       
                        <p><strong>Student Name:</strong> {{$user->first_name}} {{$user->last_name}}</p> 
                        <p><strong>Date Of Birth:</strong> {{$user->dob}}</p> 
                        <p><strong>City:</strong> {{$user->city}}</p> 
                        <p><strong>NIC:</strong> {{$user->nic}}</p> 
                        <p><strong>Gender:</strong> {{$user->gender}}</p> 
                        <p><strong>Batch:</strong> {{$user->batch}}</p> 
                        <p><strong>Marks:</strong> <a href="./marks.html">View</a></p> 
                     
                       @endif

                    </div>
                  <h5 class="mt-5"><strong>Subjects</strong></h6>
                  <table class="table table-striped table-bordered" style="width:100%">
                    <thead class=" text-primary">
                      <th>
                        Subject-ID
                      </th>
                      <th>
                        Subject Name
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                      @foreach($assignSubjects as $assignSubject)
                      @if($assignSubject->user->id == $user->id)
                        <tr>
                          <td>
                            {{$assignSubject->subject->code}}
                          </td>
                          <td>
                            {{$assignSubject->subject->subject}}
                          </td>
                          <td class="text-nowrap">
                              <form method="POST" action="{{route('assign.subject.destroy', $assignSubject->id)}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger show_confirm_delete"><i class="fa fa-trash"></i></button>
                            </form>
                          </td>
                        </tr>
                        @endif
                        
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection