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
	<title>Pay Farmer</title>
</head>
<body>
	<div class="container d-flex justify-content-center">
		<form method="POST" class="my-5 border border-rounded p-5 col-sm-6">
			<?php
				include "connection.php";
				$payfarmer = $_GET['payfarmer'];
				$select = "SELECT * FROM farmer WHERE farmid='$payfarmer'";
				$check = mysqli_query($connect,$select);
				while ($row = mysqli_fetch_assoc($check)) {
					?>
					<h4 class="pb-3 text-success text-center">Pay Farmer</h4>
					<label class="font-weight-bold">Product Name</label>
					<input type="text" name="productname" step="0.1" value="<?php echo $row['croptype']?>" class="form-control mb-3" min="0" required>
					<label class="font-weight-bold">Quantity</label>
					<input type="number" name="quantity" step="0.1" value="<?php echo $row['quantity']?>" class="form-control mb-3" min="0" required>
					<label class="font-weight-bold">Price_Per_Unit</label>
					<input type="number" name="priceperunit" class="form-control mb-3" required>
					<button type="submit" name="pay" class="btn border font-weight-bold text-success">Pay</button>
			</form>
					</div>
					<?php
				}

			?>
		
	<?php
		include "connection.php";
		if (isset($_POST['pay'])) {
			$quantity = $_POST['quantity'];
			$priceperunit = $_POST['priceperunit'];

			$totalpayment = $quantity * $priceperunit;

			$insert = "INSERT INTO payment(payid,farmid,quantity1,price_per_unit,total_payment,paydate) VALUES('','$payfarmer','$quantity','$priceperunit','$totalpayment',NOW())";
			mysqli_query($connect,$insert);
			header("location:welcome.php");
		}
	?>
</body>
</html>