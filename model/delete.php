<?php
require_once 'jenis_air.php';
require_once 'wadah.php';
require_once 'satuan.php';
require_once 'paket.php';
require_once 'stokwadah.php';
require_once 'keranjang.php';
require_once 'log.php';
$log = new Log();

if (isset($_GET['menu']) AND isset($_GET['action']) AND isset($_GET['id'])) {
  switch ($_GET['menu']) {
    case "jenis_air":
      delete_air($_GET['id']);
      $log->id_user = $_SESSION['id'];
      $log->module = "jenis_air";
      $log->action = "delete air " . $_GET['id'];
      $log->insert_log();
      $_SESSION['flash'] = "Panghapusan Data";
      $_SESSION['flash_message'] = "Jenis air berhasil dihapus.";
      $_SESSION['timer'] = time();
      echo "<script>var time = setTimeout(function()
            {window.location = 'index.php?menu=jenis_air'}, 0);</script>";
      break;

    case "wadah":
      delete_wadah($_GET['id']);
      $log->id_user = $_SESSION['id'];
      $log->module = "wadah";
      $log->action = "delete wadah " . $_GET['id'];
      $log->insert_log();
      $_SESSION['flash'] = "Panghapusan Data";
      $_SESSION['flash_message'] = "Wadah berhasil dihapus.";
      $_SESSION['timer'] = time();
      echo "<script>window.location = 'index.php?menu=wadah';</script>";
      break;

    case "stokwadah":
      delete_stokwadah($_GET['id']);
      $log->id_user = $_SESSION['id'];
      $log->module = "stokwadah";
      $log->action = "delete " . $_GET['id'];
      $log->insert_log();
      $_SESSION['flash'] = "Panghapusan Data";
      $_SESSION['flash_message'] = "Data Stok berhasil dihapus.";
      $_SESSION['timer'] = time();
      echo "<script>window.location = 'index.php?menu=stokwadah';</script>";
      break;

    case "satuan":
      delete_satuan($_GET['id']);
      $log->id_user = $_SESSION['id'];
      $log->module = "satuan";
      $log->action = "delete satuan " . $_GET['id'];
      $log->insert_log();
      $_SESSION['flash'] = "Panghapusan Data";
      $_SESSION['flash_message'] = "Satuan berhasil dihapus.";
      $_SESSION['timer'] = time();
      echo "<script>var time = setTimeout(function()
            {window.location = 'index.php?menu=satuan'}, 0);</script>";
      break;

    case "paket":
      delete_paket($_GET['id']);
      $log->id_user = $_SESSION['id'];
      $log->module = "paket";
      $log->action = "delete paket " . $_GET['id'];
      $log->insert_log();
      $_SESSION['flash'] = "Panghapusan Data";
      $_SESSION['flash_message'] = "Paket berhasil dihapus.";
      $_SESSION['timer'] = time();
      echo "<script>var time = setTimeout(function()
            {window.location = 'index.php?menu=paket'}, 0);</script>";
      break;

    case "transaksi":
      $keranjang = new Keranjang();
      $keranjang->id = $_GET['id']
      $keranjang->delete_keranjang();
      $keranjang = null;
      $log->id_user = $_SESSION['id'];
      $log->module = "transaksi";
      $log->action = "delete trans " . $_GET['id'];
      $log->insert_log();
      $_SESSION['flash'] = "Panghapusan Data";
      $_SESSION['flash_message'] = "Paket berhasil dihapus.";
      $_SESSION['timer'] = time();
      echo "<script>window.location = 'index.php?menu=paket';</script>";
      break;

      case "pengguna":
        delete_pengguna($_GET['id']);
        $log->id_user = $_SESSION['id'];
        $log->module = "users";
        $log->action = "delete user " . $_GET['id'];
        $log->insert_log();
        $_SESSION['flash'] = "Panghapusan Data";
        $_SESSION['flash_message'] = "Data pengguna berhasil dihapus.";
        $_SESSION['timer'] = time();
        echo "<script>var time = setTimeout(function()
              {window.location = 'index.php?menu=pengguna'}, 0);</script>";
        break;

    // default:
    //   // code...
    //   break;
  }
} else {
  $_SESSION['flash'] = "Panghapusan Data";
  $_SESSION['flash_message'] = "Penghapusan data tidak berhasil. Terjadi kesalahan. Kalau terjadi kesalahan melulu, silahkan hubungi pembuat.";
  $_SESSION['timer'] = time();
  echo "<script>var time = setTimeout(function()
        {window.location = 'localhost/wepeak/view/index.php'}, 0);</script>";
}
 ?>
