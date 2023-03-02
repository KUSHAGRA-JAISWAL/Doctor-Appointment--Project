<!--
* @file doctor_schedule.php
* @author KUSHAGRA JAISWAL 
* @date 2022-07-03
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
    <title>Doctor-Schedule</title>
</head>

<style>
    .para{
        margin-top: 28%;
    }
</style>

<body>
    <?php
    include 'partials/_dbConnect.php';

    // if (isset($_GET['delete'])) {
    //     $sno = $_GET['delete'];
    //     $delete = true;
    //     $sql = "DELETE FROM `doctor_schedule` WHERE `schedule_id` = $sno";
    //     $result = mysqli_query($conn, $sql);
    // }

    $id = $_GET['doctor_id'];
    // echo $id;


    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/appointmentApp/doctor_schedule.php">appointmentApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="btn btn-outline-success mx-2" href="/appointmentApp/doctor_schedule.php?doctor_id=' . $id . '">My Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-success mx-2" href="/appointmentApp/doctor_appointment.php?doctor_id=' . $id . '">My Appointment</a>
                </li>
            </ul>
            <div class="d-flex mx-2">';

    include 'partials/_headerDoctor.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo ' <!-- Button trigger modal -->
        <div class="text-center my-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Schedule
    </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/appointmentApp/partials/handle_schedule.php?doctor_id=' . $id . '" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Schedule Date</label>
                            <input type="date" class="form-control" id="scheduleDate" name="scheduleDate" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="startTime" name="startTime" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">End Time</label>
                            <input type="time" class="form-control" id="endTime" name="endTime" aria-describedby="emailHelp" required>
                        </div>
                        <select class="form-select" aria-label="Default select example" id="consultingTime" name="consultingTime">
                        <option selected>Consulting Time</option>
                        <option value="1">5 Minutes</option>
                        <option value="2">10 Minutes</option>
                        <option value="3">15 Minutes</option>
                        <option value="4">20 Minutes</option>
                        <option value="5">25 Minutes</option>
                    </select>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No of Slots</label>
                    <input type="text" class="form-control" id="noOfSlots" name="noOfSlots" aria-describedby="emailHelp" required>
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> ';

    echo ' <!-- Edit Modal -->
    <div class="modal fade" name="editModal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/appointmentApp/partials/handle_schedule.php?doctor_id=' . $id . '" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Schedule Date</label>
                            <input type="date" class="form-control" id="editScheduleDate" name="editScheduleDate" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="editStartTime" name="editStartTime" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">End Time</label>
                            <input type="time" class="form-control" id="editEndTime" name="editEndTime" aria-describedby="emailHelp" required>
                        </div>
                        Consulting Time
                        <select class="form-select" aria-label="select example" id="editConsultingTime" name="editConsultingTime">
                        <option value="1">5 Minutes</option>
                        <option value="2">10 Minutes</option>
                        <option value="3">15 Minutes</option>
                        <option value="4">20 Minutes</option>
                        <option value="5">25 Minutes</option>
                    </select>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No of Slots</label>
                    <input type="text" class="form-control" id="editNoOfSlots" name="editNoOfSlots" aria-describedby="emailHelp" required>
                </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';

    $id = $_GET['doctor_id'];

    $sql = "SELECT * FROM `doctor_schedule` WHERE `doctor_id` = '" . $id . "'";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
    if (mysqli_num_rows($result) > 0) {
        echo ' 
        <div class="container">
        <table class="table" id="myTable"> 
            <thead>
              <tr>
                <th scope="col">Sno</th>
                <th scope="col">Schedule Date</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Consulting Time</th>
                <th scope="col">No of Slots</th>
                <th scope="col">Acton</th>
              </tr>
            </thead>
             <tbody> ';
        while ($row = mysqli_fetch_assoc($result)) {

            $sno = $sno + 1;
            echo ' 
              <tr>
                <th scope="row">' . $sno . '</th>
                <td>' . $row['schedule_date'] . '</td>
                <td>' . $row['schedule_start_time'] . '</td>
                <td>' . $row['schedule_end_time'] . '</td>
                <td>' . $row['schedule_average_time'] . '</td>
                <td>' . $row['schedule_slot'] . '</td>
                <td><a class="edit btn btn-primary text-decoration-none" id=' . $row['schedule_id'] . '>Edit</a>
                <a class="delete btn btn-primary text-decoration-none" href="/appointmentApp/partials/delete_schedule.php?schedule_id=' . $row['schedule_id'] . '&doctor_id=' . $id . '">Delete</a></td>
              </tr>';
        }
        echo '</tbody>
          </table>
          </div>
          <p class="para">`</p';
    }

    } else {
        header("location: /appointmentApp/doctor_login.php");
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
    <script>
        var editModal = new bootstrap.Modal(document.getElementById('editModal'), {
            keyboard: false
        })
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit", );
                tr = e.target.parentNode.parentNode;
                date = tr.getElementsByTagName("td")[0].innerText;
                start_time = tr.getElementsByTagName("td")[1].innerText;
                end_time = tr.getElementsByTagName("td")[2].innerText;
                consulting_time = tr.getElementsByTagName("td")[3].innerText;
                no_of_slots = tr.getElementsByTagName("td")[4].innerText;
                console.log(date, start_time, end_time, consulting_time);
                editScheduleDate.value = date;
                editStartTime.value = start_time;
                editEndTime.value = end_time;
                editConsultingTime.value = consulting_time;
                editNoOfSlots.value = no_of_slots;
                snoEdit.value = e.target.id;
                console.log(e.target.id);
                editModal.toggle();
            })
        })

        // delets = document.getElementsByClassName('delete');
        // Array.from(delets).forEach((element) => {
        //     element.addEventListener("click", (e) => {
        //         console.log("delete", );
        //         sno = e.target.id.substr(1, );

        //         if (confirm("Are you sure you want to delete this record!")) {
        //             console.log("yes");
        //             window.location = `/appointmentApp/doctor_schedule.php?delete=${sno}`;
        //             // create a form and use post request to submit the form.
        //         } else {
        //             console.log("no");
        //         }
        //     })
        // })
    </script>
</body>

</html>