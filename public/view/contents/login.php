<?php
require_once '../model/pengguna.php';
 ?>
<section class="ftco-section ftco-no-pb ftco-no-pt mt-4 mb-5"
style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;"
>
  <div class="container">
    <form class="" action="../controller/login.php" method="post">
      <div class="row justify-content-center" style="align:center;">
        <div class="col-md-6 register-left mt-4" style="text-align: center;
    color: #fff;
    margin-top: 4%;">
          <h3>Selamat Datang</h3>
          <p>Miliki Akun Pelanggan Agar Dapat Memesan Produk</p>
          <a class="btn btn-info" href="?page=register">Register</a><br/>
        </div>
        <div class="col-md-6 register-right mt-4">

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">Form Pendaftaran</h3>
                <div class="row register-form">
                    <div class="col-md-9">
                      <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username *" value="" />
                        <!-- <input type="hidden" name="role" value="pelanggan"> -->
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="password1" class="form-control" placeholder="Password *"  value="" data-toggle="popover" title="Validasi Password" data-content="Harus berisikan paling tidak 1 angka, 1 huruf besar dan satu huruf kecil dan panjang karakter tidak boleh kurang dari 8" />
                      </div>
                      <div class="form-group">
                        <small><a style="color:white;" href="?reset=password" value="">
                          Lupa Password ? Kasihan</a></small>
                        </div>
                        <input type="submit" class="btnRegister btn btn-primary mb-3" id="loginBtn" name="login" value="Login"/>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    </form>
  </div>
</section>
