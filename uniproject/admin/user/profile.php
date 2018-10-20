<?php 

include '../../includes/db.php';
include 'include/head.php';

include 'include/topNav.php';
include 'include/leftsidebar.php';

?>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,100%7CRoboto:400,700,300,100' rel='stylesheet' type='text/css'>
<style>


.profile-img{
    text-align: center;
    margin-top: -10%;
}
.profile-img img{
    width: 50%;
    height: 40%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -10%;
    width: 50%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}

.a{
       
  
  font-family: 'Lora', serif;
  
  font-size: 3.5em;
  text-transform: uppercase;
  font-weight: bold;
  text-shadow: 1px 1px 1px #222;
  padding: 30px;
  line-height: .75;
}

.b{
  font-family: 'Lora', serif;
  
  text-transform: uppercase;
  font-weight: bold;
  text-shadow: 1px 1px 1px #222;
  padding: 10px;
  line-height: .75;
}
  strong {
    color: darkcyan;
    font-size: 20px;
  }

  .card-text {
    font-size: 15px;
  }

  h2{
    font-family: 'Lora', serif;
  
  
  text-transform: uppercase;
  font-weight: bold;
  text-shadow: 1px 1px 1px #222;
  padding: 10px;
  line-height: .75;
  }
}


</style>
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
														<li class="breadcrumb-item active">Profile</li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>


          <div class="row my-2">
        <div class="col-sm-10 offset-sm-1">
           
                
                    <h1 class="mb-3 a" > <i class="fa fa-user"></i> Profile</h1>
                    <div class="row">
                        <div class="col-sm-6">

                        	                <?php


                        	                if (isset($_SESSION['id'])){
                                    
                                            $on_user_id = $_SESSION['id'];
                                            } 


                         $query = "SELECT * FROM joinus WHERE id = {$on_user_id} ";
                       $select_users = mysqli_query($connection, $query);
                       
                       while($row = mysqli_fetch_assoc($select_users)) {
                        $db_id = $row['id'];
                        $user_name = $row['username'];
                         $user_full = $row['full_name'];
                       $user_password = $row['password'];
                       $user_email = $row['email'];
                       $user_fname = $row['full_name'];
                       $user_address = $row['Address'];
                       $user_contactnum = $row['contact_num'];
                       $user_company = $row['user_company_id'];
                   }  

                    ?>


                                                <h2>About</h2>
                                                 <?php
                             $query = "SELECT * FROM companies WHERE company_id = {$user_company} ";
        $select_companies_id = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_companies_id)) {
        $company_id = $row['company_id'];
        $company_title = $row['company_title'];
        $company_description = $row['company_description'];
        $company_email = $row['company_email'];
        $company_logo = $row['company_logo'];
        $company_contact_no = $row['company_contact_no'];
        $company_address = $row['company_address'];

        
      
        }
        ?>                  
                           <div class="card border-info mb-3" style="max-width: 26rem;">
  <div class="card-header">Company All Info</div>
  <div class="card-body text-dark">

    <p class="card-text"><strong>
                               Company Name: </strong>  <label><?php echo  $company_title; ?>. </label>  </p>
                               <p class="card-text"> <strong>
                                Description </strong> <i><label> <?php echo  $company_description; ?>. </label> </i>
                            </p>

                            <?php 
                               
                               $query = "SELECT *FROM posts WHERE post_company_id = {$user_company}
                               ";

                               $select_all_posts = mysqli_query($connection, $query);
                          $no_of_posts = mysqli_num_rows($select_all_posts);

                            

                            ?>
                             <p class="card-text"> <strong> 
                                Total No of Posts </strong><label><?php echo  $no_of_posts; ?>. </label> 
                            </p>

                            <?php 
                               
                               $query = "SELECT *FROM admin_login WHERE admin_company_id = {$user_company}
                               ";

                               $select_all_admin_company = mysqli_query($connection, $query);

                          $no_of_admins = mysqli_num_rows($select_all_admin_company);



                            

                            ?>
                             <p class="card-text"> <strong> 
                                Total No of Admins </strong> <label><?php echo  $no_of_admins; ?>. </label> 
                            </p>
  </div>
</div>
                           

                       <hr> 
                        <h2>Contact Info</h2>
                       <div class="card border-info mb-3" style="max-width: 26rem;">
  <div class="card-header">How To Contact Us?</div>
  <div class="card-body text-dark">
      <p class="card-text">
                             <strong> <i class="fa fa-envelope"> </i>  Email ID: </strong> <a href="#"> <label><?php echo  $company_email; ?> </label> </a> 
                            </p> 
                              <p class="card-text"> <strong> <i class="fa fa-phone"> </i> Contact No: </strong> <label> <?php echo  $company_contact_no ?> </label> </p>
                            <p class="card-text"> <strong><i class="fa fa-address-card"></i> Address: </strong> <label> <?php echo  $company_address; ?> </label>   </p>
                                   
  </div>
</div>
                               
                            
                           
                                            <hr>  


                          </div>
                        <div class="col-sm-6" style="margin-top: -4%">
                          <div class="profile-img">
                             <img   src="../../img/<?php echo $company_logo;?>">
                            <div class="file btn btn-lg btn-primary">
                                Company/Admin
                                <input type="file" name="file"/>
                            </div>
                        </div>
                           
                         
                        <div class="col-md-12" style="margin-top: -3%">
                          <hr>
                            <h4 class="mt-2 b"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h4>
                            <table class="table table-sm table-hover table-striped">
                               <tbody> 

                                <?php 
                               
                               $query = "SELECT *FROM posts WHERE post_company_id = {$user_company}
                               ";

                                $select_all_post = mysqli_query($connection, $query);

                                 while($row = mysqli_fetch_assoc($select_all_post )) {
        $post_id            = $row['post_id'];
        $post_author        = $row['post_author'];
        
        $post_title         = $row['post_title'];
        $post_company_id   = $row['post_company_id'];
        $post_status        = $row['post_status'];
        $post_image         = $row['post_image'];
        $post_tags          = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date          = $row['post_date'];
        $post_views_count   = $row['post_views_count'];

           
  
                                                                  
                                  echo  "<tr>";
                                     echo "<td>
                                          <b>{$post_author}</b> added new post $post_author in <b> $company_title</b>
                                        </td>";
                                    echo "</tr>";
                                  }
                                   

                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
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