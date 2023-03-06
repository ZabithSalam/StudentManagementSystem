@extends('layouts.layouts')
@section('content')
      
      <!-- End Navbar -->
      <div class="content">
          @if(Auth::user()->role == 'Teacher')
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa-solid fa-user-tie  text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Teachers</p>
                      <p class="card-title">
                      @php
                         $users = App\Models\User::where('role','Teacher')->count();
                      @endphp 
                      {{$users}}
                      <p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa-solid fa-user-graduate text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Students</p>
                      <p class="card-title">
                      @php
                         $users = App\Models\User::where('role','Student')->count();
                      @endphp 
                      {{$users}}
                      <p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-book text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Subjcts</p>
                      <p class="card-title">
                        {{App\Models\Subject::count()}}
                      <p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

        </div>
        <div style="margin-top: 380px;"></div>

        @else
          <h1 style="text-align:center;">
          <i class="fa-solid fa-user-graduate"></i>
          Welcome to Student Dashboard</h1>

        @endif

      </div>

@endsection