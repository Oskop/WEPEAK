<?php
require_once 'pdo_connection.php';

/**
 *
 */
class Pengguna
{

  public $id;
  public $nama;
  public $alamat;
  public $gender;
  public $no_hp;
  public $username;
  public $password;
  public $email;
  public $foto;
  public $role;
  public $pertanyaan;
  public $jawaban;

  function get_pengguna_all()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $wadah_all = $con->prepare("SELECT * FROM wepeak.users WHERE delete_at IS NULL");
      $wadah_all->execute();
      // var_dump($wadah_all);
      $result = $wadah_all->fetchAll();
      $con = null;
      return $result;
    } catch (\Exception $e) {
      var_dump($e);die;
      return $e;
    }

  }

  function get_pengguna_once()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if (isset($this->id)) {
        $users = $con->prepare("SELECT * FROM wepeak.users WHERE id = :id AND delete_at IS NULL");
        $users->bindParam(':id', $this->id);
        $users->execute();
        $result = $users->fetchAll();
        // var_dump($wadah);
        $wadah = null;
        return $result;
      } else {
        $error = "Ada kesalahan. Disarankan untuk mode debugging";
        // echo "Ada kesalahan. Disarankan untuk mode debugging";
        return $error;
      }
      $con = null;
    } catch (\Exception $e) {
      echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
      die;
    }

  }

  function getTanyaJawab()
  {
    if ($this->email) {
      try {
        $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $users = $con->prepare("SELECT pertanyaan, jawaban FROM wepeak.users WHERE email = :email AND delete_at IS NULL");
        $users->bindParam(':email', $this->email);
        $users->execute();
        $result = $users->fetchAll();
        // var_dump($wadah);
        $users = null;
        return $result;
        $con = null;
      } catch (\Exception $e) {
        echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
        die;
      }
    }
    else {
      $error = "Ada kesalahan. Disarankan untuk mode debugging";
      // echo "Ada kesalahan. Disarankan untuk mode debugging";
      return $error;
    }
  }

  function insert_pengguna()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "INSERT INTO wepeak.users (nama, alamat, gender, no_hp, username, password, email, role, pertanyaan, jawaban) VALUES (:nama, :alamat, :gender, :no_hp, :username, :password, :email, :role, :pertanyaan, :jawaban)";
      $statement = $con->prepare($query);

      $statement->bindParam(':nama', $this->nama);
      $statement->bindParam(':alamat', $this->alamat);
      $statement->bindParam(':gender', $this->gender);
      $statement->bindParam(':no_hp', $this->no_hp);
      $statement->bindParam(':username', $this->username);
      $statement->bindParam(':password', hash('sha512', $this->password));
      $statement->bindParam(':email', $this->email);
      $statement->bindParam(':role', $this->role);
      $statement->bindParam(':pertanyaan', $this->pertanyaan);
      $statement->bindParam(':jawaban', $this->jawaban);
      // if (isset($_FILES['foto'])) {
      //   if ($_FILES['foto']['error'] == 4) {
      //     $foto = upload_foto($_FILES['foto'], 'foto');
      //     if ($foto != false) {
      //       $statement->bindParam(':foto', $_FILES['foto']);
      //     } else {
      //       echo "Gambar tidak sesuai";
      //       $statement->bindParam(':foto', null);
      //     }
      //   } else {
      //     echo "Gambar Tidak dicantumkan";
      //     $statement->bindParam(':foto', null);
      //   }
      // } else {
      //   $statement->bindParam(':foto', htmlspecialchars(strip_tags("user.jpg")));
      // }
      var_dump($this->nama);die;
      $statement->execute();
      return "<script>location: 'localhost/wepeak/public/'</script>";
    } catch (\Exception $e) {
      echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
      die;
    }

  }

  function update_pengguna()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "UPDATE wepeak.users SET nama=:nama, alamat=:alamat, gender=:gender, no_hp=:no_hp, username=:username, email=:email, foto=:foto WHERE id = :id";
      $statement = $con->prepare($query);
      if (isset($id)) {
        $statement->bindParam(':nama', $this->nama);
        $statement->bindParam(':alamat', $this->alamat);
        $statement->bindParam(':gender', $this->gender);
        $statement->bindParam(':no_hp', $this->no_hp);
        $statement->bindParam(':username', $this->username);
        $statement->bindParam(':email', $this->email);
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

  function resetPassword()
  {
    if ($this->email != null && $this->password != null) {
      try {
        $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "UPDATE wepeak.users SET password=:password WHERE email = :email";
        $statement = $con->prepare($query);

        $statement->bindParam(':password', $this->password);
        $statement->bindParam(':email', $this->email);

        $statement->execute();
        return "Berhasil Memasukkan Data";
      } catch (\Exception $e) {
        echo "Koneksi atau query bermasalah: ". $e->getMessage() . "<br/>";
        die;
      }
    }
  }

  function delete_pengguna()
  {
    try {
      $con = new PDO('mysql:host=localhost;dbname=wepeak', "root", '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "UPDATE wepeak.users SET delete_at = CURRENT_TIMESTAMP() WHERE id = :id ";
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

  function login()
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



// function get_pengguna_dropdown()
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
