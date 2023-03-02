<!--
* @file signup.php
* @author KUSHAGRA JAISWAL 
* @date 2022-06-30
* @copyright Copyright (c) 2022
-->

<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'partials/_dbConnect.php';

    $user_name = $_POST["signupName"];
    $user_email = $_POST["signupEmail"];
    $user_phone = $_POST["signupPhno"];
    $user_dob = $_POST["signupDob"];
    $user_add = $_POST["signupAdd"];
    $password = $_POST["signupPassword"];
    $cpassword = $_POST["signupcPassword"];
    // check whether this isername Exists
    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0) {
        // $exists = true;
        $showError = "This Email Already Exists";
    } else {
        $exists = false;
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_phone`, `user_dob`, `user_address`, 
            `user_pass`, `timestamp`) VALUES ('$user_name', '$user_email', '$user_phone', '$user_dob',
             '$user_add', '$hash', current_timestamp()) ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Password do not match";
        }
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

    <title><?php echo "signup"; ?></title>
</head>
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
        margin-top: 1%;
      height: 80vh;
    }

    .content-box {
      background-color: white;
      opacity: 0.9;
      margin-right: 15%;
    }
  </style>
<body>

    <?php
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
                     <a class="nav-link" href="/partials/_about.php">About</a>
                 </li>
             </ul>';
    include 'partials/_header.php'; ?>
    <?php
    if ($showAlert) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Your account is now created and you can login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
    }
    if ($showError) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong>' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
    }
    ?>

<div class="main-box container d-flex">
    <div class="container d-flex w-50">
      <img src="/appointmentApp/images/signup.jpg" alt="signup banner">
    </div>
    <div class="content-box container mt-4 text-center">
        <h1 class="text-center">SIGN UP</h1>
        <form action="/appointmentApp/signup.php" method="post">
            <div class="d-flex my-4">
                <input type="text" placeholder="Username" class="form-control border border-3 rounded-pill p-2" id="signupName" name="signupName" aria-describedby="emailHelp">
            </div>
            <div class="d-flex my-4">
                <input type="email" placeholder="Email" class="form-control border border-3 rounded-pill p-2" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
            </div>
            <div class="d-flex my-4">
                <input type="text" placeholder="Phone No" class="form-control border border-3 rounded-pill p-2" id="signupPhno" name="signupPhno" aria-describedby="emailHelp" maxlength="10" required>
            </div>
            <div class="d-flex my-4">
                <input type="date" placeholder="DOB" class="form-control border border-3 rounded-pill p-2" id="signupDob" name="signupDob" aria-describedby="emailHelp" required>
            </div>
            <div class="d-flex my-4">
                <input type="text" placeholder="Address" class="form-control border border-3 rounded-pill p-2" id="signupAdd" name="signupAdd" aria-describedby="emailHelp" required>
            </div>
            <div class="d-flex my-4">
                <input type="password" placeholder="Password" class="form-control border border-3 rounded-pill p-2" id="signupPassword" name="signupPassword">
            </div>
            <div class=" my-4">
                <input type="password" placeholder="Confirm Password" class="form-control border border-3 rounded-pill p-2" id="signupcPassword" name="signupcPassword">
                <div id="emailHelp" class="form-text">Make sure to type the same password</div>
            </div>
            <button type="submit" class="btn btn-success w-100 rounded-pill p-2 fs-5 mb-2">Sign Up</button>
            <a href="/appointmentApp/user_login.php" class="text-dark text-decoration-underline"> Login here </a>
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