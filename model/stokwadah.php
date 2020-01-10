<?php
// require_once 'pdo_connection.php';

function get_stokwadah_all()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $wadah_all = $con->prepare("SELECT stok_wadah.id_wadah, wadah.jenis nama,
      wadah.isi, stok_wadah.jumlah FROM stok_wadah INNER JOIN wadah ON
      wadah.id=stok_wadah.id_wadah WHERE delete_at IS NULL");
    $wadah_all->execute();
    // var_dump($wadah_all);
    $result = $wadah_all->fetchAll();
    return $result;
  } catch (\Exception $e) {
    var_dump($e);die;
    return $e;
  }

}

function get_stokwadah_once($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($id)) {
      $wadah = $con->prepare("SELECT stok_wadah.id_wadah, wadah.jenis nama,
        wadah.isi, stok_wadah.jumlah FROM stok_wadah INNER JOIN wadah ON
        wadah.id=stok_wadah.id_wadah WHERE delete_at IS NULL AND
        stok_wadah.id_wadah = :id");
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

function insert_stokwadah($data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO wepeak.stok_wadah (id_wadah, jumlah) VALUES (:id_wadah, :jumlah)";
    $statement = $con->prepare($query);
    if (isset($data)) {
      $statement->bindParam(':id_wadah', $data['id_wadah']);
      $statement->bindParam(':jumlah', $data['jumlah']);
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

function update_stokwadah($id, $data)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE wepeak.stok_wadah SET jumlah=:jumlah WHERE id_wadah = :id_wadah";
    $statement = $con->prepare($query);
    if (isset($id)) {
      $statement->bindParam(':jumlah', $data['jumlah']);
      $statement->bindParam(':id_wadah', $id);
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

function delete_stokwadah($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE wepeak.stok_wadah SET delete_at = CURRENT_TIMESTAMP() WHERE id_wadah = :id_wadah ";
    $statement = $con->prepare($query);
    if (isset($id)) {
      $statement->bindParam(':id_wadah', $id);
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

function get_stokwadah_dropdown()
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
