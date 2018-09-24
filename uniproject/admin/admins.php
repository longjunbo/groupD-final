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
												<h1 class="main-title float-left">Admin</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Admin</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>
					
 <div class="row">
				
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
          <div class="card mb-3">
            <div class="card-header">
              <h3><i class="fa fa-table"></i> Admin Record</h3>
              
            </div>
              
            <div class="card-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-hover display">
                <thead>
                  <tr>
                  <th>ID# </th>
                    <th>Email ID</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    <th>Contact No</th>
                    
                    <th>Address</th>
                    <th> Action </th>

                  </tr>
                </thead>										
                <tbody>
                <?php
                         $query = "SELECT * FROM admin_login";
                       $select_admins = mysqli_query($connection, $query);
                       
                       while($row = mysqli_fetch_assoc($select_admins)) {
                        $db_id = $row['admin_id'];
                       $admin_mail = $row['admin_mail'];
                       $admin_password = $row['admin_password'];
                       $admin_name = $row['admin_name'];
                       $admin_contactno = $row['admin_contactno'];
                       $admin_address = $row['admin_address'];
                    
                       


                       echo "<tr>";
                       echo "<td>$db_id </td>";
                       echo "<td>$admin_mail </td>";
                       echo "<td>$admin_password </td>";
                       echo "<td>$admin_name </td>";
                       echo "<td>$admin_contactno </td>";
                       echo "<td>$admin_address </td>";
                       

                      echo "<td><a href='editadmin.php?edit={$db_id}'  class='btn btn-sm btn-primary'> Edit </a>
                      <a href='admins.php?delete={$db_id}' class='btn btn-sm btn-danger' > Delete </a></td>";
                       
                       echo "<tr>";

                       }



                      ?>
										</tbody>
                  </table>
              
              </tbody>
              </table> 
           
            <?php
                  if (isset($_GET['delete'])){

                    $the_admin_id = $_GET['delete'];
                  $query = "DELETE FROM admin_login WHERE admin_id = {$the_admin_id} ";
                  $delete_query = mysqli_query($connection, $query);
                  }
              ?>


              </div>
              </div>
              </div>
              </div>
              </div>



              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<?php 

if (isset($_GET['edit'])){

                    $the_admin_ida = $_GET['edit'];
                  
                  
                       $query = "SELECT * FROM admin_login WHERE admin_id = {$the_admin_id}";
                       $select_admins_id = mysqli_query($connection, $query);
                       
                       while($row = mysqli_fetch_assoc($select_admins_id)) {
                        $db_id = $row['admin_id'];
                      $admin_mail = $row['admin_mail'];
                       $admin_password = $row['admin_password'];
                       $admin_name = $row['admin_name'];
                       $admin_contactno = $row['admin_contactno'];
                       $admin_address = $row['admin_address'];
                    } 

                   }


                      if (isset($_POST['update'])){


    $adminemail = $_POST['admin_email'];
    $adminpassword = $_POST['admin_password'];
    $adminname = $_POST['admin_name'];
    
    $adminphone = $_POST['admin_contactno'];
    $adminaddress = $_POST['admin_address'];


                        
                        $query = "UPDATE admin_login SET ";

                        $query .="admin_mail = ' {$adminemail}', ";
                        $query .="admin_password = ' {$adminpassword}', ";
                        $query .="admin_name = ' {$adminname}', ";
                        $query .="admin_contactno = ' {$adminphone}', ";
                        $query .="admin_address = ' {$adminaddress}', ";
                        
                        $query .="WHERE admin_id = ' {$the_admin_ida}', ";

                        $update_admin = mysqli_query($connection,$query);

                        //confirmQuery($update_student);

                        if(!$update_admin){
                          die("QUERY FAILED" . mysqli_error($connection));
                        }
                      

         }


                       ?>
          
        <form class="form" role="form" autocomplete="" name="form1" method="post" action="admins.php">
                          

          

                           <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Email </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_mail  ?>" name="admin_email" type="text" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Password </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_password  ?>" name="admin_password" type="password"  >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Full Name </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_name  ?>" name="admin_name" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Contact No</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_contactno  ?>" name="admin_contactno" type="text" >
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Home Address</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="admin_address" value="<?php echo $admin_address  ?>" type="text" >
                                    </div>
                                </div>

                            

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label form-control-label"></label> 
                                
                                   
                                        <input class="btn btn-success" name="update" type="submit" value="update">
                                    
                                </div>
                            </form>
                 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
              






</div>
</div>
</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

	<script>
	// START CODE FOR BASIC DATA TABLE 
	$(document).ready(function() {
		$('#example1').DataTable();
	} );

</script>

<?php

include 'include/foot.php'

?>