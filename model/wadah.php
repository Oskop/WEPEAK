<?php
// require_once 'pdo_connection.php';

function get_wadah_all()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $wadah_all = $con->prepare("SELECT * FROM wepeak.wadah WHERE deleted_at IS NULL");
    $wadah_all->execute();
    // var_dump($wadah_all);
    $result = $wadah_all->fetchAll();
    return $result;
  } catch (\Exception $e) {
    var_dump($e);die;
    return $e;
  }

}

function get_wadah_once($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($id)) {
      $wadah = $con->prepare("SELECT * FROM wepeak.wadah WHERE id = :id AND deleted_at IS NULL");
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

function insert_wadah($data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO wepeak.wadah (jenis, isi, harga) VALUES (:jenis, :isi, :harga)";
    $statement = $con->prepare($query);
    if (isset($data)) {
      $statement->bindParam(':jenis', $data['jenis']);
      $statement->bindParam(':isi', $data['isi']);
      $statement->bindParam(':harga', $data['harga']);
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

function update_wadah($id, $data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE wepeak.wadah SET jenis=:jenis, isi=:isi, harga=:harga WHERE id = :id";
    $statement = $con->prepare($query);
    if (isset($id)) {
      $statement->bindParam(':jenis', $data['jenis']);
      $statement->bindParam(':isi', $data['isi']);
      $statement->bindParam(':harga', $data['harga']);
      $statement->bindParam(':id', $id);
      // $wadah = $con->query("UPDATE wadah SET jenis=?, isi=?, harga=?, update_at=TIMESTAMP()
      //                       WHERE id = ?");
      $statement->execute();
      return "Berhasil Mengubah Data";
    } else {
      return "Data tidak ada.";
    }
  } catch (\Exception $e) {
    echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
    die();
  }

}

function delete_wadah($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE wepeak.wadah SET deleted_at = CURRENT_TIMESTAMP() WHERE id = :id ";
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

function get_wadah_dropdown()
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

 ?>
