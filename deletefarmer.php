<?php
include "connection.php";
$id = $_GET['payid'];
$delete = "DELETE FROM payment WHERE payid='$id'";
mysqli_query($connect,$delete);
header("location:paymentlist.php");
?>