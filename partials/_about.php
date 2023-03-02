<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../styleSheets/styles2.css" />
  <title>About Us</title>
</head>

<body>
  <?php

  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
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
        <div class="d-flex mx-2">
        <a href="/appointmentApp/user_login.php" class="btn btn-secondary mx-2">Book Appointment</a>';
  include '_header.php';
  ?>

  <div class="about">
    <div class="inner-section">
      <h1>About Us</h1>
      <p class="text">
        Doc appointment booking system that provides user an easy way of booking a doctor’s appointment. It overcomes the issue of managing and booking appointments according to user’s choice
        and demands. This offers an effective solution where users can view various booking slots available and select
        the preferred date and time.
      </p>


      <!--button -->
      <!-- <div class="skills">
                <button>Contact Us</button>
            </div>
           -->



    </div>
  </div>

  <div class='parent'>
    <div class='child'>
      <h1>Our Vision</h1>
      <p>
        Enable healthcare businesses to provide superior healthcare delivery and patient care with technology – globally
        Our focus on customer service makes our customers not only happy but also enthusiastically refer to other customers. </p>
    </div>
    <div class='child'>
      <h1>Our Mission</h1>
      <p>
        Provide a scalable, secure platform to clinics and hospitals that provide great value at reasonable cost
        Doc appointment not only meet the customer expectations but also lead the market in terms of product features.
      </p>
    </div>
  </div>










  <div class="wrapper">
    <h1 style="color:rgb(239, 252, 245)">Team Members</h1>
    <div class="team">
      <div class="team_member">
        <div class="team_img">
          <img src="../images/team1.jpg" alt="Team_image">
        </div>
        <h3>Kushagra Jaiswal</h3>
        <p class="role">Backend developer</p>
        <p>Worked on backend on php texhnology,provide support in frontend </p>
      </div>
      <div class="team_member">
        <div class="team_img">
          <img src="../images/team2.jpg" alt="Team_image">
        </div>
        <h3>Adnan Khan</h3>
        <p class="role">Team Leader</p>
        <p>Created the roadmap for the whole project</p>
      </div>
      <div class="team_member">
        <div class="team_img">
          <img src="../images/team3.jpg" alt="Team_image">
        </div>
        <h3>Hritik Agrawal</h3>
        <p class="role">Reseach and Analytics</p>
        <p>Researched on modules requirement for project</p>
      </div>
      <div class="team_member">
        <div class="team_img">
          <img src="../images/team4.jpg" alt="Team_image">
        </div>
        <h3>Harshit Singh</h3>
        <p class="role">Frontend Developer</p>
        <p>Worked on Frontend on Html & css texhnology,Module designing,support on backend </p>
      </div>

    </div>
  </div>



  <?php include '_footer.php'; ?>

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