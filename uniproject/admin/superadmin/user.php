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
              <table id="example1" class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                  <th>ID# </th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Email </th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Company Name </th>
                    
                    <th> Edit </th>
                    <th> Delete </th>


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
                       $user_company = $row['user_company_id'];
                    
                       


                       echo "<tr>";
                       echo "<td>$db_id </td>";
                       echo "<td>$user_name </td>";
                       echo "<td>$user_password </td>";
                       echo "<td>$user_email </td>";
                       echo "<td>$user_fname </td>";
                       
                       echo "<td>$user_address </td>";
                       echo "<td>$user_contactnum </td>";
                     

                       $query = "SELECT * FROM companies WHERE company_id = {$user_company} ";
        $select_companies_id = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_companies_id)) {
        $company_id = $row['company_id'];
        $company_title = $row['company_title'];

        
        echo "<td>{$company_title}</td>";
            
        }

                       
                         echo "<td> <a href='edituser.php?edit=$db_id' > <i class='fa fa-edit' style='font-size:30px'></i> </a></td>";
        echo "<td> <a href='user.php?delete=$db_id'><i class='fa fa-trash' style='font-size:30px; color: #d9534f'></i></a> </td>";

                       echo "</tr>";

                       }



                      ?>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script> src="https://cdn.jsdelivr.net/npm/sweetalert"</script>


<script>
  
$(document).ready(function(){
    
  $('#example1').click(function(){
     swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
        } else {
        swal("Your imaginary file is safe!");
        }
      });
    }b );
  
  $('#example2').click(function(){
       swal("Here's the title!", "...and here's the text!");
    });
  
  $('#example3').click(function(){
       swal("Good job!", "You clicked the button!", "success");
    });
  
  $('#example14').click(function(){
       swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
        } else {
        swal("Your imaginary file is safe!");
        }
      });
    });
  
  $('#example5').click(function(){
       swal("Write something here:", {
        content: "input",
      })
      .then((value) => {
        swal(`You typed: ${value}`);
      });
    });
  
  $('#example6').click(function(){
       swal({
        text: 'Search for a movie. e.g. "Titanic".',
          content: "input",
          button: {
          text: "Search!",
          closeModal: false,
          },
        })
        .then(name => {
          if (!name) throw null;
         
          return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
        })
        .then(results => {
          return results.json();
        })
        .then(json => {
          const movie = json.results[0];
         
          if (!movie) {
          return swal("No movie was found!");
          }
         
          const name = movie.trackName;
          const imageURL = movie.artworkUrl100;
         
          swal({
          title: "Top result:",
          text: name,
          icon: imageURL,
          });
        })
        .catch(err => {
          if (err) {
          swal("Oh noes!", "The AJAX request failed!", "error");
          } else {
          swal.stopLoading();
          swal.close();
          }
        });
    });
  
});

</script>
<?php

include 'include/foot.php'

?>