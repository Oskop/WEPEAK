<?php
// require_once 'pdo_connection.php';

function get_satuan_all()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $wadah_all = $con->prepare("SELECT * FROM wepeak.satuan");
    $wadah_all->execute();
    // var_dump($wadah_all);
    $result = $wadah_all->fetchAll();
    return $result;
  } catch (\Exception $e) {
    var_dump($e);die;
    return $e;
  }

}

function get_satuan_once($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($id)) {
      $wadah = $con->prepare("SELECT * FROM wepeak.satuan WHERE id = :id");
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

function insert_satuan($data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO wepeak.satuan (satuan) VALUES (:satuan)";
    $statement = $con->prepare($query);
    if (isset($data)) {
      $statement->bindParam(':satuan', htmlspecialchars(strip_tags($data['satuan'])));
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

function update_satuan($id, $data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE wepeak.satuan SET satuan=:satuan WHERE id = :id";
    $statement = $con->prepare($query);
    if (isset($id)) {
      $statement->bindParam(':satuan', $data['satuan']);
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

function delete_satuan($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "DELETE FROM wepeak.satuan WHERE id = :id ";
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

 ?>
