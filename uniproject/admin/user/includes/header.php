<?php  
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");


if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Swirlfeed</title>

	<!-- Javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="asset/js/bootstrap.js"></script>
	<script src="asset/js/bootbox.min.js"></script>
	<script src="asset/js/demo.js"></script>
	<script src="asset/js/jquery.jcrop.js"></script>
	<script src="asset/js/jcrop_bits.js"></script>




	<!-- CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<link rel="stylesheet" href="asset/css/jquery.Jcrop.css" type="text/css" />
	
</head>
<body >


	


	