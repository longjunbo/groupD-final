
<?php 

include '../../includes/db.php';
include 'include/head.php';
include 'include/topNav.php';

include 'include/leftsidebarsuper.php';

?>
<style >
  
  input#myfile {
    width: 226px;
}
</style>

<div class="content-page">
  
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">

<!--breadcum -->
  <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Add Files</h1>
                        <ol class="breadcrumb float-right">
                          <li class="breadcrumb-item">Home</li>
                          <li class="breadcrumb-item active">Add Files</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div> 
          

 

    <?php 
    
      
$connection = new PDO("mysql:host=localhost;dbname=uniproject","root","");
     if (isset($_POST['btn'])) {
      $fdescription = $_POST['fdescription'];
     	$name=$_FILES['myfile']['name'];
     	$type=$_FILES['myfile']['type'];
     	$data=file_get_contents($_FILES['myfile']['tmp_name']);
     	$stmt=$connection->prepare("insert into admin_files values('',?,?,?,'$fdescription')");

        $stmt->bindParam(1,$name);   
        $stmt->bindParam(2,$type);
        $stmt->bindParam(3,$data);
        $stmt->execute();
     }

     ?>
  
        <div class="row">
      
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">           


 
                <h2 align="left"> Insert Files</h2>
                <br />  
        
 
          <form class="form" role="form" autocomplete="" name="form1" method="post"  enctype="multipart/form-data">
     
   
                     <input type="file" name="myfile" id="myfile" />  
                     
                      
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label"> File Description</label>
                                    <div class="col-lg-6">
                                        <textarea rows="4" name="fdescription" cols="50"  placeholder="Image description"></textarea>
                                    </div>
                                </div>
                                
                                
                     <input type="submit" name="btn" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
<br><br><br><br><br><br>





   
   <p></p>

 

    


                     
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


