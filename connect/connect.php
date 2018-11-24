<?php 
	$connect= mysqli_connect('localhost','root','','sinhvien') 
	or die('Lỗi, không kêt nối được');
	mysqli_select_db($connect,'sinhvien');
	mysqli_set_charset($connect, 'UTF8');
 ?>