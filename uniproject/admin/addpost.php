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
												<h1 class="main-title float-left">Add Post</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Add Post</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>
                      

         <div class="row">
			
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">						
      

                 <div class="card mb-3">
          <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Add Post</h3>
              Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g., <i>email</i> for email address or <i>number</i> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
                 </div>
 
          <div class="card-body">


          	<?php 
           

             if(isset($_POST['create_post'])) {
   
            $post_title        = ($_POST['post_title']);
            $post_author         = ($_POST['post_author']);
            $post_company_id  = ($_POST['post_company']);
            
            $post_status       = ($_POST['post_status']);
    
            $post_image        = ($_FILES['image']['name']);
            $post_image_temp   = ($_FILES['image']['tmp_name']);
    
    
            $post_tags         = ($_POST['post_tags']);
            $post_content      = ($_POST['post_content']);
            $post_date         = (date('d-m-y'));
            $post_comment_count = 4;



       
        move_uploaded_file($post_image_temp, "../img/$post_image" );



   
      $query = "INSERT INTO posts(post_company_id, post_title, post_author,post_date,post_image,post_content,post_tags,post_status) ";
             
      $query .= "VALUES({$post_company_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 
             
      $create_post_query = mysqli_query($connection, $query);  

      if(!$create_post_query) {
      	die("Query failed" . mysqli_error($connection));
      }

}
          	?>
 
          <form class="form" role="form" autocomplete="" name="form1" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Title </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="post_title" type="text" value="" >
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

        
         echo "<option value='$company_id'>{$company_title}</option>";
            
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
                                        <input class="form-control" name="post_status" type="text" value="" >
                                    </div>
                                </div>
                                

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Image</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="image" type="file" value="">
                                    </div>
                                </div>
                                
                                

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Tags</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="post_tags" type="text" value="">
                                    </div>
                                </div>
                               

                                   <div class="form-group row">
                                    <label class="col-sm-3 col-form-label form-control-label">Post Content</label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control form-control-lg" name="post_content" id="body"  rows="40">
                                    </textarea >
                                </div>
                                </div>
                            

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label form-control-label"></label> 
                                
                                   
                                        <input class="btn btn-outline-primary" name="create_post" type="submit" value="Publish Post">
                                    
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


