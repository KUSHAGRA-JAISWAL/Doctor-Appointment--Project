<!--
* @file index.php
* @author KUSHAGRA JAISWAL 
* @date 2022-06-30
* @copyright Copyright (c) 2022
-->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../appointmentApp/styleSheets/styles.css" />
    <title>Appointment-App</title>
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
        <div class="d-flex mx-2">
        <a href="/appointmentApp/user_login.php" class="btn btn-secondary mx-2">Book Appointment</a>';
    include 'partials/_header.php';
    ?>

    <!-- slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../appointmentApp/images/odas.png" class="bannerimg d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../appointmentApp/images/odas3.png" class="bannerimg d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../appointmentApp/images/odas4.jpg" class="bannerimgg d-block" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <!-- <img src="../appointmentApp/images/odas2.jpg" alt="DOCTOR IMAGE" width="100%" /> -->
        <div class="centered">
            <!-- <h1 style="color: white ">Online Doctor Appointment App</h1> -->

        </div>
        <div class="container2">
            <h1>We Offers All Possible Medical Solution & Even More</h1>
        </div>
    </div>

    <div class="parent2">
        <div class="child2">
            <img src="../appointmentApp/images/odas1.jpg" alt="second iamge" width="100%" />
        </div>
        <div class="child">
            <p>All your medical records are securely kept in your health account.
                Just login to our Doctor appointment service, and all records will be in one place.</p>
        </div>

    </div>

    <div class='parent'>
        <div class='child'>
            <h1>Book Appointment With Doctors Easily</h1>
            <p>
                Doc Appointment MeetMyDoctor service enables patients to search for top doctors in the locality and book confirmed appointments.
                to other customers.
            </p>
        </div>
        <div class='child'>
            <h1>Consult With Doctor Online</h1>
            <p>
                Provide a scalable, secure platform to clinics and hospitals that provide great value at reasonable cost
                Doc appointment not only meet the customer expectations but also lead the market in terms of product features.
            </p>
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