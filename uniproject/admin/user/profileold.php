<?php 

include '../../includes/db.php';
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
													<h1 class="main-title float-left">Home</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Dashboard</li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>


          <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
           
                
                    <h3 class="mb-3">User Profile</h3>
                    <div class="row">
                        <div class="col-md-6">

                        	                <?php


                        	                if (isset($_SESSION['id'])){
                                    
                                            $on_user_id = $_SESSION['id'];
                                            } 


                         $query = "SELECT * FROM joinus WHERE id = {$on_user_id} ";
                       $select_users = mysqli_query($connection, $query);
                       
                       while($row = mysqli_fetch_assoc($select_users)) {
                        $db_id = $row['id'];
                        $user_name = $row['full_name'];
                       $user_password = $row['password'];
                       $user_email = $row['email'];
                       $user_fname = $row['full_name'];
                       $user_address = $row['Address'];
                       $user_contactnum = $row['contact_num'];
                       $user_company = $row['company_name'];
                   }
                    ?>


                                                <h5>About</h5>
                                                <p>
                                UserID:  <i><?php echo  $db_id ?> </i>
                            </p>
                            <p>
                                Full Name: <i> <?php echo  $user_name; ?> </i>.
                            </p>
                            
                            <h5>Contact Info</h5>
                           
                                <p>
                                Email ID:  <a href="#"> <i> <?php echo  $user_email; ?></i> </a> 
                            </p> 
                            <p> Contact No: <i> <?php echo  $user_contactnum ?>  </i></p>
                            <p> Fax: <i> <?php echo  $user_address; ?> </i>  </p>
                                                   </div>
                        <div class="col-md-6">
                            <h6>Recent badges</h6>
                            <a href="#" class="badge badge-dark badge-pill">html5</a>
                            <a href="#" class="badge badge-dark badge-pill">react</a>
                            <a href="#" class="badge badge-dark badge-pill">codeply</a>
                            <a href="#" class="badge badge-dark badge-pill">angularjs</a>
                            <a href="#" class="badge badge-dark badge-pill">css3</a>
                            <a href="#" class="badge badge-dark badge-pill">jquery</a>
                            <a href="#" class="badge badge-dark badge-pill">bootstrap</a>
                            <a href="#" class="badge badge-dark badge-pill">responsive-design</a>
                            <hr>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                            <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                    

             <div class="col-lg-4 order-lg-1 text-center">
            <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6 class="mt-2">Upload a photo</h6>
            <form role="form" method="post">
               <div class="form-group row">
                                    
                                    <div class="col-sm-2">
                                        <input class="form-control" name="image" type="file" value="">
                                    </div>
                                </div>
                                
  </form>

            
        </div>
    </div>
</div>

					</div>

				</div>




<script>
    // sandbox disable popups
    if (window.self !== window.top && window.name!="view1") {;
      window.alert = function(){/*disable alert*/};
      window.confirm = function(){/*disable confirm*/};
      window.prompt = function(){/*disable prompt*/};
      window.open = function(){/*disable open*/};
    }
    
    // prevent href=# click jump
    document.addEventListener("DOMContentLoaded", function() {
      var links = document.getElementsByTagName("A");
      for(var i=0; i < links.length; i++) {
        if(links[i].href.indexOf('#')!=-1) {
          links[i].addEventListener("click", function(e) {
          console.debug("prevent href=# click");
              if (this.hash) {
                if (this.hash=="#") {
                  e.preventDefault();
                  return false;
                }
                else {
                  /*
                  var el = document.getElementById(this.hash.replace(/#/, ""));
                  if (el) {
                    el.scrollIntoView(true);
                  }
                  */
                }
              }
              return false;
          })
        }
      }
    }, false);
  </script>



  <?php 

  include 'include/footer.php';

  ?>