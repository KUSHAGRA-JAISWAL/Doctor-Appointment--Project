<!--
* @file delete_schedule.php
* @author KUSHAGRA JAISWAL 
* @date 2022-07-06
* @copyright Copyright (c) 2022
-->

<?php
include '_dbConnect.php';

if (isset($_GET['schedule_id'])) {
        $sno = $_GET['schedule_id'];
        $id = $_GET['doctor_id'];
        $delete = true;
        $sql = "DELETE FROM `doctor_schedule` WHERE `schedule_id` = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $delete = true;
            header("Location: /appointmentApp/doctor_schedule.php?doctor_id=$id");
        } else {
            $delete = false;
            echo mysqli_error($conn);
        }
    }
?>