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

<!--breadcum -->
 	<div class="row">
								<div class="col-xl-12">
										<div class="breadcrumb-holder">
												<h1 class="main-title float-left">UserFeed</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">UserFeed</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>

   <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-sm-9">

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



                         $query = "SELECT * FROM posts WHERE post_company_id = {$user_company} ";


            	        $query .= "ORDER BY post_id DESC ";
        $select_all_posts_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,200);
        $post_status = $row['post_status'];


?>


         
                <!-- First Blog Post -->
                   <h1>
                    <a href="post.php?p_id=<?php echo $post_id ?>"> <?php echo $post_title ?></a>
                </h1>
                <h4>
                    By  <b> <?php echo $post_author ?> </b>
                </h4>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="../../img/<?php echo $post_image;?>" download>
                <img width="80%" height="300px;"  src="../../img/<?php echo $post_image;?>"> </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="fa fa-chevron-right"> </span></a>

                <hr>
<?php } ?>




              
                <!-- Pager -->
               

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <div class="col-sm-3">




                <!-- Blog Search Well -->
                <div class="card card-body bg-light">
                    <h4>Post Search</h4>
                     <form action="search.php" method="post">
                    <div class="input-group">
                    	<input name="search" type="text" class="form-control">
                        
                        <span class="input-group-btn">
                           <button name="submit" class="btn btn-default" type="submit">                
                             <span class="fa fa-search"> </span>
                        </button>
                        </span>
                    </div>
                </form>
                    <!-- /.input-group -->
                </div>









                <!-- Blog Categories Well -->
             <!--  -->
                    <!-- /.row -->
               
                <!-- Side Widget Well -->
                <div class="card card-body bg-light" style="margin-top: 20px;">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>
    
    <!-- /.container --> 		</div>
				</div>
			</div>


    <!-- jQuery -->
    <script src="js1/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js1/bootstrap.min.js"></script>




			
			<?php

include 'include/footer.php'

?>


