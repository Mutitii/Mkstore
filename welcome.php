<?php
	session_start();
	if ($_SESSION["username"]) {
	echo "Welcome ".$_SESSION["username"];
}else{
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Welcom To XYZ Irregiration Scheme</title>
</head>
<body>
	<div class="container">
		<header class="d-flex justify-content-center">
			<a href="farmerlist.php" class="nav nav-link text-success">Add Farmer</a>
			<a href="viewproduct.php" class="nav nav-link text-success">View Product</a>
			<a href="farmerlist1.php" class="nav nav-link text-success">Pay Farmer</a>
			<a href="paymentlist.php" class="nav nav-link text-success">Payment List</a>
			<a href="logout.php" class="nav nav-link text-success">Logout</a>
			</header>
	</div>
	<div class="container pt-5">
		<h3 class="text-dark text-center pt-5">Welcome To XYZ Irregiration Company Limitted</h3>
	</div>
</body>
</html>