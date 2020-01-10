<?php
session_start();
require_once '../model/log.php';
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
