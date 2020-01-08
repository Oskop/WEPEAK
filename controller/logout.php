<?php
session_start();
require_once '../model/pengguna.php';

if (isset($_GET['logout'])) {
  session_reset();
  session_unset();
  session_destroy();
  echo "<script>window.location = '../';</script>";
}
 ?>
