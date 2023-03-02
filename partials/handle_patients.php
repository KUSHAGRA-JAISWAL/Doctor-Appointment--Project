<!--
* @file handle_patients.php
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
       $user_name = $_POST['userNameEdit'];
       $user_email = $_POST['userEmailEdit'];
       $user_phno = $_POST['userPhnoEdit'];
       $user_dob = $_POST['userDobEdit'];
       $user_address = $_POST['userAddEdit'];

       // query to update the record
       $sql = "UPDATE `users` SET `user_name`='$user_name',`user_email`='$user_email',`user_phone`='$user_phno',`user_dob`='$user_dob', `user_address`='$user_address' WHERE `user_id`='$sno'";
       $result = mysqli_query($conn, $sql);
       if ($result){
        echo "We Updated the Record Successfully";
        header ("Location: /appointmentApp/patients.php");
       }
       else{
        echo "We could not Update the Record Successfully --> " . mysqli_error($conn);
       }
    }else{
    $users_name = $_POST['userName'];
    $users_email = $_POST['userEmail'];
    $users_phone = $_POST['userPhno'];
    $users_dob = $_POST['userDob'];
    $users_add = $_POST['userAdd'];
    $users_password = $_POST['userPass'];
    $users_cpassword = $_POST['usercPass'];

    // Check if the email is already in use.
    $existSql = "SELECT * FROM `users` WHERE `user_email` = '$users_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "existEmail";
    } else {
        if ($users_password == $users_cpassword) {
            $hash = password_hash($users_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_phone`, `user_dob`, `user_address`, 
            `user_pass`, `timestamp`) VALUES ('$users_name', '$users_email', '$users_phone', '$users_dob',
             '$users_add', '$hash', current_timestamp()) ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("Location: /appointmentApp/patients.php?signupsuccess=true");
                exit();
            }
        } else {
            $showError = "badPassword";
        }
    }
    header("Location: /appointmentApp/patients.php?signupfail=$showError");
}
}
?>