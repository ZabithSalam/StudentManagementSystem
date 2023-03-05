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
                      <tr>
                        <td>
                          SCI342
                        </td>
                        <td>
                          Science
                        </td>
                        <td>
                          <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                          <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                          <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

            <form action="" method="post">

            <div class="modal-body">
              <div class="form-group col-lg-12">
                <label for="recipient-name" class="col-form-label">Subject Name</label>
                <input type="text" class="form-control" name="subject" id="subject-name">
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