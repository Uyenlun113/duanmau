<?php
include "view/header.php";
?>

<main class="catalog mb">
  <div class="boxleft">
    <div class="banner">
      <img id="banner" src="./img/anh0.jpg" alt="">
      <button class="pre" onclick="pre()">&#10094;</button>
      <button class="next" onclick="next()">&#10095;</button>
    </div>

    <div class="items">
      <?php
      $i = 0;
      foreach ($spnew as $sp) {
          extract($sp);
          $hinh = $img_path . $img;
          $linksp = "index.php?act=sanphamct&idsp=" . $id;
      ?>

      <div class="card" style="border-radius: 15px;">
        <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
          <img src="<?= $hinh ?>" style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid"
            alt="Laptop" />
          <a href="#!">
            <div class="mask"></div>
          </a>
        </div>
        <div class="card-body pb-0">
          <div class="d-flex justify-content-between gap-10">
            <div>
              <p><a href="<?= $linksp ?>" class="text-dark"><?= $name ?></a></p>
            </div>
            <div class="w-5"></div>
            <div>
              <p class="small text-muted">$<?= $price ?></p>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-center align-items-center pb-2 mb-1">
            <form method="post" action="index.php?act=add_to_cart">
              <input type="hidden" name="product_id" value="<?= $sp['id'] ?>">
              <input type="submit" name="add_to_cart" value="Thêm giỏ hàng" class="btn btn-primary w-60">
            </form>
          </div>
        </div>
      </div>

      <?php
          $i += 1;
      }
      ?>
    </div>
  </div>
  <?php
  include "view/boxright.php";
  ?>
</main>