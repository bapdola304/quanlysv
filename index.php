<?php 
  session_start();

include('connect/connect.php');
  
  if(!$_SESSION['user']){
     header('location: login.php');
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sinh Viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<style>
    .info p{
      font-family: Verdana,sans-serif;
      font-size: 18px;
      margin: 10px 0px;
  }
</style>
<body>



          <?php include('menu.php') ?>
          <?php
                if(isset($_GET['a']) && $_GET['a'] == 'chitiet' ){
                    include('chitiet.php');
                }else if(isset($_GET['a']) && $_GET['a'] == 'timkiem'){
                    include('timkiem.php');
                }else{
                    include('danhsach.php');
                }

             ?>

</body>
</html>

