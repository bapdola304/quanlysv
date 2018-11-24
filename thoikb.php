<?php 
	include('./connect/connect.php');
	$hocky = $_GET['hocky'];
	 $lop = $_GET['lop'];

	 $sqlpm = "SELECT * FROM tblphanmon WHERE Lop = '$lop' AND HocKy = '$hocky'";
    $querypm = mysqli_query($connect, $sqlpm);
	$rowpm = mysqli_fetch_array($querypm);
	$dl = mysqli_num_rows($querypm);
 ?>
 <?php
 	if($dl == 0 ){
 		echo "Dữ Liệu Trống";
 	}else{


 	echo '<table class="table table-bordered">';
    echo                '<thead>';
    echo                     '<tr>';
    echo                        '<th>Lớp</th>';
     echo                          '<th>Học Kỳ</th>';
     echo                            '<th>Các Môn Học</th>';
                           
     echo                     '</tr>';
     echo                   '</thead>';
      echo                  '<tbody>';                           
    echo                        '<tr>';                         
      echo                          '<td>'. $rowpm['Lop'].'</td>';
      echo                           '<td>'. $rowpm['HocKy'] .'</td>';
       echo                         '<td>'. $rowpm['TenMH1'] ." - " .$rowpm['TenMH2']  ." - " .$rowpm['TenMH3'] ." - " .$rowpm['TenMH4'] ." - " .$rowpm['TenMH5']." - " .$rowpm['TenMH6'] . '</td>';  
        echo                  '</tr>';
                           
       echo        '</tbody>';
        echo            '</table> ';
    }
?>