@extends('layouts.layouts')
@section('content')

 <!-- End Navbar -->
 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  
                <h4 class="card-title">Assign Subject</h4>

                @if(session('subAssmessage'))
                    <div class="col-md-12 ">
                      <p class="alert alert-success mb-2">{{session('subAssmessage')}}</p>
                    </div>
                  @endif
                  @if(session('error'))
                    <div class="col-md-12 ">
                      <p class="alert alert-danger mb-2">{{session('error')}}</p>
                    </div>
                  @endif
                  @error('subject_id')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                  @enderror
                  @error('student_id')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                  @enderror
              </div>
              <div class="card-body">
                
              <form action="{{route('assign.subject.store')}}" method="POST">
                    @csrf
                  <div class="row justify-content-center ">

                    <div class="col-md-3 ">
                      <div class="form-group">
                        <select class="selectpicker" data-live-search="true" name="student_id">
                          <option value="">Select Student ID</option>
                          @foreach($users as $user)
                            @if($user->role == 'Admin' OR $user->role == 'Teacher')
                            @else
                              <option value="{{$user->id}}">{{$user->code}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 ">
                      <div class="form-group">
                        <select class="selectpicker" data-live-search="true" name="subject_id">
                          <option value="">Select Subject ID</option>
                        @foreach($subjects as $subject)
                          <option value="{{$subject->id}}">{{$subject->code}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>

                  </div>
                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Assign</button>
                    </div>
                  </div>
            </form>
            
              </div>
            </div>
          </div>
        </div>
      </div>

      <div style="margin-top: 220px;"></div>

@endsection