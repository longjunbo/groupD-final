
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
                        <h1 class="main-title float-left">Files</h1>
                        <ol class="breadcrumb float-right">
                          <li class="breadcrumb-item">Home</li>
                          <li class="breadcrumb-item active">Files</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div> 
          

<div class="row">
				
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
                  <div class="card mb-3">
                    <div class="card-header">
                      <h3><i class="fa fa-table"></i> Downloads</h3>
                      
                    </div>

    <?php 
    
      
$connection = new PDO("mysql:host=localhost;dbname=uniproject","root","");
     if (isset($_POST['btn'])) {
     	$name=$_FILES['myfile']['name'];
     	$type=$_FILES['myfile']['type'];
     	$data=file_get_contents($_FILES['myfile']['tmp_name']);
     	$stmt=$connection->prepare("insert into admin_files values('',?,?,?)");

        $stmt->bindParam(1,$name);   
        $stmt->bindParam(2,$type);
        $stmt->bindParam(3,$data);
        $stmt->execute();
     }

     ?>
    
     <p></p>
       
     
            

  <div class="card-body">
              <div class="table-responsive">

     <table id="example1" class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                  <th>ID</th>
                   <th>File Name</th>
                    <th>File Description</th>
                    <th>File Type</th>
                    <th>View/Download</th>
                    <th>Comments</th>
                  
                    
                  </tr>
                </thead>                                        
                <tbody>
                <?php
                         $stat=$connection->prepare("select * from admin_files");
                         $stat->execute();
                         while ($row=$stat->fetch()) {
                         
                          $db_id = $row['id'];
                          $db_mime = $row['mime'];
                          $db_name = $row['name'];

                         $file_description = $row['file_description'];
                       

                         echo "<tr>"; 
                         echo "<td>$db_id </td>";  
                         echo " <td> $db_name </td>" ;
                         echo "<td> $file_description  </td>";   

                        echo "<td> $db_mime </td>";

                        echo " <td> <a target='_blank' class='btn btn-outline-dark' href='admin_fileview.php?id= ".$row['id']."'><i class='fa fa-eye' > View</i></a> </td>" ;;
                        echo " <td> <a  class='btn btn-outline-success' href='file_comment.php?c_id=$db_id'><i class='fa fa-comment' > Comments</i></a> </td>" ;;

                      //   echo "<td><a href='view.php?edit={$db_id}' type=button class='btn btn-sm btn-primary' role='button' > Edit </a>
                      // <a href='viewfile.php?delete={$db_id}' class='btn btn-sm btn-danger' role='button' id='#example5'> Delete </a></td>";

                          echo "</tr>";

                           

                           }
                      ?>
                                        </tbody>
                  </table>
              
              </tbody>
              </table> 
                     
   </div><!-- end card--> 
             
        
   </div><!-- end card--> 

  </div> <!--end column --> 
  </div> 

                        </div>
                </div>
            </div>


                        
<?php

include 'include/footer.php'

?>


