<?php
include "view/header.php";
?>

<main class="catalog mb">
  <div class="boxleft">
    <div class="items">
      <?php foreach ($dssp as $sp) : ?>
      <?php
        $i=0;
        $hinh = $img_path . $sp['img'];
        $linksp = "index.php?act=sanphamct&idsp=" . $sp['id'];

        $mr = ($i == 2 || $i == 5 || $i == 8) ? "" : "mr";
        ?>
      <div class=" card" style="border-radius: 15px;">
        <a href="index.php?act=sanphamct&idsp=<?= $id ?>">

          <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
            <img src="<?= $hinh ?>" style="border-top-left-radius: 15px; border-top-right-radius: 15px;"
              class="img-fluid" alt="Laptop" />
            <a href="#!">
              <div class="mask"></div>
            </a>
          </div>
          <div class="card-body pb-0">
            <div class="d-flex justify-content-between gap-10">
              <div>
                <p><a href="<?= $linksp ?>" class="text-dark"><?= $sp['name'] ?></a></p>
              </div>
              <div class="w-5"></div>
              <div>
                <p class="small text-muted">$<?= $sp['price'] ?></p>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-center pb-2 mb-1">
              <button type="button" class="btn btn-primary w-60">Thêm giỏ hàng</button>
            </div>
          </div>
        </a>
      </div>

      <?php $i += 1; ?>
      <?php endforeach; ?>
    </div>
  </div>
  <?php include_once "view/boxright.php"; ?>
</main>

<!-- BANNER 2 -->