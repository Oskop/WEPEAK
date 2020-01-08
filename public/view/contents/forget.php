<?php
require_once '../model/pengguna.php';
 ?>
<section class="ftco-section ftco-no-pb ftco-no-pt mt-4 mb-5"
style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;"
>
  <div class="container">
    <!-- <form class="" action="#" method="post"> -->
      <div class="row">
        <div class="col-md-3 register-left mt-4" style="text-align: center;
    color: #fff;
    margin-top: 4%;">
          <h3>Lupa Password?</h3>
          <p>Tenang, Anda bisa reset password dengan menjawab pertanyaan yang pernah anda buat saat registrasi</p>
          <a class="btn btn-info" href="?page=login"/>Login</a><br/>
        </div>
        <div class="col-md-9 register-right mt-4">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">Form Reset Password</h3>
                <div class="row register-form">

                    <!-- Tahap Tanya Jawab -->
                    <div class="col-md-6" id="formEmailResetPassword">
                      <div class="form-group" id="formEmailnya">
                        <input type="email" class="form-control" id="emailnya" name="email" placeholder="Email *" required/>
                      </div>
                      <button class="btnRegister btn btn-primary mb-3 kirimEmailnya" id="kirimEmailnya">Kirim Email</button>
                      <div class="form-group" id="formPertanyaanya">
                        <input type="text" class="form-control" id="pertanyaannya" name="pertanyaan" placeholder="Pertanyaan untuk reset Password *" value="" required/>
                      </div>
                      <div class="form-group" id="formJawabannya">
                        <input type="text" class="form-control" id="jawabannya" name="jawaban" placeholder="Jawaban yang paling diingat *" value="" required/>
                      </div>
                      <input type="submit" class="btnRegister btn btn-primary mb-3" id="kirimJawaban" name="register" value="Kirim Jawaban"/>
                    </div>

                    <!-- Tahap Reset Password -->
                    <div class="col-md-6" id="formResetPasswordBaru">
                        <div class="form-group" id="formPasswordBaru">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password *"  value=""
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" onkeyup="check();" data-toggle="popover" title="Validasi Password" data-content="Harus berisikan paling tidak 1 angka, 1 huruf besar dan satu huruf kecil dan panjang karakter tidak boleh kurang dari 8" required/>
                            <small id="passwordMessage"></small>
                        </div>
                        <div class="form-group" id="formKonfirmasiPasswordBaru">
                          <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password *" value="" onkeyup="check();" required/>
                          <small id="confirmMessage"></small>
                        </div>
                        <input type="submit" class="btnRegister btn btn-primary mb-3" id="kirimPasswordBaru" name="register" value="Kirim Password"/>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- </form> -->
  </div>
</section>
