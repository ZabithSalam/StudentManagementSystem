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
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://kit.fontawesome.com/17d1c0f917.css" crossorigin="anonymous">

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="./dashboard.html" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="./dashboard.html" class="simple-text logo-normal">
          Zabith
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.html">
              <i class="fa fa-school"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./teacher-profile.html">
              <i class="fa-solid fa-user-tie"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
          <li>
            <a href="./student-profile.html">
              <i class="fa-solid fa-user-graduate"></i>
              <p>Student Profile</p>
            </a>
          </li>
          <li>
            <a href="./teachers.html">
              <i class="fa-solid fa-chalkboard-user"></i>
              <p>Teachers</p>
            </a>
          </li>
          <li>
            <a href="./students.html">
              <i class="fa-solid fa-users-line"></i>
              
              <p>Students</p>
            </a>
          </li>
          <li>
            <a href="./subjects.html">
              <i class="fa fa-book"></i>
              <p>Subjects</p>
            </a>
          </li>
          <li>
            <a href="./marks.html">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>Student's Marks</p>
            </a>
          </li>
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
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-single-02"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Student's Marks</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive p-5">
                  <p><strong>Student ID:</strong> KDHDCSE/52/33</p>
                    <p><strong>Student Name:</strong> Abdul Salam Mohamed Zabith</p>
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Subject
                      </th>
                      <th>
                        Marks
                      </th>
                      <th >
                        Date
                      </th>
                      <th >
                        Action
                      </th>
                    </thead>
                    <tbody>

                      <tr>
                        <td>
                          Science
                        </td>
                        <td>
                          54
                        </td>
                         <td>
                          2023-10-20
                        </td>
                        <td >
                          <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                          <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          Maths
                        </td>
                        <td>
                          34
                        </td>
                        <td>
                         2023-10-30
                        </td>
                        <td >
                          <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                          <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          English
                        </td>
                        <td>
                          23
                        </td>
                        <td>
                         2023-12-30
                        </td>
                        <td >
                          <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                          <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <h5>Total (AVG):</h5>
                        </td>
                        <td>
                          <h5>2000</h5>
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
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script src="https://kit.fontawesome.com/17d1c0f917.js" crossorigin="anonymous"></script>

</body>

</html>