<!--
* @file _header.php
* @author KUSHAGRA JAISWAL 
* @date 2022-06-30
* @copyright Copyright (c) 2022
-->

<!-- This is the header component. -->

<?php

session_start();
include '_dbConnect.php';

// echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
// <div class="container-fluid">
//     <a class="navbar-brand" href="/appointmentApp/">appointmentApp</a>
//     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
//         <span class="navbar-toggler-icon"></span>
//     </button>
//     <div class="collapse navbar-collapse" id="navbarSupportedContent">
//         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
//             <li class="nav-item">
//                 <a class="nav-link active" aria-current="page" href="/appointmentApp/index.php">Home</a>
//             </li>
//             <li class="nav-item">
//                 <a class="nav-link" href="/partials/_about.php">About</a>
//             </li>
//             <li class="nav-item">
//                 <a class="nav-link" href="/partials_contact.php">Contact</a>
//             </li>
//         </ul>
//         <div class="d-flex mx-2">';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '
               <p class="text-success mx-2 my-auto"> Welcome_' . $_SESSION['useremail'] . '</p>
               <a href="/appointmentApp/logout.php" class="btn btn-outline-success mx-2">Logout</a>
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


?>