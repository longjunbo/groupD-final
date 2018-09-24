
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
                       
						<div class="alert alert-dark" role="alert">
						<h1> Welcome to <?php echo $_SESSION['admin_id']; ?>   (<small> <?php echo $_SESSION['admin_name']; ?> </small>)</h1> 
					
						<h4 class="alert-heading">Info!</h4>
						
						<ul style="text-decoration: none;">Read about all admin and user following instructions:
						<li> You can add edit delete any data </li>

                        <li> Admin can add edit delete any User data </li>
                        <li> Admin can add any File, Course and Test  </li>
                        <li> Users can see only profile and Result </li>		

                        </ul>				
						</div>
						
							<div class="row">

							        <div class="col-sm-4 offset-sm-1">
											<div class="card-box noradius noborder bg-info" style="height:80%;" >
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

									<div class="col-sm-4 offset-sm-1">
											<div class="card-box noradius noborder bg-default" style="height:80%;">
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

								</div>


									

							
						
							<div class = "row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">

							<div id="columnchart_material" style="width: 900px; height: 500px;"></div>
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

	   $element_text = ['Admins', 'Users'];
	   $element_count = [$on_admins, $on_users];
	   
	   for ($i = 0; $i<2; $i++) {

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