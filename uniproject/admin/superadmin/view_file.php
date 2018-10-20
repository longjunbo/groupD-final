
<?php 

include '../../includes/db.php';
include 'include/head.php';
include 'include/topNav.php';

include 'include/leftsidebarsuper.php';

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
                      <h3><i class="fa fa-table"></i> Files Record</h3>
                      
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

     <table id="example1" class="table table-bordered table-hover display">
                <thead>
                  <tr>
                  <th>ID</th>
                   <th>FILE NAME</th>
                    <th>FILE DESCRIPTION</th>
                    <th>FILE TYPE</th>
                  </tr>
                </thead>                                        
                <tbody>
                <?php
                         $stat=$connection->prepare("select * from admin_files");
                         $stat->execute();
                         while ($row=$stat->fetch()) {
                         
                          $db_id = $row['id'];
                          $db_mime = $row['mime'];

                         $file_description = $row['file_description'];
                       

                         echo "<tr>"; 
                         echo "<td>$db_id </td>";  
                         echo " <td> <a target='_blank' href='admin_fileview.php?id= ".$row['id']."'>".$row['name']."</a></td>" ;
                         echo "<td><a target='_blank' href='admin_fileview.php?id= ".$row['id']."'>".$row['file_description']."</a></td>";            
                        echo "<td><a target='_blank' href='admin_fileview.php?id= ".$row['id']."'>".$row['mime']."</a> </td>";
                          echo "<tr>";


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


