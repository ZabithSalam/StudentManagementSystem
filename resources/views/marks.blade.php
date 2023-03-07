@extends('layouts.layouts')
@section('content')
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Student's Marks</h4>
                @if(session('msg'))
                  <div class="col-md-12 ">
                    <p class="alert alert-success mb-2">{{session('msg')}}</p>
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

                <div class="table-responsive p-5">
                  @if(Auth::user()->role == 'Student')
                    <a href="{{route('marks.pdf', $user->id)}}" class="btn btn-success float-right">Download PDF</a>
                  @endif
                  <p><strong>Student ID:</strong> {{$user->code}}</p>
                    <p><strong>Student Name:</strong> {{$user->first_name}} {{$user->last_name}}</p>
      
                  <table class="table table table-striped table-bordered" style="width:100%">
                    <thead class=" text-primary">
                      <th>
                        Subject-ID
                      </th>
                      <th>
                        Subject
                      </th>
                      <th>
                        Marks
                      </th>
                      <th >
                        Date
                      </th>
                    </thead>
                    <tbody>
                    @foreach($user->marks as $mark)
                    <form method="POST" action="{{ route('marks.update', $mark->id) }}">
                        @csrf
                        @method('PUT')
                      <tr>
                        <td>
                          {{$mark->assSubject->subject->code}}
                        </td>
                        <td>
                          {{$mark->assSubject->subject->subject}}
                        </td>
                        <td class="text-nowrap d-flex">
                        @if(Auth::user()->role != 'Student')
                          @if($mark->marks == 0)
                            
                          <input type="text" class="form-control col-lg-5" name="marks" value="0">

                          @else

                          <input type="text" class="form-control col-lg-5"  name="marks" value="{{$mark->marks}}">

                          @endif

                          <button type="submit" class="btn btn-warning  ml-2">Update</button>

                          @else

                          @if($mark->marks == 0)
                              Not Released
                            @else
                            {{$mark->marks}}
                          @endif
                        @endif
                        </td>
                        <td>
                          {{$mark->created_at}}
                        </td>
                      </tr>
                    </form>
                    @endforeach

                      <tr>
                        <td>
                          <h5>Total (AVG):</h5>
                        </td>
                        <td>
                        </td>
                        <td>
                          @php
                            $total = $user->marks->sum('marks');
                            $avg =  $total/$user->subjects->count();
                          @endphp
                          <h5>
                            @if($mark->marks == 0)
                              Not Released
                            @else
                            {{$avg}}
                          @endif
                          </h5>
                        </td>
                        <td>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     @endSection