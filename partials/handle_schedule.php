<!--
* @file handle_patients.php
* @author KUSHAGRA JAISWAL 
* @date 2022-07-02
* @copyright Copyright (c) 2022
-->

<?php
$id = $_GET['doctor_id'];
$showError = "false";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '_dbConnect.php';
    if (isset($_POST['snoEdit'])) {
        // Update the record
        $sno = $_POST['snoEdit'];
        $schedule_date = $_POST['editScheduleDate'];
        $schedule_start_time = $_POST['editStartTime'];
        $schedule_end_time = $_POST['editEndTime'];
        $schedule_consulting_time = $_POST['editConsultingTime'];
        $slot = $_POST['editNoOfSlots'];

        // query to update the record
        $sql = "UPDATE `doctor_schedule` SET `schedule_date`='$schedule_date',`schedule_start_time`='$schedule_start_time',`schedule_end_time`='$schedule_end_time',`schedule_average_time`='$schedule_consulting_time', `schedule_slot` = '$slot' WHERE `schedule_id`='$sno'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "We Updated the Record Successfully";
            header("Location: /appointmentApp/doctor_schedule.php?doctor_id=$id");
        } else {
            echo "We could not Update the Record Successfully --> " . mysqli_error($conn);
        }
    } else {
        $schedule_date = $_POST['scheduleDate'];
        $schedule_start_time = $_POST['startTime'];
        $schedule_end_time = $_POST['endTime'];
        $schedule_consulting_time = $_POST['consultingTime'];
        $slots = $_POST['noOfSlots'];

        $sql = "INSERT INTO `doctor_schedule` (`doctor_id`, `schedule_date`, `schedule_start_time`, `schedule_end_time`, `schedule_average_time`, `schedule_slot`) 
        VALUES ('$id', '$schedule_date', '$schedule_start_time', '$schedule_end_time', '$schedule_consulting_time', '$slots') ";
         $result = mysqli_query($conn, $sql);
          if ($result) {
               $showAlert = true;
                header("Location: /appointmentApp/doctor_schedule.php?doctor_id=$id");
                exit();
                } else {
                    echo "We could not add the Record Successfully --> " . mysqli_error($conn);
                }
           
     //   header("Location: /appointmentApp/doctor_schedule.php?scheduleaddfail=$showError");
    }
}
?>