<?php include "../../includes/db.php"; ?>

<?php
if(isset($_POST['Submit'])) {

    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];

    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];


    $query = "INSERT INTO joinus (username, password, email, full_name, Address, contact_num, company_name) ";
    
    $query .= "VALUES('$username', '$password', '$email', '$fullname', '$address' , '$phone', '$company')";

    $result = mysqli_query($connection, $query);

      if (!$result) {

        die( 'QUERY FAILED' . mysqli_error() );
      }

      else {
        header("Location: ../index.php");
       
        
    
    }
}
?>