<?php
require_once '../model/pengguna.php';
 ?>
<section class="ftco-section ftco-no-pb ftco-no-pt mt-4 mb-5"
style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;"
>
  <div class="container">
    <form class="" action="../controller/register.php" method="post">
      <div class="row">
        <div class="col-md-3 register-left mt-4" style="text-align: center;
    color: #fff;
    margin-top: 4%;">
          <h3>Selamat Datang</h3>
          <p>Segera Rasakan Kesegaran dan Kesehatan Tubuh Alamiah Anda</p>
          <a class="btn btn-info" href="?page=login"/>Login</a><br/>
        </div>
        <div class="col-md-9 register-right mt-4">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">Form Pendaftaran</h3>
                <div class="row register-form">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="nama" id="nama" maxlength="30" placeholder="Nama *" value="" required/>
                        <input type="hidden" name="role" value="pelanggan">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email *" value="" required/>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP *" value="" required/>
                      </div>
                      <div class="form-group">
                        <textarea  class="form-control" name="alamat"  placeholder="Alamat *" value="" required></textarea>
                      </div>
                      <div class="form-group">
                        <div class="maxl">
                          <label class="radio inline">
                            <input type="radio" name="gender" value="laki-laki" checked>
                              <span style="color:white;"> Laki-Laki </span>
                          </label>
                          <label class="radio inline">
                            <input type="radio" name="gender" value="perempuan">
                            <span style="color:white;">Perempuan </span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" minlength="1" maxlength="25" placeholder="Username *" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password *"  value=""
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" onkeyup="check();" data-toggle="popover" title="Validasi Password" data-content="Harus berisikan paling tidak 1 angka, 1 huruf besar dan satu huruf kecil dan panjang karakter tidak boleh kurang dari 8" required/>
                            <small id="passwordMessage"></small>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password *" value="" onkeyup="check();" required/>
                          <small id="confirmMessage"></small>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Pertanyaan untuk reset Password *" value="" required/>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="jawaban" name="jawaban" placeholder="Jawaban yang paling diingat *" value="" required/>
                        </div>
                        <input type="submit" class="btnRegister btn btn-primary mb-3" id="registerBtn" name="register" value="Register"/>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    </form>
  </div>
</section>
