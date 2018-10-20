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
            <div class="col-sm-8">



            	 <?php

    if(isset($_GET['p_id'])){
    
       $the_post_id = $_GET['p_id'];

}
?>

                <?php
            	        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        $select_all_posts_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_status = $row['post_status'];


?>


         
                <!-- First Blog Post -->
                   <h1>
                    <a href="post.php?p_id=<?php echo $post_id ?>"> <?php echo $post_title ?></a>
                </h1>
                <h4 >
                    By  <b> <?php echo $post_author ?> </b>
                </h4>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img width="83%" height="300px;"  src="../../img/<?php echo $post_image;?>">
                <hr>
                <p><?php echo $post_content ?></p>
               

                <hr>
<?php } ?>

              
              <!-- Blog Comments -->
              <?php 

    if(isset($_POST['create_comment'])) {

        $the_post_id = $_GET['p_id'];
      
        $comment_content = $_POST['comment_content'];
          $userauthor =  $_SESSION['full_name']; 

           $query = "INSERT INTO comments (comment_post_id, comment_author, comment_content, comment_status,comment_date)";

            $query .= "VALUES ($the_post_id , '{$userauthor}', '{$comment_content}', 'approved',now())";

            $create_comment_query = mysqli_query($connection, $query);


        }



?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                     <form action="#" method="post" role="form">

                <!-- <div class="form-group">
                    <label for="Author">User</label>
                    <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div>

                <div class="form-group">
                    <label for="Author">Email</label>
                    <input type="email" name="comment_email" class="form-control" name="comment_email">
                </div> -->

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
                </div>

                <hr>

                <!-- Posted Comments -->


                       <?php 


            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
       
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];
                
                ?>

                <!-- Comment -->
                <div class="media">
                     
                    
                        <img class="align-self-start mr-3" src="http://placehold.it/64x64" alt="">
                    
                    <div class="media-body">
                        <h4 class="mt-0"><?php  echo $comment_author ?>
                            <small><?php echo $comment_date;  ?></small>
                        </h4>
                        
                      <p>  <?php echo $comment_content;  ?> </p>
 
                    </div>
                </div>
     
     <?php } ?> 
                <!-- Comment -->


               

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <div class="col-sm-4">




                <!-- Blog Search Well -->
                <div class="card card-body bg-light">
                    <h4>Blog Search</h4>
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


