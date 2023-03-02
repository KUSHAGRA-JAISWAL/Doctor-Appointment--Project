<!--
* @file appointment_booking.php
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <title>Appointment-Booking</title>
</head>

<style>
  .para {
    margin-top: 28%;
  }
</style>

<body>
  <?php
  $id = $_GET['user_id'];
  include 'partials/_dbConnect.php';
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/appointmentApp/appointment_booking.php">appointmentApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="btn btn-outline-success mx-2" aria-current="page" href="/appointmentApp/appointment_booking.php?user_id=' . $id . '">Book Appointment</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-success mx-2" aria-current="page" href="/appointmentApp/user_appointment.php?user_id=' . $id . '">My Appointments</a>
            </li>
        </ul>
        <div class="d-flex mx-2">';
  include 'partials/_header.php';



  ?>
  <?php

  $id = $_GET['user_id'];

  echo '<h1 class="text-center text-dark text-decoration-underline mt-5 mb-5">Welcome to Appointment Booking Section</h1>';

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $existSql = "SELECT * FROM `users` WHERE `user_id` = '$id'";
    $existResult = mysqli_query($conn, $existSql);

    $existRow = mysqli_fetch_assoc($existResult);

    $user_name = $existRow['user_name'];
    $user_phone = $existRow['user_phone'];
    // echo $user_phone;
    // exit();
    $user_address = $existRow['user_address'];
    $sql = "SELECT doc.doctor_name,doc.doctor_email,doc.doctor_degree,doc.doctor_splt,doc.doctor_id,ds.schedule_date,ds.schedule_start_time,ds.schedule_end_time,ds.schedule_average_time, ds.schedule_slot, ds.schedule_id FROM doctor doc, doctor_schedule ds WHERE doc.doctor_id = ds.doctor_id ";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
    if (mysqli_num_rows($result) > 0) {
      echo '
      <div class="container">
      <table class="table" id="myTable"> 
        <thead>
          <tr>
            <th scope="col">Sno</th>
            <th scope="col">Doctor Name</th>
            <th scope="col">Doctor Email</th>
            <th scope="col">Doctor Degree</th>
            <th scope="col">Doctor Spacility</th>
            <th scope="col">Schedule date</th>
            <th scope="col">Schedule Time</th>
            <th scope="col">Average Consulting Time</th>
            <th scope="col">No Of Slots</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
         <tbody> ';
      while ($row = mysqli_fetch_assoc($result)) {
        $sno = $sno + 1;
        $doc_id = $row['doctor_id'];
        $doc_name = $row['doctor_name'];
        $schedule_date = $row['schedule_date'];
        $schedule_time = $row['schedule_start_time'] . '-' . $row['schedule_end_time'];
        echo ' 
          <tr>
            <th scope="row">' . $sno . '</th>
            <td>' . $doc_name . '</td>
            <td>' . $row['doctor_email'] . '</td>
            <td>' . $row['doctor_degree'] . '</td>
            <td>' . $row['doctor_splt'] . '</td>
            <td>' . $schedule_date . '</td>
            <td>' . $schedule_time . '</td>
            <td>' . $row['schedule_average_time'] . '</td>
            <td> Slots Left : ' . $row['schedule_slot'] . '</td>';

        echo '  <td>  
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal' . $sno . '">
              Get Appointment 
            </button> <!-- Modal -->
            <div class="modal fade" id="exampleModal' . $sno . '" tabindex="-1" aria-labelledby="exampleModalLabel' . $sno . '" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel' . $sno . '">Book Your Appointment</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                       <div class="modal-body">
                          <h3 class="text-center">Patient Details</h3><hr>
                          <div class="container text-center">
                              <div class="fs-5">
                              Patient Name: ' . $user_name . '<hr>
                              </div>
                              <div class="fs-5">
                              Patient Phone: ' . $user_phone . '<hr>
                              </div>
                              <div class="fs-5">
                              Patient Address: ' . $user_address . '<hr>
                              </div> 
                              <h3 class="text-center">Doctor Details</h3><hr>
                              <div class="container text-center">
                                  <div class="fs-5">
                                  Doctor Name: ' . $doc_name . '<hr>
                                  </div>
                                  <div class="fs-5">
                                  Appointment Date: ' . $schedule_date . '<hr>
                                  </div>
                                  <div class="fs-5">
                                  Avaliable Time: ' . $schedule_time . '<hr>
                                  </div> 
                               </div> 
                         <form action="/appointmentApp/partials/handle_appointment.php?user_id=' . $id . '&doctor_id=' . $doc_id . '&schedule_id=' . $row['schedule_id'] . '" method="post">
                         <div class="fs-5 text-center">
                         <b>Reason For Appointment</b>
                         <textarea class="form-control" placeholder="Describe your problem here" id="reason_for_appointment" name="reason_for_appointment" style="height: 100px"></textarea>
                         </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-primary">Book Appointment</button>
                       </div>  
                       </form>
                     </div>
                  </div>
              </div>
            </div>
            </td>
          </tr>';
      }
      echo '</tbody>
      </table>
      </div>
      <p class="para">`</p>';
    }
  } else {
    header("location: /appointmentApp/user_login.php");
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