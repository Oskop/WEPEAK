<?php
require_once '../model/pengguna.php';
require_once '../model/log.php';
  if (isset($_POST['register'])) {
    $pengguna = new Pengguna();
    $pengguna->nama = htmlspecialchars(strip_tags($_POST['nama']));
    $pengguna->email = htmlspecialchars(strip_tags($_POST['email']));
    $pengguna->no_hp = htmlspecialchars(strip_tags($_POST['no_hp']));
    $pengguna->alamat = htmlspecialchars(strip_tags($_POST['alamat']));
    $pengguna->gender = htmlspecialchars(strip_tags($_POST['gender']));
    $pengguna->username = htmlspecialchars(strip_tags($_POST['username']));
    $pengguna->password = hash('sha512', htmlspecialchars(strip_tags($_POST['password'])));
    $pengguna->pertanyaan = htmlspecialchars(strip_tags($_POST['pertanyaan']));
    $pengguna->jawaban = htmlspecialchars(strip_tags($_POST['jawaban']));
    $pengguna->role = htmlspecialchars(strip_tags($_POST['role']));

    // if (!preg_match("/^[a-zA-Z ]*$/",$pengguna->nama)) {
    //   echo '<script>alert("Nama hanya boleh berisikan huruf");return false;</script>';
    // }
    // if (preg_match("/^[a-zA-Z ]*$/",$pengguna->no_hp)) {
    //   echo '<script>alert("Nomor hp hanya boleh berisikan angka");return false;</script>';
    // }
    // if (!filter_var($pengguna->email, FILTER_VALIDATE_EMAIL)) {
    //   echo '<script>alert("Penulisan Email tidak benar"); return false;</script>';
    // }
    // if ($_POST['password'] != $_POST['password2']) {
    //   echo '<script>alert("Konfirmasi Password Belum Benar");return false;</script>';
    // }
    $pengguna->insert_pengguna();
    echo '<script>alert("Anda Berhasil Melakukan Pendaftaran");</script>';
    $log = new Log();
    $log->id_user = 0;
    $log->module = "users"
    $log->action = "register";
    $log->insert_log();
    echo "<script>window.location = '../public/?page=login';</script>";
    // header('location: localhost/wepeak/?page=login');
  }
 ?>
