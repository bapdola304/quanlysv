<?php
$sqlmonhoc = "SELECT * FROM `tblmonhoc`";
$querymonhoc = mysqli_query($connect, $sqlmonhoc);
?>
<?php


if(isset($_POST['them'])){
    $mamon = $_POST['mamon'];
    $tenmon = $_POST['tenmon'];
    $socth = $_POST['socth'];
    $soclt = $_POST['soclt'];
    $socbt = $_POST['socbt'];
    $tongsotiet = $socth*30 + $soclt*15 + $socbt*45;
    $themmon="INSERT INTO tblmonhoc VALUES('$mamon','$tenmon','$socth','$soclt','$socbt','$tongsotiet')";
    $query_themmon=mysqli_query($connect,$themmon);
    header('location: index.php?a=themmon');

}
if(isset($_POST['sua'])){
    $mamon = $_POST['mamon'];
    $tenmon = $_POST['tenmon'];
    $socth = $_POST['socth'];
    $soclt = $_POST['soclt'];
    $socbt = $_POST['socbt'];
     $tongsotiet = $socth*30 + $soclt*15 + $socbt*45;
    $suamh = "UPDATE tblmonhoc SET MaMH = '$mamon', TenMH = '$tenmon', SoChiTH = '$socth', SoChiLT = '$soclt', SoChiBT = '$socbt',ToongSoTiet = '$tongsotiet' WHERE MaMH = '$mamon' ";
    $query_suamh=mysqli_query($connect,$suamh);
    header('location: index.php?a=themmon');
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản Lý Môn Học</h1>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Môn Học</button>
        </div>
        <!-- /.col-lg-12 -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm Môn Học</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group "><label>Mã Môn</label><input class="form-control" type="text" name="mamon" value="" /></div>
                            <div class="form-group "><label>Tên Môn</label><input class="form-control" type="text" name="tenmon" value=""/>
                        </div>
                        <div class="form-group "><label>Số Chỉ Thực Hành</label><input class="form-control" type="number" name="socth" value=""/>
                    </div>
                    <div class="form-group "><label>Số Chỉ Lý Thuyết</label><input class="form-control" type="number" name="soclt" value=""/>
                </div>
                <div class="form-group "><label>Số Chỉ Bài Tập</label><input class="form-control" type="number" name="socbt" value=""/>
            </div>
            <button type="submit" class="btn btn-primary ml-3" name="them">Thêm</button>
        </form>
    </div>
</div>
</div>
</div>
<!-- Modal -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
    Danh Sách Môn Học
</div>
<div class="panel-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Môn</th>
                <th>Tên Môn</th>
                <th>Số Chỉ Thực Hành</th>
                <th>Số Chỉ Lý Thuyết</th>
                <th>Số Chỉ Bài Tập</th>
                <th>Tổng Số Tiết</th>
                <th>Quản Lý</th>
                
            </tr>
        </thead>
        <tbody>
            <?php  while($rowmh = mysqli_fetch_array($querymonhoc)){
            
            ?>
            <tr>
                <td><?= $rowmh['MaMH'] ?></td>
                <td><?= $rowmh['TenMH'] ?></td>
                <td><?= $rowmh['SoChiTH'] ?></td>
                <td><?= $rowmh['SoChiLT'] ?></td>
                <td><?= $rowmh['SoChiBT'] ?></td>
                <td><?= $rowmh['ToongSoTiet'] ?></td>
                <td>
                    <a href="#">
                        <i class="fas fa-edit" style="margin:0px 20px" data-toggle="modal" data-target="#myModal<?= $rowmh['MaMH'] ?>" ></i>
                        <a href="xoamonhoc.php?id=<?= $rowmh['MaMH'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không?');" >
                                        <i class="fas fa-trash-alt" style="margin:0px 20px" ></i>
                        </a>
                    </a>
                    
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="myModal<?= $rowmh['MaMH'] ?>" role="dialog">
                <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Sinh Viên</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" >
                            <div class="form-group "><label>Mã Môn</label><input class="form-control" type="text" name="mamon" value="<?= $rowmh['MaMH'] ?>" /></div>
                            <div class="form-group "><label>Tên Môn</label><input class="form-control" type="text" name="tenmon" value="<?= $rowmh['TenMH'] ?>"/>
                        </div>
                        <div class="form-group "><label>Số Chỉ Thực Hành</label><input class="form-control" type="number" name="socth" value="<?= $rowmh['SoChiTH'] ?>"/>
                    </div>
                    <div class="form-group "><label>Số Chỉ Lý Thuyết</label><input class="form-control" type="number" name="soclt" value="<?= $rowmh['SoChiLT'] ?>"/>
                </div>
                <div class="form-group "><label>Số Chỉ Bài Tập</label><input class="form-control" type="number" name="socbt" value="<?= $rowmh['SoChiBT'] ?>"/>
            </div>
            <button type="submit" class="btn btn-primary ml-3" name="sua">Sửa</button>
        </form>
    </div>
</div>

</div>
</div>
<!-- Modal -->
<?php } ?>


</tbody>
</table>
<!-- /.row (nested) -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>