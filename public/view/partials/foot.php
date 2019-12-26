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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/login_register.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
          var uri = window.location.toString();
          if (uri.indexOf('indexs.php') > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("?"));
            window.history.replaceState({}, document.title, clean_uri);
          }
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
          $('#password').on('focus', function() {
            console.log('popover harusnya keluar');
            $('#password').popover({
              trigger: 'keypress'
            });
          });
          $('#password').keyup(function() {
            console.log('popover harusnya keluar');
            $('#password').popover({
              trigger: 'keypress'
            });
          });
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
      });
      var check = function() {
        if (document.getElementById('password').value == document.getElementById('password2').value) {
          document.getElementById('registerBtn').disabled = false;
        } else if (document.getElementById('password').value == "" || document.getElementById('password2').value == "" || document.getElementById('nama').value == "" || document.getElementById('email').value == "" || document.getElementById('no_hp').value == "")  {
          document.getElementById('registerBtn').disabled = true;
        } else {
          document.getElementById('registerBtn').disabled = true;
        }
      }
  </script>
