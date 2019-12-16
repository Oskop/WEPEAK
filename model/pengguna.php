<?php
// require_once 'pdo_connection.php';

function get_pengguna_all()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $wadah_all = $con->prepare("SELECT * FROM wepeak.users WHERE delete_at IS NULL");
    $wadah_all->execute();
    // var_dump($wadah_all);
    $result = $wadah_all->fetchAll();
    return $result;
  } catch (\Exception $e) {
    var_dump($e);die;
    return $e;
  }

}

function get_pengguna_once($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($id)) {
      $wadah = $con->prepare("SELECT * FROM wepeak.users WHERE id = :id AND delete_at IS NULL");
      $wadah->bindParam(':id', $id);
      $wadah->execute();
      $result = $wadah->fetchAll();
      // var_dump($wadah);
      return $result;
    } else {
      $error = "Ada kesalahan. Disarankan untuk mode debugging";
      echo "Ada kesalahan. Disarankan untuk mode debugging";
      return $error;
    }
  } catch (\Exception $e) {
    echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
    die;
  }

}

function insert_pengguna($data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO wepeak.users (nama, alamat, gender, no_hp, password, email, foto, role) VALUES (:nama, :alamat, :gender, :no_hp, :password, :email, :foto, :role)";
    $statement = $con->prepare($query);
    if (isset($data)) {
      $statement->bindParam(':nama', $data['nama']);
      $statement->bindParam(':alamat', $data['alamat']);
      $statement->bindParam(':gender', $data['gender']);
      $statement->bindParam(':no_hp', $data['no_hp']);
      $statement->bindParam(':password', $data['password']);
      $statement->bindParam(':email', $data['email']);
      $statement->bindParam(':role', $data['role']);
      if (isset($_FILES['foto'])) {
        if ($_FILES['foto']['error'] == 4) {
          $foto = upload_foto($_FILES['foto'], 'foto');
          if ($foto != false) {
            $statement->bindParam(':foto', $_FILES['foto']);
          } else {
            echo "Gambar tidak sesuai";
            $statement->bindParam(':foto', null);
          }
        } else {
          echo "Gambar Tidak dicantumkan";
          $statement->bindParam(':foto', null);
        }
      }
      $statement->execute();
      return "Berhasil Memasukkan Data";
    } else {
      return "Data tidak ada.";
    }

  } catch (\Exception $e) {
    echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
    die;
  }

}

function update_pengguna($id, $data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE wepeak.wadah SET nama:nama, alamat:alamat, gender:gender, no_hp:no_hp, password:password, email:email, foto:foto, role:role WHERE id = :id";
    $statement = $con->prepare($query);
    if (isset($id)) {
      $statement->bindParam(':nama', $data['nama']);
      $statement->bindParam(':alamat', $data['alamat']);
      $statement->bindParam(':gender', $data['gender']);
      $statement->bindParam(':no_hp', $data['no_hp']);
      $statement->bindParam(':password', $data['password']);
      $statement->bindParam(':email', $data['email']);
      $statement->bindParam(':role', $data['role']);
      if (isset($_FILES['foto'])) {
        if ($_FILES['foto']['error'] == 4) {
          $foto = upload_foto($_FILES['foto'], 'foto');
          if ($foto != false) {
            $statement->bindParam(':foto', $_FILES['foto']);
          } else {
            echo "Gambar tidak sesuai";
            $statement->bindParam(':foto', null);
          }
        } else {
          echo "Gambar Tidak dicantumkan";
          $statement->bindParam(':foto', null);
        }
      }
      $statement->execute();
      return "Berhasil Memasukkan Data";
    } else {
      return "Data tidak ada.";
    }
  } catch (\Exception $e) {
    echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
    die();
  }

}

function delete_pengguna($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE wepeak.users SET delete_at = CURRENT_TIMESTAMP() WHERE id = :id ";
    echo $query;
    $statement = $con->prepare($query);
    if (isset($id)) {
      $statement->bindParam(':id', $id);
      // $statement->bindParam(':deleted_at', date("Y-m-d H:i:s"));
      $statement->execute();
      return "";
    } else {
      return "id belum tercantum";
    }
  } catch (\Exception $e) {
    echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
    die();
  }

}

function get_pengguna_dropdown()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $wadah_all = $con->prepare("SELECT id, jenis, isi FROM wepeak.wadah WHERE deleted_at IS NULL");
    $wadah_all->execute();
    // var_dump($wadah_all);
    $result = $wadah_all->fetchAll();
    return $result;
  } catch (\Exception $e) {
    var_dump($e);die;
    return $e;
  }

}

function upload_foto($file = null, $location = null)
{
  $file_name = $file['name'];
  $file_size = $file['size'];
  $error = $file['error'];
  $tmp_name = $file['tmp_name'];

  if ($error == 4) {
    echo '<script>alert("Pilih Foto")</script>';
    return false;
  }

  $valid = ['jpg', 'jpeg', 'png'];
  $file_extension = explode('.', $file_name);
  $extension = strtolower(end($file_extension));
  if (!in_array($extension, $valid)) {
    echo "<script>alert('Gambar harus berekstensi jpg, jpeg, atau png')</script>";
    return false;
  }

  if ($file_size > 1000000) {
    echo '<script>alert("Ukuran file gambar tidak boleh lebih dari 1MB")</script>';
    return false;
  }

  $new_name = uniqid();
  $new_name .= '.';
  $new_name .= $extension;

  move_uploaded_file($tmp_name, 'assets/images/' . $location . '/' . $new_name);
  return $new_name;
}

 ?>
