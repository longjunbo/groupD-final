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
												<h1 class="main-title float-left">Edit Post</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Edit Post</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>
                      

         <div class="row">
			
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">						
      

                 <div class="card mb-3">
          <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Edit Post</h3>
              Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g., <i>email</i> for email address or <i>number</i> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
                 </div>
 
          <div class="card-body">
          <form class="form" role="form" autocomplete="" name="form1" method="post" enctype="multipart/form-data">


             <?php 
                      if (isset($_GET['edit'])){

                    $the_post_id = $_GET['edit'];
                  }
                  
                       $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
                       $select_posts_by_id = mysqli_query($connection, $query); 


        while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id            = $row['post_id'];
        
        $post_title         = $row['post_title'];
        $post_company_id   = $row['post_company_id'];
        $post_status        = $row['post_status'];
        $post_image         = $row['post_image'];
        $post_content       = $row['post_content'];
        $post_tags          = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date          = $row['post_date'];
        
         }


             if(isset($_POST['update_post'])) {
        
        
       
        $post_title          =  ($_POST['post_title']);
        $post_company_id    =  ($_POST['post_company']);
        $post_status         =  ($_POST['post_status']);
        $post_image          =  ($_FILES['image']['name']);
        $post_image_temp     =  ($_FILES['image']['tmp_name']);
        $post_content        =  ($_POST['post_content']);
        $post_tags           =  ($_POST['post_tags']);


        move_uploaded_file($post_image_temp, "../img/$post_image"); 



        if(empty($post_image)) {
        
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $post_image = $row['post_image'];
        
        }
        
        
}


               $post_title = mysqli_real_escape_string($connection, $post_title);

         
          $query = "UPDATE posts SET ";
          $query .="post_title  = '{$post_title}', ";
          $query .="post_company_id = '{$post_company_id}', ";
          $query .="post_date   =  now(), ";
         
          $query .="post_status = '{$post_status}', ";
          $query .="post_tags   = '{$post_tags}', ";
          $query .="post_content= '{$post_content}', ";
          $query .="post_image  = '{$post_image}' ";
          $query .= "WHERE post_id = {$the_post_id} ";
        
        $update_post = mysqli_query($connection,$query);
        
       
        
        echo "<div class='alert alert-success' role='alert'>Post Updated. <a href='posts.php'>View Post </a></div>";
        

    
    
    }
        



                       ?>
                            
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Title </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="post_title" type="text" value="<?php echo htmlspecialchars(stripslashes($post_title)); ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Company </label>
                                    <div class="col-sm-9">
                                    	<select name="post_company" class="form-control">
                                    		
                                    		<?php
                            $query = "SELECT * FROM companies";
        $select_companies = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_companies)) {
        $company_id = $row['company_id'];
        $company_title = $row['company_title'];

        if($company_id == $post_company_id) {

      
        echo "<option selected value='{$company_id}'>{$company_title}</option>";


        } else {

          echo "<option value='{$company_id}'>{$company_title}</option>";


        }
            
        }
        ?>
   

                                    	</select>
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Author </label>
                                    <div class="col-sm-9">
                                        <select name="post_author" class="form-control">
                                    		
                                    		<?php
                            $query = "SELECT * FROM admin_login";
        $select_adminname = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_adminname)) {
        $admin_id = $row['admin_id'];
        $admin_name = $row['admin_name'];

        
         echo "<option value='$admin_name'>{$admin_name}</option>";
            
        }
        ?>
   

                                    	</select>
                                    </div>
                                </div>

                                

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Status</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="post_status" type="text" value="<?php echo $post_status ?>" >
                                    </div>
                                </div>
                                

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Image</label>
                                    <div class="col-sm-9">
                                      <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
                                        <input class="form-control" name="image" type="file" value="">
                                    </div>
                                </div>
                                
                                

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Tags</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="post_tags" type="text" value="<?php echo $post_tags; ?>">
                                    </div>
                                </div>
                               

                                   <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Content</label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control form-control-lg" name="post_content" id="body"  rows="40"><?php echo $post_content; ?>
                                    </textarea >
                                </div>
                                </div>
                            

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label form-control-label"></label> 
                                
                                   
                                        <input class="btn btn-success" type="submit" name="update_post" value="Update Post">
                                    
                                </div>
                            </form>

     


                 
      </div>														
   </div><!-- end card-->	

  </div> <!--end column --> 
  </div> 





</div>
</div>
</div>



<script type="text/javascript">
	$(document).ready(function(){

	  ClassicEditor
        .create( document.querySelector( '#body'))
        .catch( error => {
            console.error( error );
        } );
});
</script>

<?php

include 'include/footer.php'

?>


