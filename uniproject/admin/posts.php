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
												<h1 class="main-title float-left">Posts</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Posts</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>



   <div class="row">
				
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
          <div class="card mb-3">
            <div class="card-header">
              <h3><i class="fa fa-table"></i> Posts Record</h3>
              
            </div>
              
            <div class="card-body">
              <div class="table-responsive">
              <table id="example1" class="table table-striped table-bordered table-hover">


                 
                <thead>
                    <tr>
               
                        <th>Id</th>
                        <th>Authors</th>
                        
                        <th>Title</th>
                        <th>Company</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                       
                       <th>Edit</th>
                        <th> Delete</th>
                        
                    </tr>
                </thead>
                
                      <tbody>


 <?php 
    
    $query = "SELECT * FROM posts ";
    $select_posts = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts )) {
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
        
        echo "<tr>";
        echo "<td>$post_id </td>";
        echo "<td>$post_author </td>";
        
        echo "<td>$post_title </td>";

          $query = "SELECT * FROM companies WHERE company_id = {$post_company_id} ";
        $select_companies_id = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_companies_id)) {
        $company_id = $row['company_id'];
        $company_title = $row['company_title'];

        
        echo "<td>{$company_title}</td>";
            
        }
   

         



        echo "<td>$post_status</td>";
        
        echo "<td><img width='100' src='../img/$post_image'> </td>";

        echo "<td>$post_tags </td>";
          

        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
        $send_comment_query = mysqli_query($connection, $query);

        $row = mysqli_fetch_array($send_comment_query);
        $comment_id = $row['comment_id'];
        $count_comments = mysqli_num_rows($send_comment_query);


        echo "<td><$count_comments</td>";



       
        echo "<td>$post_date </td>";
        echo "<td> <a href='editpost.php?edit=$post_id' > <i class='fa fa-edit' style='font-size:30px'></i> </a></td>";
        echo "<td> <a href='posts.php?delete=$post_id'><i class='fa fa-trash' style='font-size:30px; color:	#d9534f'></i></a> </td>";
        echo "</tr>";
}
        
        ?>

    </tbody>
</table>

                       <?php 


                            if(isset($_GET['delete'])){
    
    $the_post_id = ($_GET['delete']);
    
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
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



			                        
<?php

include 'include/footer.php'

?>


