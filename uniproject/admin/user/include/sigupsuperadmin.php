l<?php include "../../../includes/db.php"; ?>

<?php
if(isset($_POST['Submit'])) {

    
    
    $adminemail = $_POST['admin_email'];
    $adminpassword = $_POST['admin_password'];
    $adminname = $_POST['admin_name'];
    
    
    
    $query = "INSERT INTO super_admin (s_email, s_password, s_name) ";
    
    $query .= "VALUES('$adminemail' ,'$adminpassword', '$adminname')";

    $result = mysqli_query($connection, $query);

      if (!$result) {

        die( 'QUERY FAILED' . mysqli_error() );
      }

      else {
        header("Location: ../superindex.php");
       
        
    
    }
}
?>