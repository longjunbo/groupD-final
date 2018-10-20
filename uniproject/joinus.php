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
    $company = $_POST['user_company_id'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];

     $query = "INSERT INTO `joinus`(`username`, `password`, `email`, `full_name`, `Address`,contact_num, `user_company_id`, `subject`, `message`) VALUES ('$username', '$password','$email', '$fullname', '$Address', '$contactnum', '$company', '$subject', '$text');";
    

    
   

    $result = mysqli_query($connection, $query);

      if (!$result) {

        die( 'QUERY FAILED' . mysqli_error() );
      }

      else {
        header("Location: ../index.php");
       
        
    
    }
}
?>

<body>

<div class="container-fluid " style="background-color: white;">
        
    <div class="row">
        <div class="col-sm-4 ">
                <nav class="navbar navbar-light " id="who1">
                        <a class="navbar-brand" href="#"> <img src="img/corp.jpg" height="80px;" width="350px;" alt="logo" style="margin-top: -10px; margin-left: 10px;"></a>
                      </nav>

        </div>
    
        <div class="col-sm-6">
                        <ul class="d-flex justify-content-center" style="list-style-type: none; margin-top: 25px;">
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

 

<div class="row" style="margin-top: 10px;">

  
<br><br><br>

<div class="col-md-5 offset-md-3" style="margin-top: 10px;">
<center><b><font size="13" class="mb-0" style="color: white" >Join us</font></b></center><br><br>
<h5 class="mb-0" style="color: white">Joining the Alliance means different things dependent on what your company feasibly can sustain, both monetarily and structurally. Below is the breakdown of associate levels. The Alliance can help you in your decision of what level of association is right for your company.</h5>
</div>

</div>

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
                                      <select name="user_company_id" class="form-control">
                                        
                                        <?php
                            $query = "SELECT * FROM companies";
        $select_companies = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_companies)) {
        $company_id = $row['company_id'];
        $company_title = $row['company_title'];

        if($company_id == $post_company_id) {

      
        echo "<option selected value='{$company_id}'>{$company_title}</option>";


        } else {

          echo "<option value='{$company_id}'>{$company_title}</option>";


        }
            
        }
        ?>
   

                                      </select>
                                       
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
