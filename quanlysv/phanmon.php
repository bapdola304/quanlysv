<?php 
    
    $sqlmonhoc = "SELECT * FROM `tblmonhoc`";
    $querymonhoc = mysqli_query($connect, $sqlmonhoc);

     $sqlpm = "SELECT * FROM `tblphanmon`";
    $querypm = mysqli_query($connect, $sqlpm);

$sql_lop = "SELECT * FROM `tbllop`";
$query_lop = mysqli_query($connect, $sql_lop);
 ?>
<?php 
    if(isset($_POST['submit'])){

        $monhoc = $_POST['monhoc'];
        $lop = $_POST['lop'];
        $hocky = $_POST['hocki'];
     
        var_dump($monhoc);
        if(count($monhoc) < 4){
            echo "<script> alert('Phải Chọn Ít Nhất 4 Môn')</script>";
        }else if(count($monhoc) > 6){
             echo "<script> alert('Không Chọn Quá 6 Môn')</script>";
        }else{
            if(count($monhoc) == 4){
                $sql = "INSERT INTO tblphanmon(Lop,HocKy,TenMH1,TenMH2,TenMH3,TenMH4) VALUES('$lop','$hocky','$monhoc[0]','$monhoc[1]','$monhoc[2]','$monhoc[3]')";
                $query = mysqli_query($connect,$sql);
                if($query){
                    echo "<script> alert('Phân Thành Công')</script>";
                }
            }else if(count($monhoc) == 5){
                $sql = "INSERT INTO tblphanmon(Lop,HocKy,TenMH1,TenMH2,TenMH3,TenMH4,TenMH5) VALUES('$lop','$hocky','$monhoc[0]','$monhoc[1]','$monhoc[2]','$monhoc[3]','$monhoc[4]')";
                $query = mysqli_query($connect,$sql);
                if($query){
                    echo "<script> alert('Phân Thành Công')</script>";
                }
            }else{
                 $sql = "INSERT INTO tblphanmon(Lop,HocKy,TenMH1,TenMH2,TenMH3,TenMH4,TenMH5,TenMH6) VALUES('$lop','$hocky','$monhoc[0]','$monhoc[1]','$monhoc[2]','$monhoc[3]','$monhoc[4]','$monhoc[5]')";
                $query = mysqli_query($connect,$sql);
                if($query){
                    echo "<script> alert('Phân Thành Công')</script>";
                }
            }

           header('location: index.php?a=phanmon');
            
        }
    }

 ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Phân Môn Học</h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh Sách Môn Học
                </div>
                <div class="panel-body">
                    <form action="" method="POST" >
                        <div class="form-group col-md-4">
                            <label>Lớp</label>
                            <select class="form-control" name="lop">
                                 <?php  while($rowlop = mysqli_fetch_array($query_lop)){
                            
                                ?>
                                    <option><?= $rowlop['TenLop'] ?></option>
                               <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Học Kì</label>
                            <select class="form-control" name="hocki">
                                <option>1</option>
                                <option>2</option>
                                
                            </select>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-12">
                             <?php  while($rowmh = mysqli_fetch_array($querymonhoc)){
            
                            ?>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="monhoc[]" value="<?= $rowmh['TenMH'] ?>"><?= $rowmh['TenMH'] ?></label>
                                </div>
                        <?php } ?>
                           
                        </div>
                       
                        <button class="btn btn-primary col-md-2" type="submit" name="submit">Submit</button>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Lớp</th>
                                <th>Học Kỳ</th>
                                <th>Các Môn Học</th>
                                <th>Quản Lý</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php  while($rowpm = mysqli_fetch_array($querypm)){
                            
                            ?> 
                            <tr>
                                <td><?= $rowpm['MaID'] ?></td>
                                <td><?= $rowpm['Lop'] ?></td>
                                 <td><?= $rowpm['HocKy'] ?></td>
                                 <td>
                                    <?= $rowpm['TenMH1'] ?>,
                                     <?= $rowpm['TenMH2'] ?>,
                                     <?= $rowpm['TenMH3'] ?>,
                                     <?= $rowpm['TenMH4'] ?>,
                                     <?= $rowpm['TenMH5'] ?>,
                                      <?= $rowpm['TenMH6'] ?>
                                     
                                 </td>
                                <td>
                                    
                                 
                                    <a href="xoaphanmon.php?id=<?= $rowpm['MaID'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không?');" >
                                        <i class="fas fa-trash-alt" style="margin:0px 20px" ></i>
                                    </a>
                                </td>
                            </tr>
                                    
                                   
                             <?php } ?> 
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>