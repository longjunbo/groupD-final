    <form action="" method="post">
      <div class="form-group">
         <label for="cat-title">Edit Category</label>
         
         
         <?php

        if(isset($_GET['edit'])){

            $company_id = escape($_GET['edit']);



    
        $query = "SELECT * FROM companies WHERE company_id = $company_id ";
        $select_categories_id = mysqli_query($connection,$query);  

            while($row = mysqli_fetch_assoc($select_categories_id)) {
            $company_id = $row['company_id'];
            $company_title = $row['company_title'];
                
            ?>
            
 <input value="<?php echo $company_title; ?>" type="text" class="form-control" name="cat_title">
        
        
        
       <?php }} ?>
       
     <?php   

        /////////// UPDATE QUERY

            if(isset($_POST['update_category'])) {

                $the_company_title = escape($_POST['company_title']);

                $stmt = mysqli_prepare($connection, "UPDATE companies SET company_title = ? WHERE company_id = ? ");

                 mysqli_stmt_bind_param($stmt, 'si', $the_company_title, $company_id);

                 mysqli_stmt_execute($stmt);


                         if(!$stmt){
                      
                          die("QUERY FAILED" . mysqli_error($connection));
                      
                      }

                      mysqli_stmt_close($stmt);


                     redirect("companies.php");
          
         }

    ?>
       
     
         
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
      </div>

    </form>
