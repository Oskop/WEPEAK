<?php
require_once '../model/keranjang.php';
require_once '../model/pengguna.php';
$keranjang = new Keranjang();
$BelumLunas = $keranjang->get_keranjang_all();
foreach ($BelumLunas as $key => $value) {
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
  $BelumLunas[$key]['produk'] = $products;
}
// var_dump($BelumLunas);die;
 ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Riwayat Transaksi
                <div class="page-title-subheading">Halaman Riwayat Transaksi WEPEAK.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
        </div>
      </div>
</div>

<!-- <div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Jumlah Pesanan</div>
                    <div class="widget-subheading">Pesanan Hari Ini</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>1896</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Stok Wadah</div>
                    <div class="widget-subheading">Semua Jenis Wadah</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>568</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Omset</div>
                    <div class="widget-subheading">Pendapatan Kotor</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>Rp. 30000</span></div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="row">
    <!-- <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Pesanan</div>
                        <div class="widget-subheading">Jumlah Semua Pesanan</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">1896</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Pendapatan</div>
                        <div class="widget-subheading">Omset Total</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning">$3M</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Followers</div>
                        <div class="widget-subheading">People Interested</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger">45,9%</div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Income</div>
                        <div class="widget-subheading">Expected totals</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-focus">$147</div>
                    </div>
                </div>
                <div class="widget-progress-wrapper">
                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                    </div>
                    <div class="progress-sub-label">
                        <div class="sub-label-left">Expenses</div>
                        <div class="sub-label-right">100%</div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Active Users
                <div class="btn-actions-pane-right">
                    <!-- <div role="group" class="btn-group-sm btn-group">
                        <button class="active btn btn-focus">Last Week</button>
                        <button class="btn btn-focus">All Month</button>
                    </div> -->
                </div>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Total Biaya</th>
                        <th class="text-center">Pesanan</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($BelumLunas as $key => $value): ?>

                        <!-- Load Baris Keranjang Beserta Isinya -->
                        <tr class="produkDashboardRow" id="<?=$value['id'];?>produkDashboardRow">
                          <td class="text-center text-muted numberDashboard"><?=$key+1;?></td>
                          <td class="namaOrangDashboard">
                            <div class="widget-content p-0">
                              <div class="widget-content-wrapper">
                                <div class="widget-content-left mr-3">
                                  <div class="widget-content-left">
                                    <!-- <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt=""> -->
                                  </div>
                                </div>
                                <div class="widget-content-left flex2">
                                  <div class="widget-heading text-left"><?=$value['nama'];?></div>
                                  <!-- <div class="widget-subheading opacity-7">Web Developer</div> -->
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="text-center alamatDashboard"><?=$value['alamat'];?></td>
                          <td class="text-center statusPesananDashboard" id="<?=$value['id'];?>statusPesananDashboard">
                            <div class="badge badge-warning"><?=$value['status'];?></div>
                            <!-- Dropdown mengubah status -->
                            <div class="showPilihanStatus">
                              <select class="custom-select btn btn-warning selectPilihanStatus"
                                id="<?=$value['id'];?>selectPilihanStatus">
                                <option selected>Open this select menu</option>
                                <option value="Batal">Batal</option>
                                <option value="Dalam Urutan">Dalam Urutan</option>
                                <option value="Ganti Baru">Ganti Baru</option>
                                <option value="Sedang Diproses">Sedang Diproses</option>
                                <option value="Sedang Dikirim">Sedang Dikirim</option>
                                <option value="Selesai">Selesai</option>
                              </select>
                            </div>
                          </td>
                          <td class="text-center totalBiayaDashboard"><?="Rp. ".number_format($value['total'], 0, ',', '.');?></td>
                          <td class="text-center buttonProdukDashboard">
                            <button type="button" id="<?=$value['id'];?>buttonShowProdukDashboard" class="btn btn-primary btn-sm
                              buttonShowProdukDashboard">Details</button>
                              <?php if ($value['lunas'] == 0): ?>
                                <a href="#" type="button" id="<?=$value['id'];?>Lunas"
                                  class="btn btn-success buttonLunas">Lunas</a>
                              <?php endif; ?>
                          </td>

                          <!-- Load Semua Produk Pada ID Keranjang -->
                          <td class="showProdukDashboard" colspan="5" id="<?=$value['id'];?>showProdukDashboard">
                            <div class="container">
                              <div class="row">
                                <?php foreach ($BelumLunas[$key]['produk'] as $keye => $data): ?>
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
                                <button type="button" class="btn btn-primary hideProdukDashboard ml-3 pl-3 pr-3"
                                style="border: 3px solid rgba(137, 196, 244, 0.5) !important;">Tutup</button>
                              </div>
                            </div>
                          </td>
                          <!-- END dari Load Semua Produk Pada ID Keranjang -->

                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <!-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                <button class="btn-wide btn btn-success">Save</button> -->
            </div>
        </div>
    </div>
</div>
