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
	<title>Add Product</title>
</head>
<body>
	<div class="container d-flex justify-content-center">
	<form method="POST" class="my-5 border border-rounded p-5" style="box-shadow: 4px 5px 20px black;">
		<h3 class="text-center text-success pb-5">Add Product You Want To Buy</h3>
		<?php
			include "connection.php";
			$product = $_GET['addproduct'];
			$select = "SELECT * FROM farmer WHERE farmid='$product'";
			mysqli_query($connect,$select);
		?>
		
		<label class="font-weight-bold">Product Name</label>
		<input type="text" name="productname" class="form-control mb-3">
		<button type="submit" name="add" class="btn border-rounded font-weight-bold text-success">Next</button>
	</form>
	</div>
	<?php
		include "connection.php";
		if (isset($_POST['add'])) {
			$addproduct = $_POST['productname'];

			$insert = "INSERT INTO product(productid,farmid,Productname,date_time) VALUES('','$product','$addproduct',NOW())";
			mysqli_query($connect,$insert);
			header("location:welcome.php");

		}
	?>

</body>
</html>
