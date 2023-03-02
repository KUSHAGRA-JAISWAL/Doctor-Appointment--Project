<!--
* @file handle_appointment.php
* @author KUSHAGRA JAISWAL 
* @date 2022-07-04
* @copyright Copyright (c) 2022
-->

<?php
$id = $_GET['user_id'];
$did = $_GET['doctor_id'];
$sid = $_GET['schedule_id'];
// echo $id . ' ' . $did . ' ' . $sid;

include '_dbConnect.php';

$query = "SELECT * FROM `doctor_schedule` WHERE `schedule_id` = '$sid'";
$resultq = mysqli_query($conn, $query);
$row2 = mysqli_fetch_assoc($resultq);
$schedule_slot = $row2['schedule_slot'];
if($row2){
  // query to update the record
  $schedule_slot2 = $schedule_slot - 1;
  $existsql = "UPDATE `doctor_schedule` SET `schedule_slot`='$schedule_slot2' WHERE `schedule_id`='$sid'";
  $result2 = mysqli_query($conn, $existsql);
}
$showError = "false";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '_dbConnect.php';
    $reason_for_appointment = $_POST['reason_for_appointment'];
        $sql = "INSERT INTO `appointment` (`doctor_id`, `user_id`, `schedule_id`, `reason_for_appointment`,`appointment_time`) 
        VALUES ('$did', '$id', '$sid','$reason_for_appointment', current_timestamp()) ";
         $result = mysqli_query($conn, $sql);
          if ($result) {
               $showAlert = true;
                header("Location: /appointmentApp/user_appointment.php?user_id=$id&doctor_id=$did&schedule_id=$sid");
                exit();
                } else {
                    echo "We could not add the Record Successfully --> " . mysqli_error($conn);
                }
           
     //   header("Location: /appointmentApp/doctor_schedule.php?scheduleaddfail=$showError");
    }
?>