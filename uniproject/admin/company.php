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
												<h1 class="main-title float-left">Company</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Company</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>


				
<div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">           
          <div class="card mb-3">
            <div class="card-header">
              <h3><i class="fa fa-table"></i> Company Record</h3>
              
            </div>
              
            <div class="card-body">
              <div class="table-responsive">


           <table id="example1" class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
  
    
            <tr>
                <th>Id</th>
                <th>Company Name</th>
                <th>Company Email</th>
                  <th>Description</th>
                    <th>Logo</th>
                      <th>Contact No</th>
                      <th>Address</th>

                <th> Edit </th>
                <th> Delete </th>
            </tr>
        </thead>
        <tbody>

        <?php 


    $query = "SELECT * FROM companies";
    $select_categories = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_categories)) {
    $company_id = $row['company_id'];
    $company_title = $row['company_title'];
      $company_email = $row['company_email'];
        
          $company_description = substr($row['company_description'],0,50);         
          $company_logo = $row['company_logo'];
        
          $company_contact_no = $row['company_contact_no'];
            $company_address = $row['company_address'];

    echo "<tr>";
        
    echo "<td>{$company_id}</td>";
    echo "<td>{$company_title}</td>";
    echo "<td>{$company_email}</td>";
    echo "<td>{$company_description}</td>";
  
        echo "<td><img width='100' src='../img/$company_logo'> </td>";
    echo "<td>{$company_contact_no}</td>";
    echo "<td>{$company_address}</td>";
   
   echo "<td><a href='editcompany.php?edit={$company_id}'><i class='fa fa-edit' style='font-size:30px; '></i></a></td>";
   echo "<td><a href='company.php?delete={$company_id}'><i class='fa fa-trash' style='font-size:30px; color: #d9534f'></i></a></td>";
    echo "</tr>";

    }




?>

</tbody>
</table>

<?php 

     if(isset($_GET['delete'])){
    $the_company_id = $_GET['delete'];
    $query = "DELETE FROM companies WHERE company_id = {$the_company_id} ";
    $delete_query = mysqli_query($connection,$query);
 

    }


?>
      
                   </div>

								</div>
						</div>
					</div>


					<?php

include 'include/foot.php'

?>