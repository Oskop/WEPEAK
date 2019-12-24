<?php
session_start();

if (isset($_GET['id']) AND isset($_GET['carting'])) {
  $id_product = $_GET['id'];

  if ($_GET['carting'] == "add") {
    if (isset($_SESSION['keranjang'][$id_product])) {
      $_SESSION['keranjang'][$id_product]['jumlah'] += 1;
    } else {
      $_SESSION['keranjang'][$id_product] = 1;
    }
  }

  elseif ($_GET['carting'] == "substract") {
    if (isset($_SESSION['keranjang'][$id_product])) {
      $_SESSION['keranjang'][$id_product]['jumlah'] -= 1;
      if ($_SESSION['keranjang'][$id_product]['jumlah'] <=0) {
        session_unset($_SESSION['keranjang'][$id_product]);
      }
    } else {
      echo "<script>
            alert('Terjadi Kesalahan. Silahkan hubungi pengembang sistem!');
            </script>";
    }
  }

  elseif ($_GET['carting'] == "remove") {
    if (isset($_SESSION['keranjang'][$id_product])) {
      session_unset($_SESSION['keranjang'][$id_product]);
    }
  }

  elseif ($_GET['carting'] == "") {
    echo "string";
  }

}
 ?>
