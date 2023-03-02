<!--
* @file appointment.php
* @author KUSHAGRA JAISWAL 
* @date 2022-07-05
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <title>Appointment-Data</title>
</head>

<style>
    .para{
        margin-top: 28%;
    }
</style>

<body>

<?php

include 'partials/_dbConnect.php';
include 'partials/_headerAdmin.php';

echo '<h1 class="text-center text-dark text-decoration-underline mt-5">APPOINTMENT DATA</h1>';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
$sql = "SELECT apt.appointment_id, doc.doctor_name, doc.doctor_splt,ds.schedule_date,ds.schedule_start_time,ds.schedule_end_time,usr.user_name, apt.reason_for_appointment FROM appointment apt, doctor doc, users usr, doctor_schedule ds WHERE usr.user_id = apt.user_id AND doc.doctor_id = apt.doctor_id AND ds.schedule_id = apt.schedule_id";
$result = mysqli_query($conn, $sql);
$sno = 0;
if (mysqli_num_rows($result) > 0) {
  echo ' 
  <div class="container mt-5">
  <table class="table" id="myTable"> 
      <thead>
        <tr>
          <th scope="col">Sno</th>
          <th scope="col">Appointment ID</th></th>
          <th scope="col">Doctor Name</th>
          <th scope="col">Doctor Spacility</th>
          <th scope="col">Schedule date</th>
          <th scope="col">Schedule Time</th>
          <th scope="col">Patient Name</th>
          <th scope="col">Reason For Appointment</th>
        </tr>
      </thead>
       <tbody> ';
  while ($row = mysqli_fetch_assoc($result)) {
    $sno = $sno + 1;
          $doc_name=$row['doctor_name'];
          $schedule_date = $row['schedule_date'];
          $schedule_time = $row['schedule_start_time'] . '-' . $row['schedule_end_time'];
    echo ' 
        <tr>
          <th scope="row">' . $sno . '</th>
          <td>' . $row['appointment_id'] . '</td>
          <td>' . $doc_name . '</td>
          <td>' . $row['doctor_splt'] . '</td>
          <td>' . $schedule_date. '</td>
          <td>' . $schedule_time . '</td>
          <td>' . $row['user_name'] . '</td>
          <td>' . $row['reason_for_appointment'] . '</td>
        </tr>';
    
  }
  echo '</tbody>
    </table>
    </div>
    <p class="para">`</p>';
  }
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

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>
