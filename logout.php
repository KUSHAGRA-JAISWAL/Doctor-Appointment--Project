<!--
* @file logout.php
* @author KUSHAGRA JAISWAL 
* @date 2022-06-30
* @copyright Copyright (c) 2022
-->

<?php
session_start();

session_unset();
session_destroy();

header("location: index.php");
exit;
?>