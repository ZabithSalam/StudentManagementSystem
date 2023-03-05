@extends('layouts.layouts')
@section('content')
      <!-- End Navbar -->
      <div class="content">
                 
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <div class="card-header">
                  @if(session('subAddmessage'))
                    <div class="col-md-12 ">
                      <p class="alert alert-success mb-2">{{session('subAddmessage')}}</p>
                    </div>
                  @endif
                  @if(session('deleted'))
                    <div class="col-md-12 ">
                      <p class="alert alert-success mb-2">{{session('deleted')}}</p>
                    </div>
                  @endif
                  @error('subject')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                  @enderror
                <h4 class="card-title"> Subject list</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive p-4">
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#subjectModal"><i class="fa fa-pencil" ></i> Add New Subject</a>
                  <table id="subjectsTable" class="table table-striped table-bordered" style="width:100%">
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
                      @foreach($subjects as $subject)

                      <tr>
                        <td>
                          {{$subject->code}}
                        </td>
                        <td>
                          {{$subject->subject}}
                        </td>
                        <td>
                        <form method="POST" action="{{route('subject.destroy', $subject->id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger show_confirm_delete"><i class="fa fa-trash"></i></button>
                        </form>
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

      <!-- Subject Modal -->
      <div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                
            <form method="POST" action="{{route('subject.store')}}">
                        @csrf
            <div class="modal-body">
                 
              <div class="form-group col-lg-12">
                <label for="subject" class="col-form-label">Subject Name</label>
                <input type="text" class="form-control" name="subject" id="subject">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>

          </form>
          </div>
        </div>
      </div>
      
@endsection