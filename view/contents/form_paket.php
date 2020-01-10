<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/paket.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/jenis_air.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/satuan.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/wadah.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/log.php';
$air = get_air_dropdown();
$wadah = get_wadah_dropdown();
$satuan = get_satuan_all();
 ?>

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Paket</h5>

              <?php
              if (isset($_GET['id'])) {
                $data = get_paket_once($_GET['id']);
                // var_dump($data[0]['jenis']);die;

              }
              if (isset($_POST['update'])) {
                $data = ['id_air' => $_POST['id_air'],
                         'id_wadah' => $_POST['id_wadah'],
                         'banyak' => $_POST['banyak'],
                         'id_satuan' => $_POST['id_satuan'],
                         'harga' => $_POST['harga']
                       ];
                update_paket($_GET['id'], $data);
                $log = new Log();
                $log->id_user = $_SESSION['id'];
                $log->module = "paket";
                $log->action = "update paket " . $_GET['id'];
                $log->insert_log();
                $_SESSION['flash'] = "Perubahan Data";
                $_SESSION['flash_message'] = "Paket Air berhasil diperbaharui.";
                $_SESSION['timer'] = time();
                echo "<script>var time = setTimeout(function()
                      {window.location = 'index.php?menu=paket'}, 0);</script>";
                // echo "<script>document
                //       .getElementById('formAir')
                //       .addEventListener('submit', function(e) {
                //         e.preventDefault();
                //         window.location = '$base_url_admin" . "index.php?menu=id_air_air" . "';});</script>";
              }


              if (isset($_POST['save'])) {
                $data = ['id_air' => $_POST['id_air'],
                         'id_wadah' => $_POST['id_wadah'],
                         'banyak' => $_POST['banyak'],
                         'id_satuan' => $_POST['id_satuan'],
                         'harga' => $_POST['harga']
                       ];
                insert_paket($data);
                $log = new Log();
                $log->id_user = $_SESSION['id'];
                $log->module = "paket";
                $log->action = "insert";
                $log->insert_log();
                $_SESSION['flash'] = "Penambahan Data";
                $_SESSION['flash_message'] = "Jenis air berhasil ditambahkan.";
                $_SESSION['timer'] = time();
                echo "<script>var time = setTimeout(function()
                      {window.location = 'index.php?menu=paket'}, 0);</script>";
              }
               ?>

              <form class="" method="post" id="formAir" action="">
                <div class="position-relative form-group"><label for="id_air" class="">Jenis Air</label>
                  <select class="form-control" name="id_air">
                    <option value="">Pilih Jenis Air</option>
                    <?php foreach ($air as $key => $value): ?>
                      <?php if (isset($_GET['id']) AND $value['id'] == $data[0]['id_air']): ?>
                        <option value="<?=$value['id'];?>"selected><?=$value['nama'];?></option>
                      <?php else: ?>
                        <option value="<?=$value['id'];?>"><?=$value['nama'];?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="position-relative form-group"><label for="id_wadah" class="">Wadah</label>
                  <select class="form-control" name="id_wadah">
                    <option value="">Pilih Wadah</option>
                    <?php foreach ($wadah as $key => $value): ?>
                      <?php if (isset($_GET['id']) AND $value['id'] == $data[0]['id_wadah']): ?>
                        <option value="<?=$value['id'];?>"selected><?=$value['jenis'];?></option>
                      <?php else: ?>
                        <option value="<?=$value['id'];?>"><?=$value['jenis'];?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="position-relative form-group"><label for="banyak" class="">Banyak</label>
                  <input name="banyak" id="banyak" placeholder="Banyak" type="number" class="form-control"
                  <?php if (isset($_GET['id'])) {
                    echo "value='" . $data[0]['banyak'] . "'";
                  } ?>>
                </div>
                  <div class="position-relative form-group"><label for="id_satuan" class="">Satuan</label>
                    <select class="form-control" name="id_satuan">
                      <option value="">Pilih Satuan</option>
                      <?php foreach ($satuan as $key => $value): ?>
                          <option value="<?=$value['id'];?>"
                            <?php if (isset($_GET['id']) AND $value['id'] == $data[0]['id_satuan']): ?>
                              <?="selected";?>
                            <?php endif; ?>
                            ><?=$value['satuan'];?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="position-relative form-group"><label for="id_air" class="">Harga</label>
                    <input name="harga" id="harga" placeholder="Harga" type="number" class="form-control"
                    <?php if (isset($_GET['id'])) {
                      echo "value='" . $data[0]['harga'] . "'";
                    } ?>>
                  </div>
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
