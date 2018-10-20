l<?php include "db.php"; ?>

<?php
if(isset($_POST['submit'])) {

    
    $adminname = $_POST['admin_name'];
    $adminemail = $_POST['admin_email'];
    $adminpassword = $_POST['admin_password'];
    $admindesignation = $_POST['admin_designation'];
    $adminphone = $_POST['admin_phone'];
    
    $query = "INSERT INTO mst_admin (admin_name, admin_email, admin_password, admin_designation, admin_phone) ";
    
    $query .= "VALUES('$adminname', '$adminemail' ,'$adminpassword', '$admindesignation', '$adminphone')";

    $result = mysqli_query($connection, $query);

      if (!$result) {

        die( 'QUERY FAILED' . mysqli_error() );
      }

      else {
        header("Location: ../teacher.php");
       
        
    
    }
}
?>