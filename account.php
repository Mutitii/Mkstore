
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Employee Account</title>
</head>
<body>
	<div class="container d-flex justify-content-center my-5">
	<form method="POST" class="my-5 border border-rounded px-5 py-3 col-sm-8" style="box-shadow: 4px 5px 20px black;">
		<h3 class="text-center text-success">SIgnUp Here</h3>
		<label class="font-weight-bold">Fullname</label>
		<input type="text" name="fullname" class="form-control" required>
		<label class="font-weight-bold">Department</label>
		<input type="text" name="department" class="form-control" required>
		<label class="font-weight-bold">Responsibility</label>
		<input type="text" name="responsibility" class="form-control" required>
		<label class="font-weight-bold">Level</label>
		<input type="text" name="level" class="form-control" required>
		<label class="font-weight-bold">Username</label>
		<input type="text" name="username" class="form-control" required>
		<label class="font-weight-bold">Password</label>
		<input type="password" name="password" class="form-control" required>
		<button type="submit" name="signup" class="btn border-rounded mt-2 text-success font-weight-bold">SignUp</button>
		<span class="pl-2 small">I don't have an account</span><a href="index.php" class="text-success">Login</a>
	</form>
	</div>
	<?php
		include "connection.php";
		if (isset($_POST['signup'])) {
			$fullname = $_POST['fullname'];
			$department = $_POST['department'];
			$responsibility = $_POST['responsibility'];
			$level = $_POST['level'];
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$insert = "INSERT INTO employee(empid,fullname,department,responsibility,level,username,password) VALUES('','$fullname','$department','$responsibility','$level','$username','$password')";
			mysqli_query($connect,$insert);
			header("location:index.php");
		}
	?>
</body>
</html>