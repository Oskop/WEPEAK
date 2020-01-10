<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/satuan.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/log.php';
 ?>

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Satuan</h5>

              <?php
              if (isset($_GET['id'])) {
                $data = get_satuan_once($_GET['id']);
                // var_dump($data[0]['nama']);die;

              }
              if (isset($_POST['update'])) {
                $data = ['satuan' => $_POST['satuan']];
                update_satuan($_GET['id'], $data);
                $log = new Log();
                $log->id_user = $_SESSION['id'];
                $log->module = "satuan";
                $log->action = "update satuan " . $_GET['id'];
                $log->insert_log();
                $_SESSION['flash'] = "Perubahan Data";
                $_SESSION['flash_message'] = "Jenis air berhasil diperbaharui.";
                $_SESSION['timer'] = time();
                echo "<script>var time = setTimeout(function()
                      {window.location = 'index.php?menu=satuan'}, 3);</script>";
                // echo "<script>document
                //       .getElementById('formAir')
                //       .addEventListener('submit', function(e) {
                //         e.preventDefault();
                //         window.location = '$base_url_admin" . "index.php?menu=satuan" . "';});</script>";
              }


              if (isset($_POST['save'])) {
                $data = ['satuan' => $_POST['satuan']];
                insert_satuan($data);
                $log = new Log();
                $log->id_user = $_SESSION['id'];
                $log->module = "satuan";
                $log->action = "insert";
                $log->insert_log();
                $_SESSION['flash'] = "Penambahan Data";
                $_SESSION['flash_message'] = "Jenis air berhasil ditambahkan.";
                $_SESSION['timer'] = time();
                echo "<script>var time = setTimeout(function()
                      {window.location = 'index.php?menu=satuan'}, 3);</script>";
              }
               ?>

              <form class="" method="post" id="formAir" action="">
                <div class="position-relative form-group"><label for="satuan" class="">Satuan Pokok</label><input name="satuan" id="satuan" placeholder="Nama Jenis Air" type="nama" class="form-control"
                  <?php if (isset($_GET['id'])) {
                    echo "value='" . $data[0]['satuan'] . "'";
                  } ?>
                  ></div>
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
