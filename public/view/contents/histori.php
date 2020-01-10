<?php
require_once '../model/keranjang.php';
require_once '../model/paket.php';
$keranjang = new Keranjang();
$keranjang->id_user = $_SESSION['id'];
$riwayat = $keranjang->get_keranjang_pengguna();
// var_dump($riwayat);die;
foreach ($riwayat as $key => $value) {
  $keranjang->id = $value['id'];
  $idBarang = $keranjang->get_idbarang_pengguna();
  $products = [];
  foreach ($idBarang as $keye => $data) {
    $namaPaket = get_paket_once($data['id_harga_satuan'])[0];
    $products[$namaPaket['air']] = ["nama" => $namaPaket['air'] . " " . $namaPaket['banyak'] . $namaPaket['satuan'],
                                    "wadah" => $namaPaket['wadah'],
                                    "harga" => $namaPaket['harga'],
                                    "jumlah" => $data['jumlah'],
                                    "subtotal" => $data['subtotal']
                                  ];
  }
  $riwayat[$key]['produk'] = $products;
  // echo "\n\n Keranjang " . $value['id'] . " = " ;
  // var_dump( $riwayat[$value['id']]['produk'] );
  // echo "\n\n";
}
// var_dump($riwayat);
// die;

 ?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"></span></p>
        <h1 class="mb-0 bread">Riwayat Belanja</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-cart">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <table class="table datatable">
            <thead class="thead-primary">
              <tr class="text-center">
                <th>Waktu</th>
                <th>Produk</th>
                <th>Ongkir</th>
                <th>Total Biaya</th>
                <th>Status</th>
                <th>Lunas</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($riwayat)): ?>
                <?php foreach ($riwayat as $key => $value): ?>
                  <tr class="text-center transaksiRow" id="<?=$value['id'];?>transaksiShow">
                    <td class="waktuTanggal"><?=$value['created_at'];?></a></td>

                    <td class="buttonModal">
                      <button type="button" class="btn btn-primary buttonProdukCard pl-3 pr-3" id="<?=$value['id'];?>buttonProduk"
                      style="border: 3px solid rgba(137, 196, 244, 0.5) !important;">Produk</button>
                    </td>

                    <td class="biayaOngkir">Rp. <?=number_format($value['ongkir'], 0,',','.');?></td>

                    <td class="totalBiaya">Rp. <?=number_format($value['total'], 0,',','.');?></td>

                    <td class="statusPesanan"><h5><?=$value['status'];?></h5></td>

                    <td class="lunasTransaksi"><?php if($value['lunas'] == 0){echo "Belum";}else{echo "Sudah";} ?></td>
                    <td class="produkRowCard" colspan="5" id="<?=$value['id'];?>produkRowCard">
                      <div class="container">
                        <div class="row">
                          <?php foreach ($riwayat[$key]['produk'] as $keye => $data): ?>
                            <div class="col-md col-sd col-lg">
                              <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Produk</div>
                                <div class="card-body">
                                  <h5 class="card-title"><?=$data['nama'];?></h5>
                                  <ul class="list-group list-group-flush ml-3">
                                    <li class="">Wadah <?=$data['wadah'];?></li>
                                    <li class="">Harga Satuan Rp. <?=number_format($data['harga'], 0, ',', '.');?></li>
                                    <li class="">Jumlah <?=$data['jumlah'];?></li>
                                    <li class="">Subtotal Rp. <?=number_format($data['subtotal'], 0, ',', '.');?></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                          <button type="button" class="btn btn-primary hideProdukRowRow ml-3 pl-3 pr-3"
                          style="border: 3px solid rgba(137, 196, 244, 0.5) !important;">Tutup</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php else: ?>
                  <h3 id="keranjangKosong">Riwayat Kosong. Anda dapat membuat pesanan terlebih dahulu.</h3>
              <?php endif; ?>

              <!-- END TR-->
            </tbody>
          </table>
        </div>
      </div>
    </div>

    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- <?php foreach ($riwayat as $key => $value): ?>
  <div class="modal fade" id="<?=$value['id'];?>modalProduk" tabindex="-1" role="dialog"
    aria-labelledby="<?=$value['id'];?>modalProduk" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="<?=$value['id'];?>modalProdukTitle">Produk Yang Dibeli</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php foreach ($riwayat[$key]['produk'] as $keye => $data): ?>
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">Produk</div>
              <div class="card-body">
                <h5 class="card-title"><?=$data['nama'];?></h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Wadah <?=$data['wadah'];?></li>
                  <li class="list-group-item">Harga Satuan Rp. <?=number_format($data['harga'], 0, ',', '.');?></li>
                  <li class="list-group-item">Jumlah <?=$data['jumlah'];?></li>
                  <li class="list-group-item">Subtotal Rp. <?=number_format($data['subtotal'], 0, ',', '.');?></li>
                </ul>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?> -->
