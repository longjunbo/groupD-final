<?php 


include '../../includes/db.php';
include 'include/head.php';
include 'include/topNav.php';

include 'include/leftsidebarsuper.php';

?>


<div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">

<!--breadcum -->
 	<div class="row">
								<div class="col-xl-12">
										<div class="breadcrumb-holder">
												<h1 class="main-title float-left">Edit Admin</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Edit Admin</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>
					
 <div class="row">
				
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
          <div class="card mb-3">
            <div class="card-header">
              <h3><i class="fa fa-table"></i>Edit Admin Record</h3>
              
            </div>
              
            
           


              </div>
              </div>
              </div>
             

          
        <form class="form" role="form" autocomplete="" name="form1" method="post" action="">



 <?php 
                      if (isset($_GET['edit'])){

                    $the_db_id = $_GET['edit'];
                  
                  
                       $query = "SELECT * FROM admin_login WHERE admin_id = $the_db_id ";
                       $select_admins_id = mysqli_query($connection, $query);
                       
                       while($row = mysqli_fetch_assoc($select_admins_id)) {
                        $admin_id = $row['admin_id'];
                          $admin_company = $row['admin_company_id'];
                      $admin_mail = $row['admin_mail'];
                       $admin_password = $row['admin_password'];
                       $admin_name = $row['admin_name'];
                       $admin_contactno = $row['admin_contactno'];
                       $admin_address = $row['admin_address'];


                   }
              

                      

                          
                   if (isset($_POST['submit'])){


 
    $adminemail = $_POST['admin_email'];
    $adminpassword = $_POST['admin_password'];
    $adminname = $_POST['admin_name'];
    
    $adminphone = $_POST['admin_contactno'];
    $adminaddress = $_POST['admin_address'];
    $admincompany = $_POST['admin_company_id'];


                        
                        $query = "UPDATE admin_login SET ";
                        
                        
                        $query .="admin_mail = '{$adminemail}', ";
                          $query .="admin_company_id = '{$admincompany}', ";
                        $query .="admin_password = '{$adminpassword}', ";
                        $query .="admin_name = '{$adminname}', ";
                        $query .="admin_contactno = '{$adminphone}', ";
                        $query .="admin_address = '{$adminaddress}' ";
                        
                        $query .="WHERE admin_id = {$the_db_id} ";

                        $update_admin = mysqli_query($connection,$query);

                        //confirmQuery($update_student);



                        echo "<div class='alert alert-success' role='alert'>Admin Updated. <a href='admins.php'>View Updated Admin </a></div>";

                        if(!$update_admin){
                          die("QUERY FAILED" . mysqli_error($connection));
                        }
                      

         }            
         }
                ?>
                          
                     
   
          
                           <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Email </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_mail;  ?>" name="admin_email" type="email" required >
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Company </label>
                                    <div class="col-sm-9">
                                      <select name="admin_company_id" class="form-control" required>
                                        
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
                                    <label class="col-sm-3 col-form-label form-control-label">Password </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_password; ?>" name="admin_password" type="password" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Full Name </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_name;  ?>" name="admin_name" type="text" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Contact No</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_contactno; ?>" name="admin_contactno" type="text" required>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Home Address</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="admin_address" value="<?php echo $admin_address;  ?>" type="text" >
                                    </div>
                                </div>

                            

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label form-control-label"></label> 
                                
                                   
                                        <input class="btn btn-success" name="submit" type="submit" value="Submit">
                                    
                                </div>

                            

                            </form>
                 
      </div>
      
    </div>
  </div>



</script>

<?php

include 'include/foot.php';
?>