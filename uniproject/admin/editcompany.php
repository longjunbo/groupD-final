<?php 

include '../includes/db.php';
include 'include/head.php';
include 'include/topNav.php';

include 'include/leftsidebar.php';

?>

<div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">

<!--breadcum -->
 	<div class="row">
								<div class="col-xl-12">
										<div class="breadcrumb-holder">
												<h1 class="main-title float-left">Edit Company</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Edit Company</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>


					    <div class="row">
      
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">           


             <div class="card mb-3">
          <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i>Edit Users Registration</h3>
              Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g., <i>email</i> for email address or <i>number</i> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
                 </div>
 
          <div class="card-body">
 
        <form class="form" role="form" autocomplete="" name="form1" method="post" enctype="multipart/form-data">

             <?php // UPDATE AND INCLUDE QUERY

    if(isset($_GET['edit'])) {
    
        $the_company_id = $_GET['edit'];
      }

        $query = "SELECT * FROM companies WHERE company_id = {$the_company_id}";
    $select_company_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_company_id)) {
    $company_id = $row['company_id'];
    $company_title = $row['company_title'];
      $company_email = $row['company_email'];
        
          $company_description = $row['company_description'];
        
          $company_logo = $row['company_logo'];
        
          $company_contact_no = $row['company_contact_no'];
            $company_address = $row['company_address'];
        
        
        
    
    }
             



                        
                   if (isset($_POST['update_com'])){
               
                 
                 $company_title = ($_POST['company_title']);
                  $company_email = ($_POST['company_email']);
                 $company_description = ($_POST['company_description']);
                 
            $company_logo       = ($_FILES['image']['name']);
            $company_logo_temp   = ($_FILES['image']['tmp_name']);

                 $company_contact_no = ($_POST['company_contact_no']);
                 $company_address = ($_POST['company_address']);


        move_uploaded_file($company_logo_temp, "../img/$company_logo"); 

           if(empty($company_logo)) {
        
        $query = "SELECT * FROM companies WHERE company_id = $the_company_id ";
        $select_logo = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_logo)) {
            
           $company_logo = $row['company_logo'];
        
        }
        
        
}              

                    $company_logo = mysqli_real_escape_string($connection, $company_logo);
                 
             
        
               // $post_title = mysqli_real_escape_string($connection, $post_title);



                   $query = "UPDATE companies SET ";

                   $query .="company_id = ' {$company_id}', ";
                   $query .="company_email = ' {$company_email}', ";
                   $query .="company_description = ' {$company_description}', ";
                   $query .="company_logo = ' {$company_logo}', ";
                     $query .="company_contact_no = ' {$company_contact_no}', ";
                       $query .="company_address = ' {$company_address}', ";
                   $query .="company_title = ' {$company_title}' ";
                        
                  $query .="WHERE company_id = {$the_company_id} ";
                
                $update_com = mysqli_query($connection, $query); 



                  echo "<div class='alert alert-success' role='alert'>Edit Successfully. <a href='company.php'> <i class='fa fa-chevron-left'> </i> View/Add Companies </a>   </div>";

                }


                
    ?>
     
 
                       <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Company Name </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_title" type="text" value="<?php echo $company_title?>">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Company Email </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_email" type="text" value="<?php echo $company_email?>" >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Description </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_description" type="text" value="<?php echo $company_description ?>" >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Company Logo</label>
                                    <div class="col-sm-9">
                                      <img width="100" src="../images/<?php echo $company_logo; ?>" alt="">
                                        <input class="form-control" name="image" type="file" value="">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Contact No </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_contact_no" type="text" value="<?php echo $company_contact_no  ?>" >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Address </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_address" type="text" value="<?php echo $company_address  ?>" >
                                    </div>
                                </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_com" value="Update">
      </div>

    </form>
    

                 
      </div>                            
   </div><!-- end card--> 

  </div> <!--end column --> 
  </div> 

                        </div>
                </div>
            </div>


                        
<?php

include 'include/footer.php'

?>
