
<?php


if(isset($_POST['Submit'])) {

    
    $username = $_POST['username'];
    $password = $_POST['password'];
  
  $connection = mysqli_connect('localhost', 'root', '', 'uniproject' );

     if (!$connection) {

        die("Database connection failed");
      }

    $query = "INSERT INTO signup (username,password)
VALUES ('$username', '$password');";
    
   

    $result = mysqli_query($connection, $query);

      if (!$result) {

        die( 'QUERY FAILED' . mysqli_error() );
      }

      else {
        header("Location: ../index.php");
       
        
    
    }
}
    
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="signup.php" method="post">

	


<input type="text" name="username">
<input type="text" name="password">
 <input  name="Submit" type="submit" value="submit">

</form>


</body  >
</html>