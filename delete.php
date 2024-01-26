<?php
include "connection.php";
$del = $_GET['deli'];
$delete = "DELETE FROM farmer WHERE farmid='$del'";
mysqli_query($connect,$delete);
header("location:farmerlist.php");
?>