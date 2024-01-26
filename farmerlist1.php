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
	<title>Pay Farmer Report</title>
</head>
<body>
	<div class="container">
		<div class="container">
		<table class="table table-bordered my-5">
			<tr>
				<td><a href="welcome.php" class="nav nav-link text-success">Home</a></td>
			<td><a href="farmerlist.php" class="nav nav-link text-success">Add Farmer</a></td>
			<td><a href="viewproduct.php" class="nav nav-link text-success">View Product</a></td>
			<td><a href="farmerlist1.php" class="nav nav-link text-success">Pay Farmer</a></td>
			<td><a href="paymentlist.php" class="nav nav-link text-success">Payment List</a></td>
			<td><a href="logout.php" class="nav nav-link text-success">Logout</a></td>
			</tr>
			</table>
			<p class="small text-dark text-center">Choose farmer you want to pay..</p>
	</div>
		<table class="table table-bordered my-5">
			<thead>
				<tr class="text-success">
					<th>No</th>
					<th>Farmer Name</th>
					<th>Id Number</th>
					<th>Crop Type</th>
					<th>Season Type</th>
					<th>Quantity</th>
					<th>Date&Time</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include "connection.php";
					$select = "SELECT * FROM farmer";
					$id=1;
					$result = mysqli_query($connect,$select);
					while ($row = mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?php echo $id?></td>
							<td><?php echo $row['farmername']?></td>
							<td><?php echo $row['IDnumber']?></td>
							<td><?php echo $row['croptype']?></td>
							<td><?php echo $row['seasontype']?></td>
							<td><?php echo $row['quantity']?></td>
							<td><?php echo $row['regdate']?></td>
							<td><a href="payfarmer.php?payfarmer=<?php echo $row['farmid']?>">Pay</a></td>
						</tr>
						<?php
						$id++;
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>