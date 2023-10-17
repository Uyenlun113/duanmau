<?php include "view/header.php"; ?>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 16px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Giỏ hàng</h1>
                  </div>
                  <hr class="my-4">
                  <?php 
                    if (isset($_COOKIE['shopping_cart'])) {
                        $cart = unserialize($_COOKIE['shopping_cart']);
                        $total_price = 0; // Khởi tạo biến tổng tiền
                        foreach ($cart as $productId => $item) {
                  ?>
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img src="<?=$img_path . $item['img'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted"><?= $item['name'] ?></h6>
                      <h6 class="text-black mb-0">Laptop</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <h6 class="text-muted"><?= $item['quantity'] ?></h6>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0">$<?= $item['price'] ?>.00</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="index.php?act=remove_from_cart&product_id=<?= $productId ?>" class="text-muted"><i
                          class="fas fa-times"></i></a>
                    </div>
                  </div>
                  <?php
                        $total_price += ($item['price'] * $item['quantity']); // Tính tổng tiền của từng sản phẩm
                    }
                  } else {
                      echo "Không có sản phẩm nào trong giỏ hàng.";
                  }
                  ?>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Tổng cộng</h3>
                  <hr class="my-4">
                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Tổng</h5>
                    <h5>$<?= number_format($total_price, 2) ?></h5>
                  </div>
                  <button type="button" class="btn btn-dark btn-block btn-lg w-100" data-mdb-ripple-color="dark">Thanh
                    toán</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>