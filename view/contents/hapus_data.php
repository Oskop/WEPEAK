<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/jenis_air.php';
if (isset($_GET['menu'])) {
  // code...
} else {
  $_SESSION['flash'] = "Panghapusan Data";
  $_SESSION['flash_message'] = "Penghapusan data tidak berhasil. Terjadi kesalahan. Kalau terjadi kesalahan melulu, silahkan hubungi pembuat.";
  $_SESSION['timer'] = time();
  echo "<script>var time = setTimeout(function()
        {window.location = '/index.php?menu=jenis_air'}, 3);</script>";
}
 ?>
