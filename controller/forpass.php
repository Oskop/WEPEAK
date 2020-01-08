<?php
require_once '../model/pengguna.php';
if (isset($_POST)) {
  if (null !== $_POST['email']) {
    $pengguna = new Pengguna();
    $pengguna->email = htmlspecialchars($_POST['email']);
    $tanyaJawab = $pengguna->getTanyaJawab();


    if (isset($tanyaJawab[0])) {
      $tanyaJawab = $pengguna->getTanyaJawab()[0];

      if (isset($_POST['jawaban'])) {
        if (isset($_POST['password'])) {
          $pengguna->password = hash("sha512", htmlspecialchars(strip_tags($_POST['password'])));
          $pengguna->resetPassword();
          echo json_encode(["pesan" => "Password sudah diganti. Pastikan Jangan Sampai Lupa Lagi."]);
        } else {
          if ($_POST['jawaban'] == $tanyaJawab['jawaban']) {
            echo json_encode(["pesan" => "Jawaban Benar. Silahkan Buat Password Baru."
            ,"pertanyaan" => $tanyaJawab['pertanyaan']
            // ,"jawaban" => $tanyaJawab['jawaban']
          ]);
          }
          else {
            echo json_encode(["pesan" => "Jawaban Salah!"]);
        }

      }

        // code...
      } else {
        echo json_encode(["pesan" => "Silahkan Jawab Pertanyaan yang Anda buat sendiri!"
        ,"pertanyaan" => $tanyaJawab['pertanyaan']
        // ,"jawaban" => $tanyaJawab['jawaban']
        ]);
      }
    }


    else {
      echo json_encode(["pesan" => "Email tidak ada di dalam database"]);
    }
  }

  else {
    echo json_encode(["pesan" => "email tidak terkirim"]);
  }
}
 ?>
