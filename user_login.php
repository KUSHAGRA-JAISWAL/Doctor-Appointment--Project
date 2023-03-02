<!--
* @file user_login.php
* @author KUSHAGRA JAISWAL 
* @date 2022-06-30
* @copyright Copyright (c) 2022
-->

<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include 'partials/_dbConnect.php';

  $login_email = $_POST["loginEmail"];
  $login_password = $_POST["loginPass"];

  // $sql = " SELECT * FROM `users` WHERE `username`='$username' AND `password` = '$password' ";
  $sql = " SELECT * FROM `users` WHERE `user_email`='$login_email'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['user_id'];
      if (password_verify($login_password, $row['user_pass'])) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['useremail'] = $login_email;
        header("Location: /appointmentApp/appointment_booking.php?user_id=$id");
      } else {
        $showError = " Invalid Password";
      }
    }
  } else {
    $showError = " Invalid user";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title><?php echo "user-login"; ?></title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Poppins:ital,wght@0,400;0,900;1,800&display=swap');

    body {
      font-family: 'Kdam Thmor Pro', sans-serif;
      font-family: 'Poppins', sans-serif;
    }

    h1 {
      font-weight: 900;
      color: purple;
    }

    .main-box {
      height: 80vh;
    }

    .content-box {
      background-color: rgb(247, 247, 247);
    }
  </style>
</head>

<body>
  <?php

  include 'partials/_dbConnect.php';

  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/appointmentApp/">appointmentApp</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/appointmentApp/index.php">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/appointmentApp/partials/_about.php">About</a>
          </li>
      </ul>
      <div class="d-flex mx-2">';

  include 'partials/_header.php';
  ?>
  <?php
  if ($login) {
    echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
  }
  if ($showError) {
    echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
  }
  ?>

  <div class="main-box container d-flex my-3">
    <div class="container d-flex">
      <img src="/appointmentApp/images/user.jpg" alt="patient banner">
    </div>
    <div class="content-box container mt-5 text-center ms-5">
      <h1 class="text-center mt-5">USER LOGIN</h1>
      <form action="/appointmentApp/user_login.php" method="post">
        <div class="mb-3 d-flex mt-4">
          <!-- <label for="Email" class="form-label">Email</label>&nbsp;&emsp;&emsp;&ensp; -->
          <input type="Email" placeholder="Email" class="form-control border border-3  rounded-pill p-2" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">
        </div>
        <div class=" d-flex my-4">
          <!-- <label for="password" class="form-label">Password</label>&emsp; -->
          <input type="password" placeholder="Password" class="form-control border border-3 rounded-pill p-2" id="loginPass" name="loginPass">
        </div>

        <button type="submit" class="btn btn-success w-100 rounded-pill p-2 fs-5">LOGIN</button>
        <h5 class="mt-3 ">If you don't have account <br> <a href="/appointmentApp/signup.php" class="text-dark text-decoration-underline"> register here</h5> </a>
      </form>
    </div>
  </div>

  <?php include 'partials/_footer.php'; ?>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>