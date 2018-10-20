
<?php 

include '../includes/db.php';
include 'include/head.php';
include 'include/topNav.php';

include 'include/leftsidebar.php';

?>
<style>

.a{
       
  
  font-family: 'Lora', serif;
  
  font-size: 3.5em;
  text-transform: uppercase;
  font-weight: bold;
  text-shadow: 1px 1px 1px #222;
  padding: 30px;
  line-height: .75;
  color: darkcyan;
}

.b{
  font-family: 'Lora', serif;
  
  text-transform: uppercase;
  font-weight: bold;
  text-shadow: 1px 1px 1px #222;
  padding: 10px;
  line-height: .75;
}

li{

  
    font-size: 15px;
 

}
</style>

	<div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Dashboard</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Dashboard</li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->
                       
						<div class="row alert alert-dark" >
						<h1 class="a"> Welcome to Admin   (<small> <?php echo $_SESSION['admin_name']; ?> </small>)</h1> 
    
					    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-7" style="margin-bottom: 15px;" >
						<h4 class="alert-heading b">Instructions</h4>
						
						<ul style="text-decoration: none;">Read about all admin and user following instructions:
						<li> You can add edit delete any data </li>

                        <li> Admin can add edit delete any User data </li>
                        <li> Admin can add any File, Posts and User  </li>
                        <li> Admin can see all user Feedbacks and comments </li>		
                       
                        </ul>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-5"" style="margin-bottom: 15px;"> 
                        <h4 class="alert-heading b">Info!</h4>
                        		<ul style="text-decoration: none;"> Profile information
						<li> Admin ID <b> <?php echo $_SESSION['admin_id']; ?> </b> </li>

                        <li> Admin Email <b>   <?php echo $_SESSION['admin_mail']; ?> </b></li>
                        <li> Admin Contact <b>  <?php echo $_SESSION['admin_contactno']; ?> </b> </li>
                        <li> Admin Address <b>  <?php echo $_SESSION['admin_address']; ?> </b>  </li>	

                       </ul>
                        </div>

						</div>
						
							<div class="row">

							        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-info" style="height:90%;" >
													<i class="fa fa-graduation-cap float-right text-white" aria-hidden="true"></i>
													<h6 class="text-white text-uppercase m-b-20">Admins</h6>

													<?php 
													  global $connection;

													$query = "SELECT * FROM admin_login ";
													$select_all_admins = mysqli_query($connection, $query);
													$on_admins = mysqli_num_rows($select_all_admins);

                                                    echo   "<h1 class='m-b-20 text-white counter'> {$on_admins} </h1>"; 
	
                                                     ?>
													<br> <br>
													<h6> <span class="text-white">Active </span> </h6>

											</div>
									</div>

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-default" style="height:90%;">
													<i class="fa fa-user-o float-right text-white"></i>
													<h6 class="text-white text-uppercase m-b-20">Users</h6>
													<?php 
													    global $connection;
													$query = "SELECT *FROM joinus ";
													$select_all_users = mysqli_query($connection, $query);
													$on_users = mysqli_num_rows($select_all_users);

													echo   "<h1 class='m-b-20 text-white counter'> {$on_users} </h1>
													"; 
                                                     ?> 
													
												<br> <br>
													<h6> <span class="text-white">Active </span> </h6>
													
											</div>
									</div>



<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-danger " style="height:90%;">
													<i class="fa fa-sticky-note-o float-right text-white"></i>
													<h6 class="text-white text-uppercase m-b-20">Posts</h6>
													<?php 
													    global $connection;
 
													$query = "SELECT *FROM posts ";
													$select_all_posts = mysqli_query($connection, $query);
													$posts = mysqli_num_rows($select_all_posts);

													echo   "<h1 class='m-b-20 text-white counter'> {$posts} </h1>
													"; 
                                                     ?> 
											
												
													<br> <br>
													<h6> <span class="text-white">Result rate 40% </span> </h6>
											</div>
									</div>
									

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-warning" style="height:90%;">
													<i class="fa fa-comments float-right text-white" ></i>
													<h6 class="text-white text-uppercase m-b-20">Feedback</h6>

													<?php 
													    global $connection;
 
													$query = "SELECT *FROM comments ";
													$select_all_comments = mysqli_query($connection, $query);
													$coms = mysqli_num_rows($select_all_comments);

													echo   "<h1 class='m-b-20 text-white counter'> {$coms} </h1>
													"; 
                                                     ?> 
											
													
													<br> <br>
													<h6> <span class="text-white">5 new Comments </span> </h6>
											</div>
									</div>

									

									
								</div>


									

							
						<br>
							<div class = "row">
<?php
								 $query = "SELECT * FROM admin_files";
    $select_all_files = mysqli_query($connection,$query);
    $files_count = mysqli_num_rows($select_all_files);

    ?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">

							<div id="columnchart_material" style="width: 960px; height: 500px;"></div>
							</div> 
							</div> 

                           <br> 

						  <br>

						  
							<div class="row">
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">						
								<div class="card mb-3">
									<div class="card-header">
										<h3><i class="fa fa-line-chart"></i> Result Update</h3>
										Result Status through out all year. check the progress
									</div>
										
									<div class="card-body">
										<canvas id="lineChart"></canvas>
									</div>							
									<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
								</div><!-- end card-->					
							</div>

							
							
							
					</div>




            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Records', 'Count' ],


		  <?php 

	   $element_text = ['Admins', 'Users', 'Posts', 'Feedback', 'Files'];
	   $element_count = [$on_admins, $on_users, $posts, $coms, $files_count];
	   
	   for ($i = 0; $i<5; $i++) {

		 echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
	   }

?>
        
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
	<?php 
 
 include 'include/footer.php';

?>