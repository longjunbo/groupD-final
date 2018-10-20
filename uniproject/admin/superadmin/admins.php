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
              <table id="example1" class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                  <th>ID# </th>
                   <th>Full Name</th>
                    <th>Email ID</th>
                    <th>Password</th>
                    <th>Company</th>
                    <th>Contact No</th>
                    
                    <th>Address</th>
                    <th> Edit </th>
                    <th> Delete </th>

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
                        $admin_company = $row['admin_company_id'];
                    
                       


                       echo "<tr>";
                       echo "<td>$db_id </td>";
                       echo "<td>$admin_name </td>";
                       echo "<td>$admin_mail </td>";
                       echo "<td>$admin_password </td>";
                       

                       $query = "SELECT * FROM companies WHERE company_id = {$admin_company} ";
        $select_companies_id = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_companies_id)) {
        $company_id = $row['company_id'];
        $company_title = $row['company_title'];

        
        echo "<td>{$company_title}</td>";
            
        }


                       echo "<td>$admin_contactno </td>";
                       echo "<td>$admin_address </td>";
                       

                      echo "<td> <a href='editadmin.php?edit=$db_id' > <i class='fa fa-edit' style='font-size:30px'></i> </a></td>";
        echo "<td> <a href='admins.php?delete=$db_id'><i class='fa fa-trash' style='font-size:30px; color: #d9534f'></i></a> </td>";
                       
                       echo "</tr>";

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