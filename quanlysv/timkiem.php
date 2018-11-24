<?php
if(isset($_POST['timkiem'])){

$key = $_POST['key'];
  $sqltimkiem = "SELECT * FROM tblsinhvien WHERE Lop LIKE '%$key%' OR MaSV LIKE '%$key%' OR HoTen LIKE '%$key%'";
$querytimkiem = mysqli_query($connect, $sqltimkiem);
$kq = mysqli_num_rows($querytimkiem);
}

?>

<div class="container">
<h3>Tìm Thấy <?= $kq ?> Kết Quả</h3>
<div class="dssv" style="margin-top: 60px;">
<?php while($rowsv = mysqli_fetch_array($querytimkiem)){ ?>
<a href="index.php?a=chitiet&ma=<?= $rowsv['MaSV'] ?>">
<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
    <img src="img/<?= $rowsv['Avatar']  ?>" alt="..." width="100%" style="height: 300px;">
    <div class="caption">
      <h3><?= $rowsv['HoTen']  ?></h3>
      <p>Mã SV : <?= $rowsv['MaSV']  ?></p>
      <p>Lớp : <?= $rowsv['Lop']  ?></p>
    </div>
  </div>
</div>
</a>
<?php } ?>

</div>