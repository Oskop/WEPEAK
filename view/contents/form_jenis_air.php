<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/jenis_air.php';
 ?>

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Jenis Air</h5>

              <?php
              if (isset($_GET['id'])) {
                $data = get_air_once($_GET['id']);
                // var_dump($data[0]['nama']);die;

              }
              if (isset($_POST['update'])) {
                $data = ['nama' => $_POST['nama'],
                         'ph' => $_POST['ph'],
                         'manfaat' => $_POST['manfaat']
                       ];
                update_air($_GET['id'], $data);
                $_SESSION['flash'] = "Perubahan Data";
                $_SESSION['flash_message'] = "Jenis air berhasil diperbaharui.";
                $_SESSION['timer'] = time();
                echo "<script>var time = setTimeout(function()
                      {window.location = 'index.php?menu=jenis_air'}, 3);</script>";
                // echo "<script>document
                //       .getElementById('formAir')
                //       .addEventListener('submit', function(e) {
                //         e.preventDefault();
                //         window.location = '$base_url_admin" . "index.php?menu=jenis_air" . "';});</script>";
              }


              if (isset($_POST['save'])) {
                $data = ['nama' => $_POST['nama'],
                         'ph' => $_POST['ph'],
                         'manfaat' => $_POST['manfaat']
                       ];
                insert_air($data);
                $_SESSION['flash'] = "Penambahan Data";
                $_SESSION['flash_message'] = "Jenis air berhasil ditambahkan.";
                $_SESSION['timer'] = time();
                echo "<script>var time = setTimeout(function()
                      {window.location = 'index.php?menu=jenis_air'}, 3);</script>";
              }
               ?>

              <form class="" method="post" id="formAir" action="">
                <div class="position-relative form-group"><label for="nama" class="">Nama</label><input name="nama" id="nama" placeholder="Nama Jenis Air" type="nama" class="form-control"
                  <?php if (isset($_GET['id'])) {
                    echo "value='" . $data[0]['nama'] . "'";
                  } ?>
                  ></div>
                <div class="position-relative form-group"><label for="ph" class="">pH</label><input name="ph" id="ph"
                  placeholder="pH Air" type="ph" class="form-control"
                  <?php if (isset($_GET['id'])) {
                    echo "value='" . $data[0]['ph'] . "'";
                  } ?>
                  ></div>
                <div class="position-relative form-group"><label for="manfaat" class="">Manfaat</label><textarea name="manfaat" id="manfaat" class="form-control"><?php if (isset($_GET['id'])) {
                    echo trim($data[0]['manfaat'], " ");
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
