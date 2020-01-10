<?php
require_once '../model/pengguna.php';
if (isset($_GET['id'])) {
  $pengguna = new Pengguna();
  $pengguna->id = $_GET['id'];
  $profil = $pengguna->get_pengguna_once()[0];
  // var_dump($profil);die;
}
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
          <img style="
            display: inline-block;
            width: 150px;
            height: 150px;
            border-radius: 50%;

            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
          "
          src="images/<?=$profil['foto'];?>" alt="">
          <h3><?=$profil['nama'];?></h3>
          <p style="margin-top: -14px;"><?=$profil['gender'];?></p>
          <a class="btn btn-info mb-5" style="margin-top:-15px;" href="?page=login"/>Ubah Profil</a><br/>
        </div>
        <div class="col-md-9 register-right mt-4">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">Profil Anda</h3>
                <div class="row register-form">

                    <!-- Tahap Tanya Jawab -->
                    <div class="col-md-6" id="formEmailResetPassword">
                      <div class="form-group">
                        <input type="text" class="form-control" id="usernamenya" disabled
                        name="email" placeholder="Email *" required value="Username: <?=$profil['username'];?>"/>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="nomornya" disabled
                        name="email" placeholder="Email *" required value="No.HP: <?=$profil['no_hp'];?>"/>
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="emailnya" disabled
                        name="email" placeholder="Email *" required value="Email: <?=$profil['email'];?>"/>
                      </div>
                    </div>

                    <!-- Tahap Reset Password -->
                    <div class="col-md-6" id="formResetPasswordBaru">
                      <div class="form-group">
                        <textarea name="name" rows="5" cols="20" disabled class="p-3">Alamat: <?=$profil['alamat'];?></textarea>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- </form> -->
  </div>
</section>
