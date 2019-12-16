<?php
// require_once 'pdo_connection.php';

function get_paket_all()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $wadah_all = $con->prepare("SELECT paket.id, jenis_air.nama AS air, wadah.jenis AS wadah, paket.banyak AS banyak, satuan.satuan AS satuan, paket.harga, paket.created_at, paket.update_at, paket.delete_at FROM harga_satuan paket INNER JOIN jenis_air ON paket.id_air=jenis_air.id INNER JOIN wadah ON paket.id_wadah=wadah.id INNER JOIN satuan ON paket.id_satuan=satuan.id WHERE paket.delete_at IS NULL");
    $wadah_all->execute();
    // var_dump($wadah_all);
    $result = $wadah_all->fetchAll();
    return $result;
  } catch (\Exception $e) {
    var_dump($e);die;
    return $e;
  }

}

function get_paket_once($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($id)) {
      $wadah = $con->prepare("SELECT paket.id, paket.id_satuan, paket.id_wadah, paket.id_air, jenis_air.nama AS air, wadah.jenis AS wadah, paket.banyak AS banyak, satuan.satuan AS satuan, paket.harga, paket.created_at, paket.update_at, paket.delete_at FROM harga_satuan paket INNER JOIN jenis_air ON paket.id_air=jenis_air.id INNER JOIN wadah ON paket.id_wadah=wadah.id INNER JOIN satuan ON paket.id_satuan=satuan.id WHERE paket.delete_at IS NULL AND paket.id=:id");
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

function insert_paket($data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO wepeak.harga_satuan (id_air, id_wadah, banyak, id_satuan, harga) VALUES (:id_air, :id_wadah, :banyak, :id_satuan, :harga)";
    $statement = $con->prepare($query);
    if (isset($data)) {
      $statement->bindParam(':id_air', $data['id_air']);
      $statement->bindParam(':id_wadah', $data['id_wadah']);
      $statement->bindParam(':banyak', $data['banyak']);
      $statement->bindParam(':id_satuan', $data['id_satuan']);
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

function update_paket($id, $data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE wepeak.harga_satuan SET id_air=:id_air, id_wadah=:id_wadah, banyak=:banyak, id_satuan=:id_satuan, harga=:harga WHERE id = :id";
    $statement = $con->prepare($query);
    if (isset($id)) {
      $statement->bindParam(':id_air', $data['id_air']);
      $statement->bindParam(':id_wadah', $data['id_wadah']);
      $statement->bindParam(':banyak', $data['banyak']);
      $statement->bindParam(':id_satuan', $data['id_satuan']);
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

function delete_paket($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE wepeak.harga_satuan SET delete_at = CURRENT_TIMESTAMP() WHERE id = :id ";
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
