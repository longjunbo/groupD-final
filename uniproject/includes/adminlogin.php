
<?php
session_start();

include "db.php";


if(isset($_POST['submit'])) {

 $admin_mail = $_POST['admin_mail'];
 $admin_password = $_POST['admin_password'];

 $admin_mail = mysqli_real_escape_string($connection, $admin_mail);
 $password = mysqli_real_escape_string($connection, $admin_password);

 $query = "SELECT * FROM admin_login WHERE admin_mail = '{$admin_mail}' ";
 $select_user_query = mysqli_query($connection, $query);

 if(!$select_user_query) {
     die("QUERY FAILED". mysqli_error($connection));
 }

 while($row = mysqli_fetch_array($select_user_query )) {

     $db_id = $row['admin_id'];
     $db_mail = $row['admin_mail'];
     $db_password = $row['admin_password'];
     $db_name = $row['admin_name'];
 }

 if($admin_mail ==  $db_mail && $admin_password == $db_password){

 header("Location: ../admin/index.php");

 $_SESSION['admin_id'] = $db_id;
 $_SESSION['admin_password'] = $db_password;
 $_SESSION['admin_name'] = $db_name;
 $_SESSION['admin_mail'] = $db_mail;
      
}
elseif ($admin_mail !==  $db_mail && $admin_password!== $db_password){

    
   echo '<script language="javascript">';
echo 'alert("Invalid username or password ")';
echo '</script>';
}


else{

   echo '<script language="javascript">';
echo 'alert("Invalid username or password ")';
echo '</script>';
}


      


    
}



?>
