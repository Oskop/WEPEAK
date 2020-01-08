<?php
require_once '../model/paket.php';
$products = [];
if (isset($_SESSION['keranjang'])) {
  foreach ($_SESSION['keranjang'] as $key => $value) {
    $product = get_paket_once($key)[0];
    // $products[$product['air']] = $product['harga'];
  }
}
 ?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"></span></p>
        <h1 class="mb-0 bread">Keranjang</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-cart">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <table class="table">
            <thead class="thead-primary">
              <tr class="text-center">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Total Barang</th>
                <th>Total Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($_SESSION['keranjang'])): ?>
                <?php foreach ($_SESSION['keranjang'] as $key => $value): $product = get_paket_once($key)[0]; ?>

                  <tr class="text-center productRow" id="<?=$key;?>produkShow">
                    <td class="product-remove" id="<?=$key;?>produkRemove"><a href="#"><span class="ion-ios-close"></span></a></td>

                    <td class="image-prod"><div class="img" style="background-image:url(images/product-3.jpg);"></div></td>

                    <td class="product-name">
                      <h3 id="nama_air"><?=$product['air'];?></h3>
                    </td>

                    <td class="price">Rp. <span id="harga_satuan"><?=$product['harga'];?></span></td>

                    <td class="quantity">
                      <div class="input-group mb-3">
                        <!-- <a href="#" class="quantity"> <span class="icon icon-plus"></span></a> -->
                        <input type="text" name="quantity"
                         class="quantity form-control input-number jumlah_paket" value="<?=$_SESSION['keranjang'][$key]['jumlah'];?>"
                         id="<?=$key;?>kuantitasProduk">
                      </div>
                    </td>

                    <td class="total" id="subtotalharga">Rp. <?=$_SESSION['keranjang'][$key]['harga'];?></td>
                  </tr>
                <?php endforeach; ?>
                <?php else: ?>
                  <h3 id="keranjangKosong">Keranjang Kosong. Silahkan pilih produk terlebih dahulu</h3>
              <?php endif; ?>

              <!-- END TR-->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php if (isset($_SESSION['keranjang']) || $_SESSION['keranjang'] != null): ?>

      <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Total Keranjang</h3>
          <p class="d-flex">
            <span>Subtotal</span>Rp.&nbsp
            <span id="subTotalKeranjang"><?php if(isset($_SESSION['total'])){echo
              number_format(intval($_SESSION['total']), 0, ',', '.');} else {echo "0";};?></span>
          </p>
          <p class="d-flex">
            <span>Ongkos Kirim</span>Rp.&nbsp
            <span id="ongkir">5.000</span>
          </p>
          <hr>
          <p class="d-flex total-price">
            <span>Total</span>Rp.&nbsp
            <span id="hargaTotalKeranjang" class="keranjangHargaTotal">$17.60</span>
          </p>
        </div>
        <p><a href="#" class="btn btn-primary py-3 px-4 checkout">Buat Pesanan</a></p>
      </div>
    <?php endif; ?>
    </div>
  </div>
</section>
