<?php
$sqlthem = "SELECT * FROM `tblsinhvien`";
$querythem = mysqli_query($connect, $sqlthem);
$i=0;
$sql_lop = "SELECT * FROM `tbllop`";
$querylop = mysqli_query($connect, $sql_lop);
?>
<?php

if(isset($_POST['them'])){
    $masv = $_POST['masv'];
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $email = $_POST['email'];
    $sodt = $_POST['sodt'];
    $lop = $_POST['lop'];
    $diachi = $_POST['diachi'];
    $hinhanh=$_FILES['anhsv']['name'];
    $tmp=$_FILES['anhsv']['tmp_name'];
    move_uploaded_file($tmp, '../img/'.$hinhanh);
    $them="INSERT INTO tblsinhvien VALUES('$masv','$hoten','$ngaysinh','$email','$sodt','$lop','$hinhanh','$diachi')";
    $query_them=mysqli_query($connect,$them);
    header('location: index.php');
}
if(isset($_POST['sua'])){
    $masv = $_POST['masv'];
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $email = $_POST['email'];
    $sodt = $_POST['sodt'];
    $lop = $_POST['lop'];
    $diachi = $_POST['diachi'];
    $hinhanh=$_FILES['anhsv']['name'];
    $tmp=$_FILES['anhsv']['tmp_name'];
    move_uploaded_file($tmp, '../img/'.$hinhanh);
        if($hinhanh!=''){
            $sql_sua="UPDATE tblsinhvien SET MaSV='$masv',HoTen='$hoten',NgaySinh='$ngaysinh',
                        Email='$email',SDT='$sodt', Lop='$lop',Avatar='$hinhanh',DiaChi = '$diachi' where MaSV=$masv";
            
        }else{
           $sql_sua="UPDATE tblsinhvien SET MaSV='$masv',HoTen='$hoten',NgaySinh='$ngaysinh',
                        Email='$email',SDT='$sodt', Lop='$lop',DiaChi = '$diachi' where MaSV=$masv";
            

        }
        $query_sua=mysqli_query($connect,$sql_sua);
       header('location: index.php');
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản Lý Sinh Viên</h1>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Mới Sinh Viên</button>
        </div>
        <!-- /.col-lg-12 -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm Sinh Viên</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype = "multipart/form-data">
                            <div class="form-group "><label>Mã Sinh Viên</label><input class="form-control" type="text" name="masv" value="" /></div>
                            <div class="form-group "><label>Họ Tên</label><input class="form-control" type="text" name="hoten" value="" /></div>
                            <div class="form-group "><label>Ngày Sinh</label><input class="form-control" type="date" name="ngaysinh" value="" /></div>
                            <div class="form-group "><label>Email</label><input class="form-control" type="text" name="email" value="" /></div>
                            <div class="form-group "><label>Số ĐT</label><input class="form-control" type="text" name="sodt" value="" /></div>
                            <div class="form-group "><label>Địa Chỉ</label><input class="form-control" type="text" name="diachi" value="" /></div>
                            <div class="form-group ">
                                <label>Lớp</label>
                                <select class="form-control" name="lop">
                                    <?php  while($rowlop = mysqli_fetch_array($querylop)){ ?>
                                    <option><?= $rowlop['TenLop']  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group "><label>Ảnh SV</label><input class="form-control-file" type="file" name="anhsv" /></div>
                            <input type="submit" class="btn btn-primary ml-3" name="them">Thêm</input>
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
                    Danh Sách Sinh Viên
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Mã Sinh Viên</th>
                                <th>Họ Tên</th>
                                <th>Ảnh</th>
                                <th>Ngày Sinh</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Lớp</th>
                                <th>Địa Chỉ</th>
                                <th>Quản Lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  while($rowsv = mysqli_fetch_array($querythem)){
                            
                            ?>
                            <tr>
                                
                                <td><?= $rowsv['MaSV'] ?></td>
                                <td> <?= $rowsv['HoTen'] ?></td>
                                <td><img src="../img/<?= $rowsv['Avatar'] ?>" width="100" /></td>
                                <td><?= $rowsv['NgaySinh'] ?></td>
                                <td><?= $rowsv['Email'] ?></td>
                                <td><?= $rowsv['SDT'] ?></td>
                                <td><?= $rowsv['Lop'] ?></td>
                                <td><?= $rowsv['DiaChi'] ?></td>
                                <td>
                                    <a href="#"> <i class="fas fa-edit" style="margin:0px 20px" data-toggle="modal" data-target="#myModal<?= $rowsv['MaSV'] ?>" ></i> </a>
                                    <a href="xoasinhvien.php?id=<?= $rowsv['MaSV'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không?');" >
                                        <i class="fas fa-trash-alt" style="margin:0px 20px" ></i>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal<?= $rowsv['MaSV'] ?>" role="dialog">
                                <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm Sinh Viên</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" enctype = "multipart/form-data">
                                                <div class="form-group "><label>Mã Sinh Viên</label><input class="form-control" type="text" name="masv" value="<?= $rowsv['MaSV'] ?>" /></div>
                                                <div class="form-group "><label>Họ Tên</label><input class="form-control" type="text" name="hoten" value="<?= $rowsv['HoTen'] ?>" /></div>
                                                <div class="form-group "><label>Ngày Sinh</label><input class="form-control" type="date" name="ngaysinh" value="<?= $rowsv['NgaySinh'] ?>" /></div>
                                                <div class="form-group "><label>Email</label><input class="form-control" type="text" name="email" value="<?= $rowsv['Email'] ?>" /></div>
                                                <div class="form-group "><label>Số ĐT</label><input class="form-control" type="text" name="sodt" value="<?= $rowsv['SDT'] ?>" /></div>
                                                <div class="form-group "><label>Địa Chỉ</label><input class="form-control" type="text" name="diachi" value="<?= $rowsv['DiaChi'] ?>" /></div>
                                                <div class="form-group ">
                                                    <label>Lớp</label>
                                                    <select class="form-control" name="lop">
                                                        <?php
                                                            $sql_lop1 = "SELECT * FROM `tbllop`";
                                                            $querylop1 = mysqli_query($connect, $sql_lop1);
                                                          while($rowlop1 = mysqli_fetch_array($querylop1)){ ?>
                                                            <option <?php if($rowsv['Lop'] == $rowlop1['TenLop']){ echo "selected";} ?>><?= $rowlop1['TenLop']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12"><label class="col-md-12">Ảnh SV</label>
                                                    <input class="form-control-file col-md-6" type="file" name="anhsv" />
                                                    <img src="../img/<?= $rowsv['Avatar'] ?>" alt="" width="60" class="col-md-4">
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