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
                    <h1 class="main-title float-left">Gallery</h1>
                        <ol class="breadcrumb float-right">
                          <li class="breadcrumb-item">Home</li>
                          <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div> 
          



<div class="row"> 
<div class="col-sm-12">
        
            

           <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/gall2.jpg" alt="Second slide" height="380px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/gall3.jpg" alt="Second slide" height="380px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/gall4.jpg" alt="Second slide" height="380px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/gall5.png" alt="Third slide" height="380px">
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="../img/gall1.jpg" alt="First slide " height="380px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


          </div>  
        </div>

<br> 
          <div class="row">
<div class="col-sm-5 offset-sm-3">
          <h2>Welcome To The Gallery </h2> 

        </div>
                
                
                <?php  
               
                echo "<div class='row'>";
                echo "<div class='col-sm-5 offset-sm-1' style='margin-top: 20px;'>";
              

               $query = "SELECT * FROM admin_images ORDER BY id DESC";  
                $result = mysqli_query($connection, $query);  

                while($row = mysqli_fetch_array($result))  
                  
                {                 
                               

                                 echo '<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="250" class="img-thumnail" />'; 
                              

                               
                            
                   echo "</div>";   
                   echo "<div class='col-sm-5 offset-sm-1' style='margin-top: 20px;'>";
                             

                     
                } 

                   
                            

                echo "</div>";
                echo "</div>";
   
               
  
                ?>  

           </div>


                  
           </div>  
      </body>  
 </html>  

   
  </div> 

                        </div>
                </div>
            </div>


<script type="text/javascript">
  $('.carousel').carousel({
  interval: 2000
})
</script>
                        
<?php

include 'include/footer.php'

?>











