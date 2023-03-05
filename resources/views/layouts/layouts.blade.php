<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Student Management System
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://kit.fontawesome.com/17d1c0f917.css" crossorigin="anonymous">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <!-- data table -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="{{route('dashboard')}}" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="/assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="{{route('dashboard')}}" style="text-transform: capitalize;" class="simple-text logo-normal">
          {{Auth::user()->first_name}} {{Auth::user()->last_name}}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ Request::path() === 'dashboard'? 'active': '' }}">
            <a href="{{route('dashboard')}}">
              <i class="fa fa-school"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="{{ Request::path() === 'profile'? 'active': '' }}">
            <a href="{{route('profile')}}">
              @if(Auth::user()->role == 'Teacher' || Auth::user()->role == 'Admin')
                  <i class="fa-solid fa-user-tie"></i>
                  @else
                    <i class="fa-solid fa-user-graduate"></i>
              @endif
              <p>Profile</p>
            </a>
          </li>

          @if(Auth::user()->role == 'Teacher' )

          <li class="{{ Request::path() === 'students'? 'active': '' }}">
            <a href="{{route('student.view')}}">
              <i class="fa-solid fa-users-line"></i>
              
              <p>Students</p>
            </a>
          </li>

          @endif

          @if(Auth::user()->role == 'Teacher' )

          <li class="{{ Request::path() === 'subjects'? 'active': '' }}">
            <a href="{{route('subject.view')}}">
              <i class="fa fa-book"></i>
              <p>Subjects</p>
            </a>
          </li>

          @endif

          @if(Auth::user()->role == 'Student')
          
          <li class="{{ Request::path() === 'marks'? 'active': '' }}">
            <a href="./marks.html">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>My Marks</p>
            </a>
          </li>
          
          @endif

          @if(Auth::user()->role == 'Teacher' )
          
          <li class="{{ Request::path() === 'assign-subject'? 'active': '' }}">
            <a href="{{route('assign.subject')}}">
              <i class="fa fa-book"></i>
              <p>Assign Subjects</p>
            </a>
          </li>
          
          @endif

          @if(Auth::user()->role == 'Student')
          
          <li class="{{ Request::path() === 'subjects'? 'active': '' }}">
            <a href="{{route('subject.view')}}">
              <i class="fa fa-book"></i>
              <p>Enrolled Subjects</p>
            </a>
          </li>
          
          @endif

          @if(Auth::user()->role == 'Teacher' )

          <li class="{{ Request::path() === 'tudents-marks'? 'active': '' }}">
            <a href="{{route('subject.view')}}">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>Students Marks</p>
            </a>
          </li>

          @endif


        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Student Management System</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-single-02"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                  <!-- logout function -->
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        {{ __('Logout') }}</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
@yield('content')


<footer class="footer footer-black  footer-white">
</footer>
   
  <!--   Core JS Files   -->
  <script src="/assets/js/core/jquery.min.js"></script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="/assets/demo/demo.js"></script>
  <script src="https://kit.fontawesome.com/17d1c0f917.js" crossorigin="anonymous"></script>
  
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>




<script>
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        img.src = URL.createObjectURL(file)
      }
    }
</script>


<script>
  $(document).ready(function () {
    $('#studentsTable').DataTable();
});
</script>
<script>
  $(document).ready(function () {
    $('#teachersTable').DataTable();
});
</script>
<script>
  $(document).ready(function () {
    $('#subjectsTable').DataTable();
});
</script>




<script type="text/javascript">
 
  $('.show_confirm_delete').click(function(event) {
       var form =  $(this).closest("form");
       var id = $(this).data("id");
       event.preventDefault();
       swal({
           title: `Are you sure you want to delete this record?`,
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
           form.submit();
         }
       });
   });

</script>
<script>

$d

</script>
<form id="logout-form" action="{{ route('logout') }}" method="POST" >
    @csrf
</form>

</body>

</html>