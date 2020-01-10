<?php
session_start();
require_once '../model/paket.php';
require_once '../model/keranjang.php';
require_once '../model/pengguna.php';
require_once '../model/log.php';

if (isset($_POST)) {
  if (isset($_SESSION['keranjang'])) {
    $pengguna = new Pengguna();
    $pengguna->id = $_GET['id'];
    $alamat = $pengguna->get_pengguna_once()[0]['alamat'];
    $keranjang = new Keranjang();
    $keranjang->id_user = $_GET['id'];
    $keranjang->alamat = $alamat;
    $keranjang->ongkir = $_POST['ongkir'];
    $keranjang->total = $_POST['total'];
    $keranjang->status = $_POST['status'];
    $keranjang->lunas = $_POST['lunas'];
    $idKeranjang = $keranjang->insert_keranjang();

    $keranjang->lastID = $idKeranjang;
    $log = new Log();
    foreach ($_SESSION['keranjang'] as $key => $value) {
      $keranjang->id_harga_satuan = $key;
      $keranjang->jumlah = $value['jumlah'];
      $keranjang->subtotal = $value['harga'];
      $keranjang->insert_barang();
      $log->id_user = $_SESSION['id']
      $log->module = "detail_transaksi"
      $log->action = "insert paket " . $key;
      $log->insert_log();
    }
    $_SESSION['keranjang'] = null;$_SESSION['total'] = 0;
    $log->id_user = $_SESSION['id'];
    $log->module = "transaksi"
    $log->action = "insert Pesanan";
    $log->insert_log();
    echo json_encode(["pesan" => "Pesanan telah dibuat. Silahkan Tunggu dan Bayar saat barang sudah diterima."]);
  } else {
    echo "<script>alert('Keranjang Kosong. Silahkan Pilih Barang Terlebih Dahulu..')</script>";
    echo json_encode(["pesan" => "Keranjang Kosong. Silahkan Pilih Barang Terlebih Dahulu."]);
  }

}
 ?>
