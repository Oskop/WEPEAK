<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/wadah.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/stokwadah.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/log.php';
$wadah = get_wadah_all();
if (isset($_GET['id'])) {
  $stokwadah = get_stokwadah_once($_GET['id']);
  // var_dump($stokwadah);
}
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
                $data = ['id_wadah' => $_POST['id_wadah'],
                         'jumlah' => $_POST['jumlah']
                       ];
                update_stokwadah($_GET['id'], $data);
                $log = new Log();
                $log->id_user = $_SESSION['id'];
                $log->module = "stokwadah";
                $log->action = "update " . $_GET['id'];
                $log->insert_log();
                $_SESSION['flash'] = "Perubahan Data";
                $_SESSION['flash_message'] = "Jenis Wadah berhasil diperbaharui.";
                $_SESSION['timer'] = time();
                echo "<script>window.location = 'index.php?menu=stokwadah';</script>";
                // echo "<script>document
                //       .getElementById('formAir')
                //       .addEventListener('submit', function(e) {
                //         e.preventDefault();
                //         window.location = '$base_url_admin" . "index.php?menu=id_wadah_air" . "';});</script>";
              }


              if (isset($_POST['save'])) {
                $data = ['id_wadah' => $_POST['id_wadah'],
                         'jumlah' => $_POST['jumlah']
                       ];
                insert_stokwadah($data);
                $log = new Log();
                $log->id_user = $_SESSION['id'];
                $log->module = "stokwadah";
                $log->action = "insert";
                $log->insert_log();
                $_SESSION['flash'] = "Penambahan Data";
                $_SESSION['flash_message'] = "Jenis air berhasil ditambahkan.";
                $_SESSION['timer'] = time();
                echo "<script>var time = setTimeout(function()
                      {window.location = 'index.php?menu=stokwadah'}, 0);</script>";
              }
               ?>

              <form class="" method="post" id="formAir" action="">
                <div class="position-relative form-group"><label for="id_wadah"
                  class="">Jenis Wadah</label>
                  <select class="form-control" name="id_wadah">
                    <?php if (isset($_GET['id'])): ?>
                      <option value="<?=$stokwadah[0]['id_wadah'];?>"
                      selected disabled><?=$stokwadah[0]['nama'] . " " . $stokwadah[0]['isi'];?></option>
                      <?php else: ?>
                        <option value="kosong" selected>Pilih Jenis Wadah</option>
                        <?php foreach ($wadah as $key => $value): ?>
                          <option value="<?=$value['id'];?>"><?=$value['jenis'] . " " . $value['isi'];?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                <div class="position-relative form-group"><label for="jumlah" class="mt-3">Jumlah</label>
                  <input name="jumlah" id="jumlah"
                  placeholder="" type="number" class="form-control" required
                  <?php if (isset($_GET['id'])) {
                    echo "value='" . $stokwadah[0]['jumlah'] . "'";
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
