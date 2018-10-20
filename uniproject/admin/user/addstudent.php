
<?php 

include 'include/head.php';
include 'include/topNav.php';
include '../../include/db.php';

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
											<h1 class="main-title float-left">Add Student</h1>
											<ol class="breadcrumb float-right">
												<li class="breadcrumb-item">Home</li>
												<li class="breadcrumb-item active">Add Student</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>
					

                    
        <div class="row">
			
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">						


             <div class="card mb-3">
          <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Student Registration</h3>
              Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g., <i>email</i> for email address or <i>number</i> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
                 </div>
 
          <div class="card-body">
 
          <form class="form" role="form" autocomplete="" name="form1" method="post" action="include/signupuser.php" onSubmit="return check();">
                            
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">User Name </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="user" type="text" value="" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Password </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="password" type="password" value="" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Seat no </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="seatno" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Full name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="fullname" type="text" value="" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Group</label>
                                    <div class="col-sm-9">
                                        <select id="user_time_zone" name="group"  class="form-control" size="0">
                                            <option value="CS">CS </option>
                                            <option value="SE">SE</option>
                                            <option value="MCS"> MCS </option>
                                            <option value="MS">MS </option>
                                            <option value"PHD"> PHD </option> 


                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Email address</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="email" type="text" value="">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Home Address</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="address" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Contact No</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="phone" type="text" value="">
                                    </div>
                                </div>
                            

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label form-control-label"></label> 
                                
                                   
                                        <input class="btn btn-success" name="Submit" type="submit" value="Submit">
                                    
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