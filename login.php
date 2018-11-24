<?php 
	session_start();
	include('connect/connect.php');
	if(isset($_POST['login'])){
		$tk = $_POST['username'];
		$mk = $_POST['pass'];
		$sqldn = "SELECT * FROM tbllogin WHERE TaiKhoan = '$tk' AND MatKhau = '$mk' ";
		$querydn = mysqli_query($connect,$sqldn);

		$kt = mysqli_num_rows($querydn);
		if($kt > 0){
			$_SESSION['user'] = $tk;
			header('location: index.php');
		}else{
			echo "<script> alert('Tài Khoản hoặc Mật Khẩu Sai!')</script>";
		}
	}


 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="" method="POST">
					<span class="login100-form-title p-b-32">
						LOGIN
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
					
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>
					
			

					<div class="container-login100-form-btn">
						<button type= "submit" class="login100-form-btn" name="login">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	

<!--===============================================================================================-->


</body>
</html>