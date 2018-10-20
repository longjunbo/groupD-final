<?php session_start(); ?>

<?php
$_SESSION['student_id'] = null;
 $_SESSION['student_loginid'] = null;
 $_SESSION['student_name'] = null; 


 header("Location: ../../web/index.php")
 ?>