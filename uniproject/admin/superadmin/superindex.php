
<?php 

include '../../includes/db.php';
include 'include/head.php';
include 'include/topNav.php';

include 'include/leftsidebarsuper.php';

?>


<?php
if(isset($_POST['Submit'])) {

    
    
    $adminemail = $_POST['admin_email'];
    $adminpassword = $_POST['admin_password'];
    $adminname = $_POST['admin_name'];
    
    
    
    $query = "INSERT INTO super_admin (s_email, s_password, s_name) ";
    
    $query .= "VALUES('$adminemail' ,'$adminpassword', '$adminname')";

    $result = mysqli_query($connection, $query);

      if (!$result) {

        die( 'QUERY FAILED' . mysqli_error() );
      }

     
}
?>

	<div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Home</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Dashboard</li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>




						<div class="alert alert-dark" role="alert">
						<h1> Welcome to Super Administrative Area  </h1> 
					
						<h4 class="alert-heading">Info!</h4>
						
						<ul style="text-decoration: none;">Read about all admin and user following instructions:
						<li> You can add edit delete any data </li>

                        <li> Admin can add edit delete any User data </li>
                        <li> Admin can add any File, Course and Test  </li>
                        <li> Users can see only profile and Result </li>		

                        </ul>				
						</div>

                      

                      <div class="row">
				
        <div class="col-xs-12 col-sm-6">						
          <div class="card mb-3">
            <div class="card-header">
              <h3><i class="fa fa-table"></i>Super Admin Record</h3>
              
            </div>
              
            <div class="card-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-hover display">
                <thead class="thead-dark">
                  <tr>
                  <th >ID# </th>
                    <th>Email ID</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    
                    

                  </tr>
                </thead>										
                <tbody>
                <?php
                         $query = "SELECT * FROM super_admin";
                       $select_admins = mysqli_query($connection, $query);
                       
                       while($row = mysqli_fetch_assoc($select_admins)) {
                        $db_id = $row['s_id'];
                       $admin_name = $row['s_name'];
                       $admin_email = $row['s_email'];
                       $admin_password = $row['s_password'];
                    
                       


                       echo "<tr class='table-active'> ";
                       echo "<td>$db_id </td>";
                       echo "<td>$admin_email </td>";
                       echo "<td>$admin_password </td>";
                       echo "<td>$admin_name </td>";
                       
                       

                      // echo "<td><a href='superindex.php?edit={$db_id}'  class='btn btn-sm btn-primary' data-toggle='modal' data-target='#exampleModal'> Edit </a>
                      // <a href='superindex.php?delete={$db_id}' class='btn btn-sm btn-danger' > Delete </a></td>";
                       
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
                  $query = "DELETE FROM super_admin WHERE s_id = {$the_admin_id} ";
                  $delete_query = mysqli_query($connection, $query);
                  }
              ?>


              </div>
              </div>
              </div>
              </div>
              
            


            
			
            <div class="col-xs-12 col-sm-6 ">						


             <div class="card mb-3">
          <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Add Super Admin</h3>
              Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g., <i>email</i> for email address or <i>number</i> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
                 </div>
 
          <div class="card-body">
 
          <form class="form" role="form" autocomplete="" name="form1" method="post" action="superindex.php">
                            
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Email </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="admin_email" type="text" value="" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Password </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="admin_password" type="password" value="" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Full Name </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="admin_name" type="text" value="">
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
                  
                  
                       $query = "SELECT * FROM super_admin WHERE s_id = {$the_admin_ida}";
                       $select_super_id = mysqli_query($connection, $query);
                       
                       while($row = mysqli_fetch_assoc($select_super_id)) {
                       $db_id = $row['s_id'];
                       $s_name = $row['s_name'];
                       $s_email = $row['s_email'];
                       $s_password = $row['s_password'];
                    } 

                   


                      if (isset($_POST['update'])){

    $sname = $_POST['s_name'];
    $semail = $_POST['s_email'];
    $spassword = $_POST['s_password'];
    
    


                        
                        $query = "UPDATE super_admin SET ";

                        $query .="s_email = '{$semail}', ";
                        $query .="s_password = '{$spassword}', ";
                        $query .="s_name = '{$sname}' ";
                       
                        
                        $query .="WHERE s_id = {$the_admin_ida} ";

                        $update_admin = mysqli_query($connection,$query);

                        //confirmQuery($update_student);

                        if(!$update_admin){
                          die("QUERY FAILED" . mysqli_error($connection));
                        }
                      

         }
       }


                       ?>
          
        <form class="form" role="form" autocomplete="" name="form1" method="post">
                          

          

                           <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Email </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_email;  ?>" name="s_email" type="text" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Password </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_password;  ?>" name="s_password" type="password"  >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Full Name </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $admin_name;  ?>" name="s_name" type="text">
                                    </div>
                                </div>

                                

                            

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label form-control-label"></label> 
                                
                                   
                                        <input class="btn btn-success" name="update" type="submit" value="Update">
                                    
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



			<?php 
 
 include 'include/footer.php';

?>