<?php
session_start();
require_once '../model/paket.php';

if (isset($_GET['id']) AND isset($_GET['carting'])) {
  $id_product = $_GET['id'];
  $produk = get_paket_once($id_product)[0];
  $harga = $produk['harga'];
  if ($_GET['carting'] == "add") {
    if (isset($_SESSION['keranjang'][$id_product])) {
      $_SESSION['keranjang'][$id_product]['jumlah'] += 1;
      $_SESSION['keranjang'][$id_product]['harga'] += $harga;
    } else {
      $_SESSION['keranjang'][$id_product]['jumlah'] = 1;
      $_SESSION['keranjang'][$id_product]['harga'] = $harga;
    }
  }

  elseif ($_GET['carting'] == "substract") {
    if (isset($_SESSION['keranjang'][$id_product])) {
      $_SESSION['keranjang'][$id_product]['jumlah'] -= 1;
      $_SESSION['keranjang'][$id_product]['harga'] -= $harga;
      if ($_SESSION['keranjang'][$id_product]['jumlah'] <=0) {
        session_unset($_SESSION['keranjang'][$id_product]);
      }
    } else {
      echo "<script>
            alert('Terjadi Kesalahan. Silahkan hubungi pengembang sistem!');
            </script>";
    }
  }

  elseif ($_GET['carting'] == "change") {
    if (isset($_GET['amount']) && isset($_GET['price'])) {
      if (isset($_SESSION['keranjang'][$id_product])) {
        $_SESSION['keranjang'][$id_product]['jumlah'] = $_GET['amount'];
        $_SESSION['keranjang'][$id_product]['harga'] = $_GET['price'];
      }
    }
  }

  elseif ($_GET['carting'] == "remove") {
    if (isset($_SESSION['keranjang'][$id_product])) {
      $_SESSION['keranjang'][$id_product] = null;
      unset($_SESSION['keranjang'][$id_product]);
    }
  }

  elseif ($_GET['carting'] == "") {
    echo "string";
    var_dump($_GET);die;
  }
  $total_harga = 0;$json = [];
  foreach ($_SESSION['keranjang'] as $key => $value) {
    if (!is_null($_SESSION['keranjang'][$key])) {
      $total_harga += $value['harga'];
    }
    // var_dump($value['harga']);die;
  }
  $_SESSION['total'] = 0;
  if (isset($_SESSION['keranjang'])) {
    $_SESSION['total'] = $total_harga;
  }
  $json = ["harga" => $total_harga,
  "produk" => $produk['air']];
  echo json_encode($json);
  // var_dump($_SESSION['keranjang']);die;
}
 ?>
