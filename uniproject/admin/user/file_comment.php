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
												<h1 class="main-title float-left">File</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Comment</li>
													<li class="breadcrumb-item active">File       

												</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>

   <div class="row">
       

         <!-- Blog Entries Column -->



                

                <div class="col-sm-10"> 
            
                  <!-- Blog Comments -->
              <?php 

              if(isset($_GET['c_id'])){
    
       $the_commentfile_id = $_GET['c_id'];
  }
      

    if(isset($_POST['create_comment'])) {
        
           
      
        $comment_content = $_POST['comment_content'];
          $userauthor =  $_SESSION['full_name']; 

           $query = "INSERT INTO file_comments (file_admin_id, comment_user_name, comment_content, comment_date)";

            $query .= "VALUES ($the_commentfile_id, '$userauthor', '$comment_content', now())";

            $create_filecomment_query = mysqli_query($connection, $query);


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

                      <!-- Posted Comments -->


                       <?php 


            $query = "SELECT * FROM file_comments WHERE file_admin_id = {$the_commentfile_id} ";
       
            $query .= "ORDER BY file_comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_user_name'];
                
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

                       

                

                </div>

   </div>






</div>
</div>
</div>

<?php
include 'include/footer.php';


?>