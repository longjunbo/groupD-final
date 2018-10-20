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
												<h1 class="main-title float-left">Add Company</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Add Company</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>


				 <div class="card mb-3">
          <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i>Add Company Registration</h3>
              Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g., <i>email</i> for email address or <i>number</i> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
                 </div>
 
          <div class="card-body">

                       <?php 
               

        if(isset($_POST['submit'])){

            $company_title = $_POST['company_title'];
             $company_email = $_POST['company_email'];
                 $company_description = $_POST['company_description'];

               

            $company_logo       = ($_FILES['image']['name']);
            $company_logo_temp   = ($_FILES['image']['tmp_name']);
    


                 $company_contact_no = $_POST['company_contact_no'];
                 $company_address = $_POST['company_address'];


        move_uploaded_file($company_logo_temp, "../img/$company_logo" );



                $query = "INSERT INTO companies (company_title, company_email, company_description, company_logo, company_contact_no, company_address) ";
                $query .= "VALUES('{$company_title}', '{$company_email}', '{$company_description}', '{$company_logo}', '{$company_contact_no}', '{$company_address}') ";
                   $result = mysqli_query($connection, $query);

                    if (!$result) {

        die( 'QUERY FAILED' . mysqli_error($connection) );
      }

     }
    



             ?>
 
        <form class="form" role="form" autocomplete="" name="form1" method="post" action="" enctype="multipart/form-data">

          <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Company Name </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_title" type="text">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Company Email </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_email" type="email"  >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Description </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_description" type="text">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Company Logo </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="image" type="file"  >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Contact No </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_contact_no" type="text" >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Address </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="company_address" type="text"  >
                                    </div>
                                </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="submit" value="Submit">
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

   