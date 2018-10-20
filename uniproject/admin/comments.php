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
												<h1 class="main-title float-left">Comments</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Comments</li>
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
                        <th>User Author</th>
                        <th>Comment</th>
                        
                        <th>Status</th>
                        <th>In Response to</th>
                        <th>Date</th>
                        
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>


 <?php 
    
  $query = "SELECT * FROM comments";

    $select_comments = mysqli_query($connection,$query);
//  $select_comments=  mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id          = $row['comment_id'];
        $comment_post_id     = $row['comment_post_id'];
        $comment_author      = $row['comment_author'];
        $comment_content     = $row['comment_content'];
        // $comment_email       = $row['comment_email'];
        $comment_status      = $row['comment_status'];
        $comment_date        = $row['comment_date'];
    
        
        echo "<tr>";
        echo "<td>$comment_id </td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
            

        //   $query = "SELECT * FROM companies WHERE company_id = {$post_company_id} ";
        // $select_companies_id = mysqli_query($connection,$query);  

        // while($row = mysqli_fetch_assoc($select_companies_id)) {
        // $company_id = $row['company_id'];
        // $company_title = $row['company_title'];

        
        // echo "<td>{$company_title}</td>";
            
        // }


        echo "<td>$comment_status</td>";

           
              $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_id_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_post_id_query)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
            
            echo "<td>$post_title</td>";
        
        
        }





         echo "<td>$comment_date</td>";
       
        echo "<td><a href='comments.php?delete=$comment_id'><i class='fa fa-trash' style='font-size:30px; color:    #d9534f'></i></a></td>";
        echo "</tr>";
   

         



}
        
        ?>




    </tbody>
</table>

  <?php

if(isset($_GET['delete'])){
    
    $the_comment_id = ($_GET['delete']);
    
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
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


