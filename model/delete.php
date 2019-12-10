<?php
require_once 'jenis_air.php';
require_once 'wadah.php';
require_once 'satuan.php';

if (isset($_GET['menu']) AND isset($_GET['action']) AND isset($_GET['id'])) {
  switch ($_GET['menu']) {
    case "jenis_air":
      delete_air($_GET['id']);
      $_SESSION['flash'] = "Panghapusan Data";
      $_SESSION['flash_message'] = "Jenis air berhasil dihapus.";
      $_SESSION['timer'] = time();
      echo "<script>var time = setTimeout(function()
            {window.location = 'index.php?menu=jenis_air'}, 0);</script>";
      break;

    case "wadah":
      delete_air($_GET['id']);
      $_SESSION['flash'] = "Panghapusan Data";
      $_SESSION['flash_message'] = "Wadah berhasil dihapus.";
      $_SESSION['timer'] = time();
      echo "<script>var time = setTimeout(function()
            {window.location = 'index.php?menu=wadah'}, 0);</script>";
      break;

    case "satuan":
      delete_satuan($_GET['id']);
      $_SESSION['flash'] = "Panghapusan Data";
      $_SESSION['flash_message'] = "Wadah berhasil dihapus.";
      $_SESSION['timer'] = time();
      echo "<script>var time = setTimeout(function()
            {window.location = 'index.php?menu=satuan'}, 0);</script>";
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
        {window.location = 'localhost/wepeak/view/index.php'}, 3);</script>";
}
 ?>
