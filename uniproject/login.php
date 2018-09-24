



<?php 


session_start();
include "includes/db.php";

// if (isset($_POST['submit'])) {
//   $username=$_POST['username'];
//   $password=$_POST['password'];
   

 
//   $result=mysqli_query($connection,"SELECT * from joinus where username= '$username' and password= '$password' "); 

//   if (mysqli_num_rows($result)==1) {
     
 
    
   
    
//     header('location:index.php');

//   }
// else{

//    echo '<script language="javascript">';
// echo 'alert("Invalid username or password ")';
// echo '</script>';
// }
// }



// if (isset($_POST['login'])) {
//   $adminmail=$_POST['admin_name'];
//   $adminpassword=$_POST['admin_password'];
   

 
//   $result=mysqli_query($connection,"SELECT * from admin_login where admin_mail= '$adminmail' and admin_password= '$adminpassword' "); 

//   if (mysqli_num_rows($result)==1) {
      
    
//     header('location:admin/index.php');

//   }
// else{

//    echo '<script language="javascript">';
// echo 'alert("Invalid username or password ")';
// echo '</script>';
// }
// }

 ?>

 <?php include "includes/db.php"; ?>

<?php
if(isset($_POST['login'])) {

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

 if( $admin_mail ==  $db_mail && $admin_password == $db_password){

 header("Location: admin/index.php");

 $_SESSION['admin_id'] = $db_id;
 $_SESSION['admin_password'] = $db_mail;
 $_SESSION['admin_name'] = $db_name;
      
}
elseif ("$login !==  $db_studentid && $password !== $db_student_password"){

    
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

<?php include "includes/header.php"; ?>
<body>
<div class="container-fluid hero-imageb">
<video autoplay muted loop id="myVideo" >
  <source src="stuff/bg.mp4" type="video/mp4">
</video>
   
        
    <div class="row">
        <div class="col-sm-4 offset-sm-1">
                
                <nav class="navbar navbar-light">
                        <a class="navbar-brand" href="#"> <img src="img/corp.jpg" height="95px;" width="380px;" alt="logo" style="margin-top: -10px; margin-left: 7px;"></a>
                      </nav>

        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-sm-12" >
                        <ul class="d-flex justify-content-center">
                                <li><a class="" href="index.php">Home</a></li>
                                <li><a href="aboutus.php">Aboutus</a></li>
                                <li><a href="Joinus.php">Joinus</a></li>
                                <li><a href="login.php">login</a></li>
                              </ul>
                      </ul>   
        </div>
       
<br> 

<form  method="post"  style="z-index: 1">
    <legend>
    <br><br><br>
<h1 class="logh"> LOGIN PAGE </h1>

</legend>
<br><br><br>
    <input type="text" name="admin_mail" placeholder="username">
    
    <input type="password" name="admin_password" placeholder="Password">
    <br><br>
    <button class="btn btn-lg  btn-info"type="submit" name="login" value="LOGIN"> Login </button>
   
</form>



    </div>
</div>





</body>
</html>