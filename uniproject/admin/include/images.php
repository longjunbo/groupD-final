<?php  
 $connect = mysqli_connect("localhost", "root", "", "uniproject");  
 if(isset($_POST["insert"]))  
 {    
      $iname = $_POST['iname'];
      $dname = $_POST['dname'];
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO admin_images (name,image_name,image_description) VALUES ('$file','$iname', '$dname')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>  
 
           <br /><br />  
           
                
                <h2 align="left"> Insert images</h2>
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />
                      <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label"> Image Name</label>
                                    
                                    <div class="col-lg-6">

                                        <input class="form-control" name="iname" type="text" value="" placeholder="Image name*" required="required" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label"> Image Description</label>
                                    <div class="col-lg-6">
                                        <textarea rows="4" name="dname" cols="50"  placeholder="Image description"></textarea>
                                    </div>
                                </div>
                                
                                
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  
                
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  