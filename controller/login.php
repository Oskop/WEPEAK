<?php
session_start();
require_once '../model/pengguna.php';
require_once '../model/log.php';
$log = new Log();
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
    // var_dump($jadi);die;
    if (isset($jadi)) {
    // var_dump($jadi);die;
      if ($pengguna->password == $jadi[0]['password']) {
        // echo "true\n";
        // echo $pengguna->password . "\n" . $jadi[0]['password'];
        // die;
        $_SESSION['id'] = $jadi[0]['id'];
        $_SESSION['username'] = $jadi[0]['username'];
        $_SESSION['foto'] = $jadi[0]['foto'];
        $_SESSION['role'] = $jadi[0]['role'];
        $_SESSION['status'] = true;
        // var_dump($jadi);die;
        echo '<script>alert("Anda Sudah Login")</script>';
        $log->id_user = $_SESSION['id'];
        $log->module = "users";
        $log->action = "login Public";
        $log->insert_log();
        echo "<script>window.location = '../public/?page=cart';</script>";
      } else {
        // echo $pengguna->password . "\n" . $jadi[0]['password'];
        // echo "false";die;
        echo '<script>alert("Username atau password salah! Coba Lagi!")</script>';
        // echo "<script>window.location = '../public/?page=login';</script>";
        echo "<script>window.history.back();</script>";
      }
    } else {
      echo '<script>alert("User tidak ditemukan")</script>';
      echo "<script>window.location = '../public/?page=login';</script>";
    }

  }
 ?>
