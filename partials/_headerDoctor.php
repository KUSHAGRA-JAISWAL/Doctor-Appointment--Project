<!--
* @file _headerDoctor.php
* @author KUSHAGRA JAISWAL 
* @date 2022-07-03
* @copyright Copyright (c) 2022
-->

<!-- This is the header component. -->

<?php

session_start();
include '_dbConnect.php';

// echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
// <div class="container-fluid">
//     <a class="navbar-brand" href="/appointmentApp/doctor_dashboard.php">appointmentApp</a>
//     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
//         <span class="navbar-toggler-icon"></span>
//     </button>
//     <div class="collapse navbar-collapse" id="navbarSupportedContent">
//         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
//             <li class="nav-item">
//                 <a class="btn btn-outline-success mx-2" aria-current="page" href="/appointmentApp/doctor_dashboard.php?doctor_id=">Dashboard</a>
//             </li>
//             <li class="nav-item">
//                 <a class="btn btn-outline-success mx-2" href="/appointmentApp/doctor_schedule.php">My Schedule</a>
//             </li>
//             <li class="nav-item">
//                 <a class="btn btn-outline-success mx-2" href="/appointmentApp/doctor_appointment.php">My Appointment</a>
//             </li>
//         </ul>
//         <div class="d-flex mx-2">';


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '
               <p class="text-success mx-2 my-auto"> Welcome_' . $_SESSION['useremail'] . '</p>
               <a href="/appointmentApp/logout.php" class="btn btn-outline-danger mx-2">Logout</a>
                </form>
            ';
} else {


    echo ' 
    <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
      Login
    </a>
  
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <li><a class="dropdown-item" href="/appointmentApp/user_login.php">User</a></li>
      <li><a class="dropdown-item" href="/appointmentApp/doctor_login.php">Doctor</a></li>
      <li><a class="dropdown-item" href="/appointmentApp/admin_login.php">Admin</a></li>
    </ul>
  </div>
        <a href="/appointmentApp/signup.php" class="btn btn-secondary mx-2">Signup</a>
           ';
}
echo ' </div>
    </div>
</div>
</nav>';

include 'partials/handle_doctor.php';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '
        <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Congratulations! </strong> New Member Added Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
}
if (isset($_GET['signupfail']) && $_GET['signupfail'] == "existEmail") {
    echo '
    <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Sorry! </strong> Username has been taken
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-la bel="Close"></button>
    </div>
    ';
}
if (isset($_GET['signupfail']) && $_GET['signupfail'] == "badPassword") {
    echo '
    <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Warning! </strong> Password do not match
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}
if (isset($_GET['faillogin']) && $_GET['faillogin'] == "badNameOrPass") {
    echo '
    <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Warning! </strong> Bad ID or Password
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}
?>


