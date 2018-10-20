<?php 

      
$connection = new PDO("mysql:host=localhost;dbname=uniproject","root","");

$id=isset($_GET['id'])? $_GET['id'] : "";
 $stat=$connection->prepare("select * from admin_files where id= ?");
    
    $stat->bindParam(1,$id);
    $stat->execute();
    $row=$stat->fetch(); 
    header('Content-type:'.$row['mime']);
    echo $row['data'];
 ?>

 