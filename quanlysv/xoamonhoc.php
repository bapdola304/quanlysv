<?php 
	
	include('../connect/connect.php');
	$mamon = $_GET['id'];
	echo $mamon;
	$sqlmonhoc = "DELETE  FROM  tblmonhoc WHERE MaMH = '$mamon'";
	$querymonhoc = mysqli_query($connect, $sqlmonhoc);
	
		header('location: index.php?a=themmon');
	
 ?>