<?php
require_once '../model/keranjang.php';
if (isset($_GET)) {
  if (null !== $_GET['id'] && null !== $_GET['status']) {
    $keranjang = new Keranjang();
    $keranjang->id = $_GET['id'];
    $keranjang->status = htmlspecialchars($_GET['status']);
    if ($_GET['status'] != "lunas") {
      $keranjang->ubahStatus();
      echo json_encode(["pesan" => "Status sudah diubah",
      "status" => htmlspecialchars($_GET['status'])]);
    } else {
      $keranjang->lunas = 1;
      $keranjang->ubahJadiLunas();
      echo json_encode(["pesan" => "Oke, Pesanan Dianggap Lunas."]);
    }
    // var_dump($keranjang);
    // code...
  }
} else {
  echo json_encode(["pesan" => "Terjadi Kesalahan"]);
}
 ?>
