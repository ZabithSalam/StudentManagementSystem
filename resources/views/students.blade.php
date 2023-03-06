@extends('layouts.layouts')
@section('content')
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Students List</h4>
                @if(session('msg'))
                  <div class="col-md-12 ">
                    <p class="alert alert-success mb-2">{{session('msg')}}</p>
                  </div>
                  @endif
                  @if(session('deleted'))
                    <div class="col-md-12 ">
                      <p class="alert alert-success mb-2">{{session('deleted')}}</p>
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
                <div class="table-responsive p-4">
                  <table id="studentsTable" class="table table-striped table-bordered" style="width:100%">
                          <a href="#" data-toggle="modal" data-target="#enroll-student" class="btn btn-success"><i class="fa fa-pencil" ></i> Enroll Student</a>
                    <thead class=" text-primary">
                      <th class="text-nowrap">
                        Student ID
                      </th>
                      <th class="text-nowrap">
                        Full Name
                      </th>
                      <th class="text-nowrap">
                        Email
                      </th>
                      <th>
                        City
                      </th>
                      <th class="text-nowrap">
                        Date of birth
                      </th>
                      <th>
                        Gender
                      </th>
                      <th>
                        Grade
                      </th>
                      <th>
                        NIC
                      </th>
                      <th>
                        Created at
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>

                      @foreach($students as $student)
                      @if($student->role != 'Teacher')
                      <tr>
                        <td>
                          {{$student->code}}
                        </td>
                        <td>
                        {{$student->first_name}} {{$student->last_name}}
                        </td>
                        <td>
                        {{$student->email}}
                        </td>
                        <td>
                        {{$student->city}}

                        </td>
                        <td >
                        {{$student->dob}}
                        </td>
                        <td >
                        {{$student->gender}}
                        </td>
                        <td >
                        {{$student->batch}}
                        </td>
                        <td >
                        {{$student->nic}}
                        </td>
                        <td >
                        {{$student->updated_at}}
                        </td>
                        <td class="text-nowrap">
                          
                          <form method="POST" action="{{route('student.destroy', $student->id)}}">
                            @csrf
                            <a href="{{route('marks.view', $student->id)}}" class="btn btn-warning" title="View Marks"><i class="nc-icon nc-badge" ></i></a>
                            <a href="{{route('view.profile', $student->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('edit.user', $student->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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
      </div>


      <!-- Enroll Student Model -->

      <div class="modal fade bd-example-modal-lg" id="enroll-student" tabindex="-1" role="dialog" aria-labelledby="enroll-student" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enroll Students</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('user.store') }}">
                        @csrf
              <div class="modal-body">
                  <div class="row">
                       <input type="hidden" class="form-control" name="role" value="Student">
                     <div class="form-group col-lg-4">
                       <label for="first_name" class="col-form-label">First Name</label>
                       <input type="text" class="form-control" name="first_name">
                     </div>
                     <div class="form-group col-lg-4">
                      <label for="last_name" class="col-form-label">Last Name</label>
                      <input type="text" class="form-control" name="last_name">
                     </div>
                     <div class="form-group col-lg-4">
                      <label for="email" class="col-form-label">Email</label>
                      <input type="text" class="form-control" name="email">
                     </div>
                     
                     <div class="form-group col-lg-4">
                      <label for="batch" class="col-form-label">Batch</label>
                      <input type="text" class="form-control" name="batch">
                     </div>
                     <div class="form-group col-lg-4">
                       <label for="gender" class="col-form-label">Gender</label>
                      <select  class="form-control" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                     </div>
                     <div class="form-group col-lg-4">
                      <label for="dob" class="col-form-label">DOB</label>
                      <input type="date" class="form-control" name="dob">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="nic" class="col-form-label">NIC</label>
                      <input type="text" class="form-control" name="nic">
                    </div>
                  </div>
                  <div class="row">
                      
                      <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">City</label>
                        <input type="text" class="form-control" name="city">
                      </div>
                      <div class="form-group col-lg-4">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                      </div>
                      <div class="form-group col-lg-4">
                        <label for="confirm-password" class="col-form-label">Confirm-password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                      </div>
                  </div>
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Enroll</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- End Enroll Student Model -->
      


@endSection