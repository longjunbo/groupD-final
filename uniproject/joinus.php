<?php include "includes/header.php" ?>

<?php include "includes/db.php"; ?>


<?php
if(isset($_POST['Submit'])) {

    $username = $_POST['name'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $Address= $_POST['Address'];
    $contactnum = $_POST['phone'];
    $companyname = $_POST['company_name'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];

     $query = "INSERT INTO `joinus`(`username`, `password`, `email`, `full_name`, `Address`,contact_num, `company_name`, `subject`, `message`) VALUES ('$username', '$password','$email', '$fullname', '$Address', '$contactnum', '$companyname', '$subject', '$text');";
    

    
   

    $result = mysqli_query($connection, $query);

      if (!$result) {

        die( 'QUERY FAILED' . mysqli_error() );
      }

      else {
        header("Location: ../index.php");
       
        
    
    }
}
?>

<div class="container-fluid ">
<video autoplay muted loop id="myVideo" >
  <source src="stuff/bg.mp4" type="video/mp4">
</video>
<div class="row">
        <div class="col-sm-4 offset-sm-1">
                
                <nav class="navbar navbar-light" id="who1">
                        <a class="navbar-brand" href="#"> <img src="img/corp.jpg" height="95px;" width="380px;" alt="logo" style="margin-top: -10px; margin-left: 10px;"></a>
                      </nav>

        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-sm-12" >
                        <ul class="d-flex justify-content-center">
                                <li><a class="active" href="index.php">Home</a></li>
                                <li><a href="aboutus.php">Aboutus</a></li>
                                <li><a href="joinus.php">Joinus</a></li>
                                <li><a href="login.php">login</a></li>
                              </ul>
                      </ul>   
        </div>
    </div>




 

<body> 
  
</div>
<br><br><br>

<div class="col-md-5 offset-md-3">
<center><b><font size="13" class="mb-0" style="color: white" >Join us</font></b></center><br><br>
<h5 class="mb-0" style="color: white">Joining the Alliance means different things dependent on what your company feasibly can sustain, both monetarily and structurally. Below is the breakdown of associate levels. The Alliance can help you in your decision of what level of association is right for your company.</h5>
</div>

<div class ="container">
<div class = "row">
<div class="col-md-5 offset-md-1">
                    <span class="anchor" id="formUserEdit"></span>
                    <hr class="my-5">

                    <!-- form user info -->
                    <form action="joinus.php" method="post">
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Join us user</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form"  name="form1" method="post" action="joinus.php" onSubmit="return check();">
                            
                            <div class="form-group row">
                                    
                                    <div class="col-lg-9">
                                        <input class="form-control"  name="name" type="text" value="" placeholder="User name*" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                <div class="col-lg-9">
                                        <input class="form-control" name="pass" type="password" value="" placeholder="Password*" >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    
                                    <div class="col-lg-9">
                                        <input class="form-control" name="email" type="email" value="" placeholder="Email*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    
                                  <div class="col-lg-9">
                                        <input class="form-control" name="fullname" type="text" value="" placeholder="Full name*" >
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    
                                    <div class="col-lg-9">
                                        <input class="form-control" name="Address" type="text" value="" placeholder="Address*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    
                                    <div class="col-lg-9">
                                        <input class="form-control" name="phone" type="text" value="" placeholder="contact number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col-lg-9">
                                        <input class="form-control" name="company_name" type="text" value="" placeholder="Company name*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col-lg-9">
                                        <input class="form-control" name="subject" type="text" value="" placeholder="Subject*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col-lg-9">
                                        <textarea rows="4" cols="50" name="text"  placeholder="Enter text"></textarea>
                                    </div>
                                </div>
                                
                                
                                       

                                  
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input class="btn btn-success" name="Submit" type="submit" value="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   

                </div>
                </div>
                </div> 


<?php include "includes/footer.php"?>
