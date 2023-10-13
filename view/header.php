<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án mẫu</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

  </head>

  <body>
    <div class="container">
      <header>
        <div>
          <h1>SIÊU THỊ TRỰC TUYẾN</h1>
        </div>
        <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary rounded mb-4" data-bs-theme="dark">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Danh mục
                  </a>
                  <ul class="dropdown-menu">
                    <?php
                      foreach($dsdm as $dm){
                          extract($dm);
                          $linkdm="index.php?act=sanpham&iddm=".$id;
                          echo '<li><a class="dropdown-item" href="'.$linkdm.'">'.$name.' </a></li>';

                      }
                      ?>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Liên hệ</a>
                </li>
              </ul>
              <?php if(isset($_SESSION['user'])){
                    extract ($_SESSION['user']);
                ?>
              <div>
                <ul class="navbar-nav ">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      xin chào <?= $user ?>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="index.php?act=quenmk">Quên mật khẩu</a></li>
                      <li><a class="dropdown-item" href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
                      <?php if($role==0){ ?>
                      <li><a class="dropdown-item" href="admin/index.php">Đăng nhập Admin</a></li>
                      <li><a class="dropdown-item" target="_self" href="index.php?act=dangxuat">Đăng
                          xuất</a></li>
                      <?php }?>
                    </ul>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
          </div>
        </nav>
      </header>