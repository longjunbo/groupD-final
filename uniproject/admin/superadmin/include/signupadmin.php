l<?php include "../../../includes/db.php"; ?>

<?php
if(isset($_POST['Submit'])) {

    
    
    $adminemail = $_POST['admin_email'];
    $adminpassword = $_POST['admin_password'];
    $adminname = $_POST['admin_name'];
    
    $adminphone = $_POST['admin_phone'];
    $adminaddress = $_POST['admin_address'];
    
    $query = "INSERT INTO admin_login (admin_mail, admin_password, admin_name, admin_contactno, admin_address) ";
    
    $query .= "VALUES('$adminemail' ,'$adminpassword', '$adminname', '$adminphone', '$adminaddress')";

    $result = mysqli_query($connection, $query);

      if (!$result) {

        die( 'QUERY FAILED' . mysqli_error() );
      }

      else {
        header("Location: ../admins.php");
       
        
    
    }
}
?>