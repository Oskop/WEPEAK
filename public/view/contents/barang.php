<?php require_once $base_url . 'model/paket.php';
$paket = show_paket_all();
 ?>
<div class="container">
  <div class="row">
    <?php foreach ($paket as $key => $data): ?>
      <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
        <div class="product">
          <a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template">
            <!-- <span class="status">30%</span> -->
            <div class="overlay"></div>
          </a>
          <div class="text py-3 pb-4 px-3 text-center">
            <h3><a href="#">pH <?=$data['ph'];?></a> <?=number_format($data['banyak'], 0, '', '.') . ' ' . $data['satuan'];?></h3>
            <div class="d-flex">
              <div class="pricing">
                <p class="price">
                  <!-- <span class="mr-2 price-dc"><?=$data['harga'];?></span> -->
                  <span class="price-sale"><?="Rp " . number_format($data['harga'], 0, '', '.');?></span></p>
              </div>
            </div>
            <div class="bottom-area d-flex px-3">
              <div class="m-auto d-flex">
                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                  <span><i class="ion-ios-menu"></i></span>
                </a>
                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1 cartadd" id="<?=$data['id']."cartadd";?>">
                  <span><i class="ion-ios-cart"></i></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
