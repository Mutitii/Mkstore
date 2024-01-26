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
	<title>Edit Farmer Identification</title>
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
				<h2 class="text-success pb-5 text-center">Edit Form</h2>
		<?php
			include "connection.php";
			$pd = $_GET['upd'];
			$select = "SELECT * FROM payment WHERE payid='$pd'";
			$sql = mysqli_query($connect,$select);
			while ($row = mysqli_fetch_assoc($sql)) {
		?>
		<p class="font-weight-bold">Quantity: <span class="text-success"><?php echo $row['quantity1']?></span></p>
		<label class="font-weight-bold">Price_Per_Unit</label>
		<input type="number" name="priceperunit" min="0" value="<?php echo $row['price_per_unit']?>" step="0.1" class="form-control mb-3"> 
			<?php
				}
			?>
				<button type="submit" name="add" class="btn border text-success font-weight-bold">Update Now</button>
					<?php
			include "connection.php";
			if (isset($_POST['add'])) {
				$priceperunit = $_POST['priceperunit'];

				if (empty($priceperunit)) {
					echo "<h4 class='small'>Field price empty</h4";
				}else{

				$update = "UPDATE payment SET price_per_unit='$priceperunit' WHERE payid='$pd'";
				mysqli_query($connect,$update);
				header("location:paymentlist.php");
				}
			}
		?>
			</form>
			</div>
		</div>
</body>
</html>