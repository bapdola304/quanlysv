<?php
$sqllop = "SELECT * FROM tbllop";
$query_lop = mysqli_query($connect,$sqllop);
$lop =  isset($_GET['lop']) ? $_GET['lop'] : "";
$sqlsv = "SELECT * FROM tblsinhvien WHERE Lop LIKE '%$lop%'";
$querysv = mysqli_query($connect, $sqlsv);

     $sqlpm = "SELECT * FROM `tblphanmon` WHERE Lop = '$lop'";
    $querypm = mysqli_query($connect, $sqlpm);
?>
<div class="container">
  <input type="hidden" value="<?= $lop ?>" id="lop">
  <div class="form-group">
    <label for="sel1">Danh Sách Lớp:</label>
    <?php while($rowlop = mysqli_fetch_array($query_lop)){ ?>
    <a href="index.php?lop=<?= $rowlop['TenLop'] ?>"> <button type="button" class="btn btn-success"><?= $rowlop['TenLop'] ?></button></a>
    <?php } ?>
  </div>
  <h3> Lớp:  <?= $lop ?></h3>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?= $lop?>">Xem Môn Học Của Lớp <?= $lop?></button> <br/>
  <button style=" margin-top: 10px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModaltkb<?= $lop?>">Xem Thời Khóa Biểu Của Lớp <?= $lop?></button>
  <!-- Modal -->
  <div class="modal fade" id="myModal<?= $lop?>" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xem Môn Học</h4>
        </div>
        <div class="modal-body">
             <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Lớp</th>
                                <th>Học Kỳ</th>
                                <th>Các Môn Học</th>
                           
                                
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
                              
                            </tr>
                           
                             <?php } ?> 
                        </tbody>
                    </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal -->
  <div class="modal fade" id="myModaltkb<?= $lop?>" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xem Thời Khóa Biểu Lớp <?= $lop ?></h4>
        </div>
        <div class="modal-body">
             <div class="form-group">
                <label for="sel1">Học Kỳ:</label>
                <select class="form-control" style="width: 30%" name="hocky" id="hocky">
                  <option>1</option>
                  <option>2</option>
                </select>
                 <div id ="tkb" style="margin-top: 10px;"></div>
          </div>
         
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<h2>Danh Sách Sinh Viên</h2>
<div class="dssv" style="margin-top: 70px;">
<?php while($rowsv = mysqli_fetch_array($querysv)){ ?>
<a href="index.php?a=chitiet&ma=<?= $rowsv['MaSV'] ?>">
<div class="col-sm-6 col-md-4">
<div class="thumbnail">
  <img src="img/<?= $rowsv['Avatar']  ?>" alt="..." width="100%" style="height: 300px;">
  <div class="caption">
    <h3><?= $rowsv['HoTen']  ?></h3>
    <p>Mã SV : <?= $rowsv['MaSV']  ?></p>
    <p>Lớp: <?= $rowsv['Lop']?>  </p>
  </div>
</div>
</div>
</a>
<?php } ?>
</div>

<script type="text/javascript">
  $(document).ready(()=>{
      $("#hocky").change(()=>{
        let hk = $("#hocky").val();
        let lop = $("#lop").val();
        $.get("thoikb.php",{hocky : hk, lop : lop},(data)=>{
            $("#tkb").html(data);
        });
      })
  });
</script>