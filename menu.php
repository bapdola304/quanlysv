<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Thông Tin Sinh Viên</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Trang Chủ</a></li>
      <li class="active"><a href="quanlysv/index.php">Quản lý sinh viên</a></li>
      <li class = "active"><a href="quanlysv/index.php?a=themmon">Quản lý môn học</a></li>
      <li class = "active"><a href="quanlysv/index.php?a=themlop">Quản lý lớp học</a></li>
      <li class = "active"><a href="quanlysv/index.php?a=phanmon">Phân Môn Học</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="">Chào ! <?= $_SESSION['user'] ?></a></li>
      <li class="active"><a href="dangxuat.php">Đăng Xuất</a></li>
    </ul>
    <form class="navbar-form navbar-left" method="POST" action="index.php?a=timkiem">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="key">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" name="timkiem">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>