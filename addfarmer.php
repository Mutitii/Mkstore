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
	<title>Farmer Identification</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
		<div class="container">
			<div class="container">
		<table class="table table-bordered mt-3">
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
			<div class="container d-flex justify-content-center">
			<form method="POST" class="border border-rounded p-5 w-75" style="box-shadow: 4px 5px 20px black;">
				<h2 class="text-success pb-5 text-center">Registration Form</h2>
				<label>FarmerName</label>
				<input type="text" name="farmername" class="form-control">
				<label>IdNumber</label>
				<input type="number" name="idnumber" min="0" class="form-control">
				<label>CropType</label>
				<input type="text" name="croptype" class="form-control">
				<label>SeasonType</label>
				<input type="text" name="seasontype" class="form-control">
				<label>Quantity</label>
				<input type="number" name="quantity" min="0" step="0.1" class="form-control mb-3"> 
				<button type="submit" name="add" class="btn border text-success">Register Now</button>
				<?php
			include "connection.php";
			if (isset($_POST['add'])) {
				$farmername = $_POST['farmername'];
				$idnumber = $_POST['idnumber'];
				$croptype = $_POST['croptype'];
				$seasontype = $_POST['seasontype'];
				$quantity = $_POST['quantity'];

				if (empty($farmername)) {
					echo "<h4 class='small'>Field name empty</h4";
				}elseif (empty($idnumber)) {
					echo "<h4 class='small'>Field id empty</h4";
				}elseif (empty($croptype)) {
					echo "<h4 class='small'>Field type empty</h4";
				}elseif (empty($seasontype)) {
					echo "<h4 class='small'>Field seasontype empty</h4";
				}elseif (empty($quantity)) {
					echo "<h4 class='small'>Field quantity empty</h4";
				}else{

				$insert = "INSERT INTO farmer(farmid,farmername,IDnumber,croptype,seasontype,quantity,regdate) VALUES('','$farmername','$IDnumber','$croptype','$seasontype','$quantity',NOW())";
				mysqli_query($connect,$insert);
				header("location:farmerlist.php");
				}
			}
		?>
			</form>
			</div>
		</div>
</body>
</html>