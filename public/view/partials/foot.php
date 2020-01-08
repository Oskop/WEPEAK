  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
          var uri = window.location.toString();
          if (uri.indexOf('indexs.php') > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("?"));
            window.history.replaceState({}, document.title, clean_uri);
          }
          // validasi nama lengkap
          $("#nama").keypress(
            function (e) {
              var charTyped = String.fromCharCode(e.which);
              var letterRegex = /[^0-9]/;

              if (charTyped.match(letterRegex)) {
                return true;
              }
              else {
                return false;
              }
          });
          // validasi email
          $('#email').keyup(function() {
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

            if(!pattern.test($(this).val())) {
              console.log('not valid');
              $('#email_validation_error').removeClass();
              $('#saveButton').prop("disabled", true);
              $('#email_validation_error').addClass('text-danger');
              $('#email_validation_error').text('Email is not valid');
            }else {
              console.log('valid');
              $('#email_validation_error').removeClass();
              $('#saveButton').removeAttr("disabled");
              $('#email_validation_error').addClass('text-success');
              $('#email_validation_error').text('Email is valid');
            }
          });
          // petunjuk password
          $('#password').on('focus', function() {
            console.log('popover harusnya keluar');
            $('#password').popover({
              trigger: 'keypress'
            });
          });
          // petunjuk password
          $('#password').keyup(function() {
            // console.log('popover harusnya keluar');
            $('#password').popover({
              trigger: 'keypress'
            });
          });
          // validasi nomor hp
          $("#no_hp").keypress(
            function (e) {
              var charTyped = String.fromCharCode(e.which);
              var letterRegex = /[^0-9]/;

              if (!charTyped.match(letterRegex)) {
                return true;
              }
              else {
                return false;
              }
          });
          // Tambah produk ke dalam keranjang
          $('.cartadd').click(function() {
            var id = $(this).attr('id').replace(/\D/g, '');
            // alert('data' + id + "terpilih");
            $.get("../controller/pilih.php?id=" + id + "&carting=add", function(data, status){
              var cart = JSON.parse(data); var count;
              alert("" + data + " dimasukkan ke dalam keranjang "
              // + "\nStatus: " + id
            );
              // cart.forEach(function (item, index) {
              //
              // });
              $('.keranjangHargaTotal').text(numberWithCommas(cart.harga));
            });
          });
          // table keranjang perubahan jumlah paket
          $('.jumlah_paket').change(function() {
            var jumlah = $(this).val();
            // var id = $(this).attr('id').replace(/\D/g, '');
            var harga_satuan = $(this).closest('.productRow').children('.price').children('#harga_satuan').text();
            var id = parseInt($(this).closest('.productRow').attr('id').replace(/\D/g, ''));
            var subtotal = harga_satuan * jumlah;
            var tagSubtotal = $(this).closest('.productRow').attr('id');
            $('#'+tagSubtotal).children('.total').text('Rp. ' + subtotal);
            $.get("../controller/pilih.php?id=" + id + "&carting=change&amount=" + jumlah + "&price=" + subtotal, function(data, status){
              var cart = JSON.parse(data);
              alert("" + cart.produk + " Berhasil diubah."
                // + "\nStatus: " + id
              );
              $('.keranjangHargaTotal').text(numberWithCommas(cart.harga));
              $('#subTotalKeranjang').text(numberWithCommas(cart.harga));
              $('#hargaTotalKeranjang').text(
                numberWithCommas(parseInt($('#subTotalKeranjang').text().replace(/\D/g, '')) + parseInt(5000))
              );
            });
          });
          // END dari table keranjang perubahan jumlah paket
          // remove produk dari keranjang
          $('.product-remove').click(function() {
            var id = $(this).parent('.productRow').attr('id')[0];
            $.get('../controller/pilih.php?id=' + id + '&carting=remove', function(data, status) {
              var cart = JSON.parse(data);
              $('.keranjangHargaTotal').text(numberWithCommas(cart.harga));
              $('#subTotalKeranjang').text(numberWithCommas(cart.harga));
              $('#hargaTotalKeranjang').text('Rp. ' + numberWithCommas(parseInt(cart.harga) + parseInt(5000)));
              $('#' + id + 'produkShow').remove();
            });
          });
          // END dari remove produk dari keranjang
          // set harga total keranjang pada halaman keranjang
          $('#hargaTotalKeranjang').text(numberWithCommas(
            parseInt($('#subTotalKeranjang').text().replace(/\D/g, '')) + parseInt(5000))
          );
          // END dari set harga total keranjang pada halaman keranjang

          // POST buat Pesanan
          $('.checkout').click(function() {
            $.post('../controller/pesan.php?id=<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];} ?>', {
              ongkir: 5000,
              total: $('#hargaTotalKeranjang').text().replace(/\D/g, ''),
              status: "Dalam Urutan",
              lunas: 0},
              function(data) {
                var response = JSON.parse(data);
                alert(response.pesan);
                window.location = "?page=history";
              });
          });
          console.log("yolah hide");
          $('.produkRowCard').hide();
          $('.buttonProdukCard').click(function() {
            var ini = $(this).parent('.buttonModal').parent('.transaksiRow').attr('id');
            $('#'+ini).children('.waktuTanggal').hide();
            $('#'+ini).children('.buttonModal').hide();
            $('#'+ini).children('.biayaOngkir').hide();
            $('#'+ini).children('.totalBiaya').hide();
            $('#'+ini).children('.statusPesanan').hide();
            $('#'+ini).children('.lunasTransaksi').hide();
            $('#'+ini).children('.produkRowCard').show();
          });
          $('.hideProdukRowRow').click(function() {
            var ini = $(this).parent('.row').parent('.container').parent('.produkRowCard').parent('.transaksiRow').attr('id');
            $('#'+ini).children('.waktuTanggal').show();
            $('#'+ini).children('.buttonModal').show();
            $('#'+ini).children('.biayaOngkir').show();
            $('#'+ini).children('.totalBiaya').show();
            $('#'+ini).children('.statusPesanan').show();
            $('#'+ini).children('.lunasTransaksi').show();
            $('#'+ini).children('.produkRowCard').hide();
          });
          // END dari POST buat Pesanan

          // Forgot Password Handler
          // Handler Kirim Email
          $('.kirimEmailnya').click(function() {
            var eror = false;
            console.log('klik');
            var emails = $('#emailnya').val();
            if (emails == '') {
              alert('Email Kosong. Bisa diisikan dulu.');
              eror = true
            }
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

            if(!pattern.test(emails)) {
              alert('Email Tidak Valid. Isikan email sesuai dengan aturan penulisan email');
              eror = true;
            }else {
              // console.log('valid');
              $.post('../controller/forpass.php', {
                email: emails,
                },
                function(data) {
                  var response = JSON.parse(data);
                  alert(response.pesan);
                  if (response.pesan != "email tidak terkirim"
                      && response.pesan != "Email tidak ada di dalam database") {
                    // console.log("sukses");
                    $('#pertanyaannya').val(response.pertanyaan);
                    $('#pertanyaannya').prop('disabled', true);
                  }
                  // console.log(response);
                });
            }
            if (eror == true) {return false;}
            console.log(emails);
          });
          // Hadler Kirim jawaban
          $('#kirimJawaban').click(function() {
            var eror = false;
            console.log('klik');
            var emails = $('#emailnya').val();
            // var tanya = $('#pertanyaannya').val();
            var jawab = $('#jawabannya').val();
            if (emails == '') {
              alert('Email Kosong. Bisa diisikan dulu.');
              eror = true
            }
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

            if(!pattern.test(emails)) {
              alert('Email Tidak Valid. Isikan email sesuai dengan aturan penulisan email');
              eror = true;
            }else {
              // console.log('valid');
              $.post('../controller/forpass.php', {
                email: emails, jawaban: jawab
              },
              function(data) {
                var response = JSON.parse(data);
                alert(response.pesan);
                if (response.pesan != "email tidak terkirim"
                    && response.pesan != "Email tidak ada di dalam database"
                    && response.pesan != "Jawaban Salah!") {
                      console.log('Anda Benar');
                      $('#jawabannya').prop('disabled', true);
                      $('#emailnya').prop('disabled', true);
                      $('#kirimEmailnya').prop('disabled', true);
                } else if (response.pesan == "Jawaban Salah!") {
                  console.log("lah salah, buka lagi");
                  $('#jawabannya').prop('disabled', false);
                  eror = true;
                }
                // console.log(response);
              });
            }
            if (eror == true) {return false;}
            console.log(emails);
          });
          // Handler Bagian Kirim Password Baru
          $('#kirimPasswordBaru').click(function() {
            var emails = $('#emailnya').val();
            var tanya = $('#emailnya').val();
            var jawab = $('#jawabannya').val();
            var passw = $('#password').val();
            var passw2 = $('#password2').val();
            var eror = false;
            if (emails == '' || tanya == '' || jawab == '' || passw == '' || passw2 == '') {
              alert('Lengkapi form terlebih dahulu!');
              eror = true;
            }
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

            if(!pattern.test(emails)) {
              alert('Email Tidak Valid. Isikan email sesuai dengan aturan penulisan email');
              return false;
            } else {
              if (passw == passw2) {
                $.post('../controller/forpass.php', {
                  email: emails, jawaban: jawab, password:passw
                }, function(data) {
                  var response = JSON.parse(data);
                  alert(response.pesan);
                  if (response.pesan != "email tidak terkirim"
                      || response.pesan != "Email tidak ada di dalam database"
                      || response.pesan != "Jawaban Salah!"
                      || response.pesan != "") {
                        console.log('Anda Benar');
                        window.location = "?page=login";
                      }
                });
              } else {
                alert('Password tidak terkonfirmasi. Pastikan konfirmasi password sama dengan password baru');
              }

            }

            if (eror == true) {return false;}
          });

      });
      function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
      var check = function() {
        if (document.getElementById('password').value == document.getElementById('password2').value) {
          if($('#registerBtn').length){
          document.getElementById('registerBtn').disabled = false;}
        } else if (document.getElementById('password').value == "" || document.getElementById('password2').value == "" || document.getElementById('nama').value == "" || document.getElementById('email').value == "" || document.getElementById('no_hp').value == "")  {
          if($('#registerBtn').length){
          document.getElementById('registerBtn').disabled = true;}
        } else {
          if($('#registerBtn').length){
          document.getElementById('registerBtn').disabled = true;}
        }
      }
  </script>
