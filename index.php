<?php
	session_start();
	if (isset($_SESSION["username"])) {
	header("location:index.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Employee Account Login</title>
</head>
<body>
	<div class="container d-flex justify-content-center my-5">
	<form method="POST" class="my-5 border border-rounded p-5 col-sm-7" style="box-shadow: 4px 5px 20px black;">
		<h3 class="text-center text-success pb-4">Login Here</h3>
		<label class="font-weight-bold">Username</label>
		<input type="text" name="username" class="form-control"><br><br>
		<label class="font-weight-bold">Password</label>
		<input type="password" name="password" class="form-control"><br><br>
		<?php
	include "connection.php";
		if (isset($_POST['Login'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$select = "SELECT * FROM employee WHERE username='$username' and password='$password'";
			$result = mysqli_query($connect,$select);
			$num = mysqli_num_rows($result);
			if($num == 1){
					$_SESSION['username'] = $username;
					header('location:welcome.php');
					exit();
				}else{
					echo "<h6 class='text-center text-success font-weight-bold'>Incorrect Username or Password</h6>";
					
				}
			}
	?>
		<button type="submit" name="Login" class="btn border-rounded text-success font-weight-bold">Login</button><span class="pl-2 small">I don't have an account</span>
		<a href="account.php" class="text-success">SignUp</a>
	</form>
	</div>
	
</body>
</html>