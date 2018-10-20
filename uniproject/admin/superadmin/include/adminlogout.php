<?php session_start(); ?>

<?php
$_SESSION['admin_id'] = null;
 $_SESSION['admin_name'] = null;
 $_SESSION['admin_designation'] = null; 


 header("Location: ../../web/index.php")
 ?>