<?php 
	
	include('../connect/connect.php');
	$masv = $_GET['id'];
	echo $masv;
	$sqlmonhoc = "DELETE  FROM  tblsinhvien WHERE MaSV = '$masv'";
	$querymonhoc = mysqli_query($connect, $sqlmonhoc);
	
		header('location: index.php?a=themsv');
	
 ?>