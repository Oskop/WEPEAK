<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/wadah.php';
 ?>

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Jenis Wadah</h5>

              <?php
              if (isset($_GET['id'])) {
                $data = get_wadah_once($_GET['id']);
                // var_dump($data[0]['jenis']);die;

              }
              if (isset($_POST['update'])) {
                $data = ['jenis' => $_POST['jenis'],
                         'isi' => $_POST['isi'],
                         'harga' => $_POST['harga']
                       ];
                update_wadah($_GET['id'], $data);
                $_SESSION['flash'] = "Perubahan Data";
                $_SESSION['flash_message'] = "Jenis Wadah berhasil diperbaharui.";
                $_SESSION['timer'] = time();
                echo "<script>var time = setTimeout(function()
                      {window.location = 'index.php?menu=wadah'}, 0);</script>";
                // echo "<script>document
                //       .getElementById('formAir')
                //       .addEventListener('submit', function(e) {
                //         e.preventDefault();
                //         window.location = '$base_url_admin" . "index.php?menu=jenis_air" . "';});</script>";
              }


              if (isset($_POST['save'])) {
                $data = ['jenis' => $_POST['jenis'],
                         'isi' => $_POST['isi'],
                         'harga' => $_POST['harga']
                       ];
                insert_wadah($data);
                $_SESSION['flash'] = "Penambahan Data";
                $_SESSION['flash_message'] = "Jenis air berhasil ditambahkan.";
                $_SESSION['timer'] = time();
                echo "<script>var time = setTimeout(function()
                      {window.location = 'index.php?menu=wadah'}, 0);</script>";
              }
               ?>

              <form class="" method="post" id="formAir" action="">
                <div class="position-relative form-group"><label for="jenis" class="">Jenis</label><input name="jenis" id="jenis" placeholder="Nama Jenis Air" type="jenis" class="form-control"
                  <?php if (isset($_GET['id'])) {
                    echo "value='" . $data[0]['jenis'] . "'";
                  } ?>
                  ></div>
                <div class="position-relative form-group"><label for="isi" class="">Isi</label><input name="isi" id="isi"
                  placeholder="Kapasitas jenis wadah" type="isi" class="form-control"
                  <?php if (isset($_GET['id'])) {
                    echo "value='" . $data[0]['isi'] . "'";
                  } ?>
                  ></div>
                <div class="position-relative form-group"><label for="harga" class="">Harga</label><textarea name="harga" id="harga" class="form-control"><?php if (isset($_GET['id'])) {
                    echo trim($data[0]['harga'], " ");
                  } ?></textarea></div>
                <!-- <button class="mt-1 btn btn-primary">Submit</button> -->
                <?php if (isset($_GET['id'])) {
                  echo "<input type=\"submit\" name=\"update\" value=\"Ubah\" class=\"mt-1 btn btn-primary\">";
                }else {
                  echo "<input type=\"submit\" name=\"save\" value=\"Simpan\" class=\"mt-1 btn btn-primary\">";
                } ?>
                <!-- <input type="submit" name="save" value="Simpan" class="mt-1 btn btn-primary"> -->
              </form>
          </div>
      </div>
  </div>
</div>
</div>
