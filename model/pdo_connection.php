<?php
// $connection = new PDO('mysql:host=localhost;dbname=webprog2_tugas1', "root", '') or die(PDO::errorCode().'\n'.PDO::errorInfo());
// $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
// var_dump($connection);

try {
  // Make Connection
  $con = new PDO('mysql:host=localhost;dbname=webprog2_tugas1', "root", '');
  // Set Error Mode
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Delete Connection
  // $con = null;
} catch (PDOException $e) {
  // Show error message if connection was failed
  echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
  die();
}

 ?>
