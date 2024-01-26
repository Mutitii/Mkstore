<?php
	session_start();
	if ($_SESSION["username"]) {
		
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
	<title>Product list</title>
</head>
<body>
	<div class="container">
		<div class="container">
		<table class="table-responsive-sm table-bordered my-5 col-sm-12" width="100%">
			<tr>
				<td><a href="welcome.php" class="nav nav-link text-success">Home</a></td>
			<td><a href="farmerlist.php" class="nav nav-link text-success">Add Farmer</a></td>
			<td><a href="viewproduct.php" class="nav nav-link text-success">View Product</a></td>
			<td><a href="farmerlist1.php" class="nav nav-link text-success">Pay Farmer</a></td>
			<td><a href="paymentlist.php" class="nav nav-link text-success">Payment List</a></td>
			<td><a href="logout.php" class="nav nav-link text-success">Logout</a></td>
			</tr>
			</table>
	</div>
	<p class="small text-dark text-center">View product your have been saved, also you can Remove or Edit the product if you write a mistake..</p>
		<table class="table table-responsive-sm table-bordered my-5" width="100%">
			<thead>
				<tr class="text-success">
					<th>No</th>
					<th>Framer Name</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Date&Time </th>
				</tr>
			</thead>
			<tbody>
				<?php
				include "connection.php";
				$pid=1;
				$select = "SELECT * FROM product LEFT JOIN farmer ON product.farmid=farmer.farmid";
				$sql = mysqli_query($connect,$select);
				while ($rw=mysqli_fetch_assoc($sql)) {
					?>
					<tr>
						<td><?php echo $pid?></td>
						<td><?php echo $rw['farmername']?></td>
						<td><?php echo $rw['Productname']?></td>
						<td><?php echo $rw['quantity']?></td>
						<td><?php echo $rw['date_time']?></td>			
					</tr>
					<?php
					$pid++;
				}

				?>
			</tbody>
		</table>
	</div>
</body>
</html>