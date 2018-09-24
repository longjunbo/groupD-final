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
												<h1 class="main-title float-left">User</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">User</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>
					

<div class="row">
				
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
          <div class="card mb-3">
            <div class="card-header">
              <h3><i class="fa fa-table"></i> Users Record</h3>
              
            </div>
              
            <div class="card-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-hover display">
                <thead>
                  <tr>
                  <th>ID# </th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Email </th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Company Name </th>
                    
                    <th> Action </th>

                  </tr>
                </thead>										
                <tbody>
                <?php
                         $query = "SELECT * FROM joinus";
                       $select_users = mysqli_query($connection, $query);
                       
                       while($row = mysqli_fetch_assoc($select_users)) {
                        $db_id = $row['id'];
                        $user_name = $row['username'];
                       $user_password = $row['password'];
                       $user_email = $row['email'];
                       $user_fname = $row['full_name'];
                       $user_address = $row['Address'];
                       $user_contactnum = $row['contact_num'];
                       $user_company = $row['company_name'];
                    
                       


                       echo "<tr>";
                       echo "<td>$db_id </td>";
                       echo "<td>$user_name </td>";
                       echo "<td>$user_password </td>";
                       echo "<td>$user_email </td>";
                       echo "<td>$user_fname </td>";
                       
                       echo "<td>$user_address </td>";
                       echo "<td>$user_contactnum </td>";
                       echo "<td>$user_company </td>";
                       

                      echo "<td><a href='edituser.php?edit={$db_id}' type=button class='btn btn-sm btn-primary' role='button' > Edit </a>
                      <a href='user.php?delete={$db_id}' class='btn btn-sm btn-danger' > Delete </a></td>";
                       
                       echo "<tr>";

                       }



                      ?>
										</tbody>
                  </table>
              
              </tbody>
              </table> 
           
            <?php
                  if (isset($_GET['delete'])){

                    $the_user_id = $_GET['delete'];
                  $query = "DELETE FROM joinus WHERE id = {$the_user_id} ";
                  $delete_query = mysqli_query($connection, $query);
                  }
              ?>


              </div>
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