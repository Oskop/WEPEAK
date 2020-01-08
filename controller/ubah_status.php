<?php
require_once '../model/keranjang.php';
if (isset($_GET)) {
  if (null !== $_GET['id'] && null !== $_GET['status']) {
    $keranjang = new Keranjang();
    $keranjang->id = $_GET['id'];
    $keranjang->status = htmlspecialchars($_GET['status']);
    $keranjang->ubahStatus();
    // var_dump($keranjang);
    // code...
  }
  echo json_encode(["pesan" => "Status sudah diubah",
                      "status" => htmlspecialchars($_GET['status'])]);
} else {
  echo json_encode(["pesan" => "Terjadi Kesalahan"]);
}
 ?>
