<?php
$sql_lop = "SELECT * FROM `tbllop`";
$query_lop = mysqli_query($connect, $sql_lop);
?>
<?php 

    if(isset($_POST['them'])){
        $tenlop = $_POST['tenlop'];
        $malop = $_POST['malop'];
   
        $themlop="INSERT INTO tbllop VALUES('$malop','$tenlop')";
        $query_themlop=mysqli_query($connect,$themlop);
        header('location: index.php?a=themlop');
}

  if(isset($_POST['sua'])){
        $tenlop = $_POST['tenlop'];
        $malop = $_POST['malop'];
   
        $sualop="UPDATE tbllop SET MaLop = '$malop', TenLop = '$tenlop' WHERE MaLop = '$malop' ";
        $query_sualop=mysqli_query($connect,$sualop);
        header('location: index.php?a=themlop');
}


 ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản Lý Lớp Học</h1>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Lớp Học</button>
        </div>
        <!-- /.col-lg-12 -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm Lớp Học</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group "><label>Mã Lớp</label><input class="form-control" type="text" name="malop" value="" /></div>
                            <div class="form-group "><label>Tên Lớp</label><input class="form-control" type="text" name="tenlop" value="" />
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
                    Danh Sách Lớp Học
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Mã Lớp</th>
                                <th>Tên Lớp</th>
                                <th>Quản Lý</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php  while($rowlop = mysqli_fetch_array($query_lop)){
                            
                            ?>
                            <tr>
                                <td><?= $rowlop['MaLop'] ?></td>
                                <td><?= $rowlop['TenLop'] ?></td>
                                <td>
                                    
                                    <a href="#"> <i class="fas fa-edit" style="margin:0px 20px" data-toggle="modal" data-target="#myModal<?= $rowlop['MaLop'] ?>" ></i> </a>
                                    <a href="/admin/xoaSanPham/<%= sp._id %>" onclick="return confirm('Bạn có chắc muốn xóa không?');" >
                                        <i class="fas fa-trash-alt" style="margin:0px 20px" ></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal<?= $rowlop['MaLop'] ?>" role="dialog">
                                <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm Sinh Viên</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST">
                                                <div class="form-group "><label>Mã Lớp</label><input class="form-control" type="text" name="malop" value="<?= $rowlop['MaLop'] ?>" /></div>
                                                <div class="form-group "><label>Tên Lớp</label><input class="form-control" type="text" name="tenlop" value="<?= $rowlop['TenLop'] ?>" />
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