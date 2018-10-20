 

<?php 


session_start();
include "includes/db.php";

if (isset($_POST['submit'])) {
  $username=$_POST['username'];
  $password=$_POST['password'];
   

 
  $result=mysqli_query($connection,"SELECT * from joinus where username= '$username' and password= '$password' "); 
  $admin =mysqli_query($connection,"SELECT * from admin_login where admin_mail= '$username' and admin_password= '$password' ");
  $superadmin =mysqli_query($connection,"SELECT * from super_admin where s_email= '$username' and s_password= '$password' ");

   while($row = mysqli_fetch_array($admin )) {

     $db_id = $row['admin_id'];
     $db_mail = $row['admin_mail'];
     $db_password = $row['admin_password'];
     $db_name = $row['admin_name'];
     $db_num = $row['admin_contactno'];
     $db_address = $row['admin_address'];
 }

      while($ro = mysqli_fetch_array($result )) {

     $user_id = $ro['id'];
     $user_mail = $ro['email'];
     $user_password = $ro['password'];
     $user_name = $ro['full_name'];
    
 }




  if(mysqli_num_rows($result)==1) {
     
 
    header('location: admin/user/profile.php');
 $_SESSION['id'] = $user_id;
 $_SESSION['password'] = $user_password;
 $_SESSION['full_name'] = $user_name;
 $_SESSION['contact_num'] = $user_num;
  $_SESSION['Address'] = $user_address;
   $_SESSION['company_name'] = $user_company;
   


  }

  elseif (mysqli_num_rows($admin)==1) {
         header('location: admin/index.php');
         $_SESSION['admin_id'] = $db_id;
 $_SESSION['admin_password'] = $db_password;
 $_SESSION['admin_name'] = $db_name;
 $_SESSION['admin_mail'] = $db_mail;
 $_SESSION['admin_contactno'] = $db_num;
 $_SESSION['admin_address'] = $db_address;
      
}
  
  elseif (mysqli_num_rows($superadmin)==1) {
        header('location: admin/superadmin/superindex.php');
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
<div class="container-fluid " style="background-color: white;">
        
    <div class="row">
        <div class="col-sm-4 ">
                <nav class="navbar navbar-light " id="who1">
                        <a class="navbar-brand" href="#"> <img src="img/corp.jpg" height="80px;" width="350px;" alt="logo" style="margin-top: -10px; margin-left: 10px;"></a>
                      </nav>

        </div>
    
        <div class="col-sm-6">
                        <ul class="d-flex justify-content-center" style="list-style-type: none; margin-top: 25px; margin-left: -20px; ">
                                <li><a class="active" href="index.php">Home</a></li>
                                <li><a href="aboutus.php">AboutUs</a></li>
                                <li><a href="joinus.php">JoinUs</a></li>
                                <li><a href="login.php">Login</a></li>
                              </ul>
                      </ul>   
        </div>
    </div> 
</div>




<div class="container-fluid" style="margin-left: -15px;">
   <video autoplay muted loop id="myVideo" >
  <source src="stuff/bg.mp4" type="video/mp4">
</video>
    <div class="row">

        <div class="col-sm-6 offset-sm-3" style="margin-top: 150px;">

        <h1 style="text-align: center" class="about"> LOGIN   </h1>
  
  
  <hr> 
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <form form role="form" name="forma" autocomplete="" method="post" action="login.php"> 
     <div class="form-row">
    <div class="form-group col-md-6">
      <label "for="inputEmail4">User Name</label>
      <input type="text" class="form-control" id="inputEmail4" name="username" placeholder="Username" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password" required=>
    </div>
  </div>

  <button type="submit" class="btn btn-info" name="submit">Sign in</button>



  </form>

</div>


  
</div>

</div>
</div>
</div>





</body>
</html>