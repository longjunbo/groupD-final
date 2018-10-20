
<?php 

session_start();
include "db.php";

if (isset($_POST['login'])) {
  $username=$_POST['username'];
  $userpassword=$_POST['password'];
   
$username = mysqli_real_escape_string($connection, $username);
$userpassword = mysqli_real_escape_string($connection, $userpassword);

 $query = "SELECT * FROM joinus WHERE username = '{$username}' ";
 $select_user_query = mysqli_query($connection, $query);

 if(!$select_user_query) {
     die("QUERY FAILED". mysqli_error($connection));
 }

 while($row = mysqli_fetch_array($select_user_query )) {

     $db_id = $row['id'];
     $db_username = $row['username'];
     $db_password = $row['password'];
     $db_mail = $row['email'];
 }

 if($username ==  $db_username && $userpassword == $db_password){

 header("Location: ../admin/index.php");

 $_SESSION['id'] = $db_id;
 $_SESSION['username'] = $db_mail;
 $_SESSION['password'] = $db_password;
      
}

elseif($username !==  $db_username && $userpassword !== $db_password){

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

