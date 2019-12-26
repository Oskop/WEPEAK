<?php
session_start();
require_once '../model/pengguna.php';
  if (isset($_POST['login'])) {
    $pengguna = new Pengguna();

    // $pengguna->email = htmlspecialchars(strip_tags($_POST['email']));
    // $pengguna->no_hp = htmlspecialchars(strip_tags($_POST['no_hp']));


    $pengguna->username = htmlspecialchars(strip_tags($_POST['username']));
    $pengguna->password = hash("sha512", htmlspecialchars(strip_tags($_POST['password'])));
    // $password2 = htmlspecialchars(strip_tags($_POST['password2']));
    // $pengguna->pertanyaan = htmlspecialchars(strip_tags($_POST['pertanyaan']));
    // $pengguna->jawaban = htmlspecialchars(strip_tags($_POST['jawaban']));
    // $pengguna->role = htmlspecialchars(strip_tags($_POST['role']));
    $jadi = $pengguna->login();
    if ($jadi) {
      $_SESSION['id'] = $jadi['id'];
      $_SESSION['username'] = $jadi['username'];
      $_SESSION['foto'] = $jadi['foto'];
      $_SESSION['role'] = $jadi['role'];
      $_SESSION['status'] = true;
      // var_dump($jadi);die;
      echo '<script>alert("Anda Berhasil Melakukan Pendaftaran")</script>';
      echo "<script>window.location = '../public/?page=cart';</script>";
    }

  }
 ?>
