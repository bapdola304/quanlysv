
<?php 

	$masv = $_GET['ma'];
	$sql_ctsv = "SELECT * FROM `tblsinhvien` WHERE MaSV = '$masv'";
	$queryctsv = mysqli_query($connect, $sql_ctsv);
	$rowctsv = mysqli_fetch_array($queryctsv);

 ?>


<div class="container">
	
	<div class="dssv" style="margin-top: 60px;">
		<h1>Chi Tiết Thông Tin SV : <?= $rowctsv['HoTen']  ?></h1>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail" style="float: left">
        <img src="img/<?= $rowctsv['Avatar']  ?>" alt="..." width="100%" style="height: 400px; float: left;">
      </div>
    </div>
    <div class="col-md-6 info">
    	<p>Mã SV : <?= $rowctsv['MaSV']?></p>
    	<p>Họ Tên : <?= $rowctsv['HoTen']  ?></p>
    	<p>Ngày Sinh : <?= $rowctsv['NgaySinh']  ?></p>
    	<p>Email : <?= $rowctsv['Email']  ?></p>
    	<p>Số ĐT : <?= $rowctsv['SDT']  ?></p>
    	<p>Lớp: <?= $rowctsv['Lop']  ?></p>
    </div>

</div>
</div>