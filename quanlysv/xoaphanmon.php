<?php 
	
	include('../connect/connect.php');
	$id = $_GET['id'];
	$sql = "DELETE  FROM  tblphanmon WHERE MaID = '$id'";
	$query = mysqli_query($connect, $sql);
	
		header('location: index.php?a=phanmon');
	
 ?>