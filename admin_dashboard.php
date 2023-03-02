<!--
* @file admin_dashbooard.php
* @author KUSHAGRA JAISWAL 
* @date 2022-07-01
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
    <title>ADmin-Dashboard</title>
</head>

<body>
    <?php
    include 'partials/_dbConnect.php';
    include 'partials/_headerAdmin.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $sql = "SELECT COUNT(doctor_id)
        FROM doctor";
        $result = mysqli_query($conn, $sql);
        $sql2 = "SELECT COUNT(user_id)
        FROM users";
        $result2 = mysqli_query($conn, $sql2);
        $sql3 = "SELECT COUNT(schedule_id)
        FROM doctor_schedule";
        $result3 = mysqli_query($conn, $sql3);
        $sql4 = "SELECT COUNT(appointment_id)
        FROM appointment";
        $result4 = mysqli_query($conn, $sql4);
    
        echo ' <div class="container my-4 w-50 text-center">
        <div class="mt-4 p-4 bg-dark text-secondary rounded">
            <h1 class="mb-3 text-success">Total Doctors:</h1>
            <h3 class="text-light opacity-75"> ' . mysqli_fetch_assoc($result)['COUNT(doctor_id)'] . '</h3>
        </div>
        </div>';
        echo ' <div class="container my-4 w-50 text-center">
        <div class="mt-4 p-4 bg-dark text-secondary rounded">
            <h1 class="mb-3 text-success">Total Patients:</h1>
            <h3 class="text-light opacity-75"> ' . mysqli_fetch_assoc($result2)['COUNT(user_id)'] . '</h3>
        </div>
        </div>';
        echo ' <div class="container my-4 w-50 text-center">
        <div class="mt-4 p-4 bg-dark text-secondary rounded">
            <h1 class="mb-3 text-success">Total Schedules:</h1>
            <h3 class="text-light opacity-75"> ' . mysqli_fetch_assoc($result3)['COUNT(schedule_id)'] . '</h3>
        </div>
        </div>';
        echo ' <div class="container my-4 w-50 text-center">
        <div class="mt-4 p-4 bg-dark text-secondary rounded ">
            <h1 class="mb-3 text-success">Total Appointments:</h1>
            <h3 class="text-light opacity-75">  ' . mysqli_fetch_assoc($result4)['COUNT(appointment_id)'] . '</h3>
        </div>
        </div>
        <p class="mt-4">`</p>';
    } else {
        header("location: /appointmentApp/admin_login.php");
    }

    ?>


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