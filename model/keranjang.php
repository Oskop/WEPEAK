<?php
require_once 'pdo_connection.php';
require_once 'paket.php';
/**
 *
 */
class Keranjang
{

  // Atribut Transaksi
  public $id;
  public $id_user;
  public $alamat; // text / String
  public $ongkir; // float
  public $total; // float
  public $status; // string
  public $lunas; // tinyint

  // Atribut Per Barang
  public $lastID;
  public $id_harga_satuan;
  public $jumlah; // jumlah barnag
  public $subtotal; // jumlah barang x harga


  function get_keranjang_all()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $transaksi = $con->prepare("SELECT * FROM wepeak.transaksi WHERE delete_at IS NULL");
      $transaksi->execute();
      // var_dump($transaksi);
      $result = $transaksi->fetchAll();

      $con = null;
      return $result;
    } catch (\Exception $e) {
      var_dump($e);die;
      return $e;
    }

  }

  function get_keranjang_all_belum_lunas()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $transaksi = $con->prepare("SELECT transaksi.id, transaksi.alamat, transaksi.ongkir, transaksi.total,transaksi.status, transaksi.lunas,
                                  users.nama
                                  FROM wepeak.transaksi
                                  INNER JOIN users ON transaksi.id_user=users.id
                                  WHERE transaksi.delete_at IS NULL AND transaksi.lunas = 0
                                  ORDER BY transaksi.created_at;");
      $transaksi->execute();
      // var_dump($transaksi);
      $result = $transaksi->fetchAll();

      $con = null;
      return $result;
    } catch (\Exception $e) {
      var_dump($e);die;
      return $e;
    }

  }

  function get_keranjang_pengguna()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $transaksi = $con->prepare("SELECT * FROM wepeak.transaksi
                                  WHERE delete_at IS NULL AND id_user = :id_user
                                  ORDER BY id DESC");
      $transaksi->bindParam(':id_user', $this->id_user);
      $transaksi->execute();
      // var_dump($transaksi);
      $result = $transaksi->fetchAll();

      $con = null;
      return $result;
    } catch (\Exception $e) {
      var_dump($e);die;
      return $e;
    }

  }

  function get_keranjang_once()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if (isset($id)) {
        $users = $con->prepare("SELECT * FROM wepeak.keranjang WHERE id = :id AND delete_at IS NULL");
        $users->bindParam(':id', $this->id);
        $users->execute();
        $result = $users->fetchAll();
        // var_dump($wadah);
        $wadah = null;
        return $result;
      } else {
        $error = "Ada kesalahan. Disarankan untuk mode debugging";
        echo "Ada kesalahan. Disarankan untuk mode debugging";
        return $error;
      }
      $con = null;
    } catch (\Exception $e) {
      echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
      die;
    }

  }

  function get_idbarang_pengguna()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "SELECT * FROM wepeak.detail_transaksi WHERE id_transaksi = :id_transaksi";

      $statement = $con->prepare($query);
      $statement->bindParam(':id_transaksi', $this->id);

      $statement->execute();
      $result = $statement->fetchAll();
      return $result;
    } catch (\Exception $e) {
      echo "Koneksi atau query bermasalah: ". $e->getMessage(). "<br/>";
    }
  }

  function insert_keranjang()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "INSERT INTO wepeak.transaksi (id_user, alamat, ongkir, total, status, lunas)
                VALUES (:id_user, :alamat, :ongkir, :total, :status, :lunas)";
      $statement = $con->prepare($query);

      $statement->bindParam(':id_user', $this->id_user);
      $statement->bindParam(':alamat', $this->alamat);
      $statement->bindParam(':ongkir', $this->ongkir);
      $statement->bindParam(':total', $this->total);
      $statement->bindParam(':status', $this->status);
      $statement->bindParam(':lunas', $this->lunas);

      // var_dump($this->nama);die;
      $statement->execute();
      $statement = $con->prepare("SELECT MAX(id) id FROM wepeak.transaksi");
      $statement->execute();
      $lastId = $statement->fetchAll();
      // var_dump($lastId[0]['id']);die;
      return $lastId[0]['id'];
    } catch (\Exception $e) {
      echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
      die;
    }

  }

  function insert_barang()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "INSERT INTO wepeak.detail_transaksi (id_transaksi, id_harga_satuan, jumlah, subtotal)
                VALUES (:id_transaksi, :id_harga_satuan, :jumlah, :subtotal)";

      $statement = $con->prepare($query);
      $statement->bindParam(':id_transaksi', $this->lastID);
      $statement->bindParam(':id_harga_satuan', $this->id_harga_satuan);
      $statement->bindParam(':jumlah', $this->jumlah);
      $statement->bindParam(':subtotal', $this->subtotal);

      $statement->execute();
    } catch (\Exception $e) {
      echo "Koneksi atau query bermasalah: ". $e->getMessage(). "<br/>";
    }

  }


  function update_keranjang($id, $data)
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "UPDATE wepeak.wadah SET nama=:nama, alamat=:alamat, gender=:gender, no_hp=:no_hp, username=:username, email=:email, foto=:foto WHERE id = :id";
      $statement = $con->prepare($query);
      if (isset($id)) {
        $statement->bindParam(':nama', htmlspecialchars(trim($this->nama)));
        $statement->bindParam(':alamat', htmlspecialchars(trim($this->alamat)));
        $statement->bindParam(':gender', htmlspecialchars(trim($this->gender)));
        $statement->bindParam(':no_hp', htmlspecialchars(trim($this->no_hp)));
        $statement->bindParam(':username', htmlspecialchars(trim($this->username)));
        $statement->bindParam(':email', htmlspecialchars(trim($this->email)));
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
            $statement->bindParam(':foto', $this->foto);
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

  function ubahStatus()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "UPDATE wepeak.transaksi SET status=:status WHERE id = :id";
      $statement = $con->prepare($query);
      if (isset($this->id)) {
        $statement->bindParam(':status', $this->status);
        $statement->bindParam(':id', $this->id);
        $statement->execute();
        // var_dump($statement);die;
        return "Berhasil Memasukkan Data";
      } else {
        return "Data tidak ada.";
      }
    } catch (\Exception $e) {
      echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
      die();
    }

  }

  function delete_keranjang()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "UPDATE wepeak.transaksi SET delete_at = CURRENT_TIMESTAMP() WHERE id = :id ";
      echo $query;
      $statement = $con->prepare($query);
      if (isset($this->id)) {
        $statement->bindParam(':id', $this->id);
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

  function tambah_produk()
  {

  }

  function log()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "SELECT * FROM wepeak.users WHERE username = :username";
      $statement = $con->prepare($query);
      $statement->bindParam(':username', $this->username);
      $statement->execute();
      $result = $statement->fetchAll();
      $statement = null; $con = null;
      return $result;
    } catch (\Exception $e) {

    }

  }


}



// function get_keranjang_dropdown()
// {
//   try {
//     $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
//     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $wadah_all = $con->prepare("SELECT id, jenis, isi FROM wepeak.wadah WHERE deleted_at IS NULL");
//     $wadah_all->execute();
//     // var_dump($wadah_all);
//     $result = $wadah_all->fetchAll();
//     return $result;
//   } catch (\Exception $e) {
//     var_dump($e);die;
//     return $e;
//   }
//
// }

 ?>
