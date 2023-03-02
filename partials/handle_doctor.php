<!--
* @file handle_doctor.php
* @author KUSHAGRA JAISWAL 
* @date 2022-07-02
* @copyright Copyright (c) 2022
-->

<?php
$showError = "false";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '_dbConnect.php';
    if(isset($_POST['snoEdit'])){
       // Update the record
       $sno = $_POST['snoEdit'];
       $doc_name = $_POST['doctorNameEdit'];
       $doc_email = $_POST['doctorEmailEdit'];
       $doc_phno = $_POST['doctorPhnoEdit'];
       $doc_dob = $_POST['doctorDobEdit'];
       $doc_degree = $_POST['doctorDegreeEdit'];
       $doc_splt = $_POST['doctorSpltEdit'];
       $doc_address = $_POST['doctorAddEdit'];

       // query to update the record
       $sql = "UPDATE `doctor` SET `doctor_name`='$doc_name',`doctor_email`='$doc_email',`doctor_phone`='$doc_phno',`doctor_dob`='$doc_dob',`doctor_degree`='$doc_degree',`doctor_splt`='$doc_splt',`doctor_address`='$doc_address' WHERE `doctor_id`='$sno'";
       $result = mysqli_query($conn, $sql);
       if ($result){
        echo "We Updated the Record Successfully";
        header ("Location: /appointmentApp/doctors.php");
       }
       else{
        echo "We could not Update the Record Successfully --> " . mysqli_error($conn);
       }
    }else{
    $doctor_name = $_POST['doctorName'];
    $doctor_email = $_POST['doctorEmail'];
    $doctor_phone = $_POST['doctorPhno'];
    $doctor_dob = $_POST['doctorDob'];
    $doctor_degree = $_POST['doctorDegree'];
    $doctor_splt = $_POST['doctorSplt'];
    $doctor_add = $_POST['doctorAdd'];
    $doctor_password = $_POST['doctorPass'];
    $doctor_cpassword = $_POST['doctorcPass'];

    // Check if the email is already in use.
    $existSql = "SELECT * FROM `doctor` WHERE `doctor_email` = '$doctor_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "existEmail";
    } else {
        if ($doctor_password == $doctor_cpassword) {
            $hash = password_hash($doctor_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `doctor` (`doctor_name`, `doctor_email`, `doctor_phone`, `doctor_dob`, `doctor_degree`, `doctor_splt`, `doctor_address`, 
            `doctor_pass`, `timestamp`) VALUES ('$doctor_name', '$doctor_email', '$doctor_phone', '$doctor_dob', '$doctor_degree', '$doctor_splt',
             '$doctor_add', '$hash', current_timestamp()) ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("Location: /appointmentApp/doctors.php?signupsuccess=true");
                exit();
            }
        } else {
            $showError = "badPassword";
        }
    }
    header("Location: /appointmentApp/doctors.php?signupfail=$showError");
}
}
?>