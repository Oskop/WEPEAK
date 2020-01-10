<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/WEPEAK/model/log.php';
if (!isset($_SESSION)) {
  // code...
  session_start();
} else {
  if (isset($_SESSION['role'])) {
    // code...
  }
}
$log = new Log();

if (isset($_SESSION['status'])) {
  $log->id_user = $_SESSION['id'];
  if (isset($_GET['module']) && isset($_GET['action'])) {
    $log->module = $_GET['module'];
    $log->action = $_GET['action'];
    $log->insert_log();
  }
}

 ?>
