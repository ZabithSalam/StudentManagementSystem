@extends('layouts.layouts')
@section('content')
      <!-- End Navbar -->
      <div class="content">
                 
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <div class="card-header">
                <h4 class="card-title"> Subject list</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive p-4">
                  <a href="{{route('subject.pdf')}}" class="btn btn-success float-right">Download PDF</a>
                  <table class="table table-striped table-bordered" style="width:100%">
                    <thead class=" text-primary">
                      <th>
                        Subject-ID
                      </th>
                      <th>
                        Subject Name
                      </th>
                      <th>
                        Enrolled Date
                      </th>
                    </thead>
                    <tbody>
                      @foreach(Auth::user()->subjects as $assignSubject)
                            <tr>
                              <td>
                                {{$assignSubject->subject->code}}
                              </td>
                              <td>
                                {{$assignSubject->subject->subject}}
                              </td>
                              <td>
                                {{$assignSubject->created_at}}
                              </td>
                            </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
@endsection