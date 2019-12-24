<!doctype html>
<html lang="en">
<?php
session_start();
$base_url = $_SERVER['DOCUMENT_ROOT'] . '/wepeak/';
// var_dump($base_url);die();
$base_url_admin = 'localhost/wepeak/view/';

 ?>
<head>
  <?php require_once 'partials/head.php'; ?>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <!-- Header Section -->
      <?php require_once 'partials/header.php'; ?>
      <!-- End of Header Section -->
            <div class="app-main">
              <!-- Sidebar Section -->
              <?php require_once 'partials/sidebar.php'; ?>
              <!-- End of Sidebar Section -->
                <div class="app-main__outer">
                  <div class="app-main__inner">
                    <!-- Content Section -->
                    <?php if (isset($_GET['menu'])): ?>
                      <?php if ($_GET['menu'] == "jenis_air"): ?>

                        <?php if (isset($_GET['action'])): ?>
                          <?php if ($_GET['action'] == "insert"): ?>
                            <?php require_once 'contents/form_jenis_air.php'; ?>
                          <?php elseif ($_GET['action'] == "update"): ?>
                            <?php require_once 'contents/form_jenis_air.php'; ?>
                          <?php elseif ($_GET['action'] == "delete"): ?>
                            <?php require_once '../model/delete.php'; ?>
                          <?php endif; ?>
                          <?php else: ?>
                            <?php require_once 'contents/jenis_air.php'; ?>
                        <?php endif; ?>

                      <?php elseif ($_GET['menu'] == "wadah"): ?>

                        <?php if (isset($_GET['action'])): ?>
                          <?php if ($_GET['action'] == "insert" OR $_GET['action'] == "update"): ?>
                            <?php require_once 'contents/form_wadah.php'; ?>
                          <?php elseif ($_GET['action'] == "delete"): ?>
                            <?php require_once '../model/delete.php'; ?>
                          <?php endif; ?>
                          <?php else: ?>
                          <?php require_once 'contents/wadah.php'; ?>
                        <?php endif; ?>

                      <?php elseif ($_GET['menu'] == "satuan"): ?>

                        <?php if (isset($_GET['action'])): ?>
                          <?php if ($_GET['action'] == "insert" OR $_GET['action'] == "update"): ?>
                            <?php require_once 'contents/form_satuan.php'; ?>
                          <?php elseif ($_GET['action'] == "delete"): ?>
                            <?php require_once '../model/delete.php'; ?>
                          <?php endif; ?>
                          <?php else: ?>
                          <?php require_once 'contents/satuan.php'; ?>
                        <?php endif; ?>

                      <?php elseif ($_GET['menu'] == "paket"): ?>

                        <?php if (isset($_GET['action'])): ?>
                          <?php if ($_GET['action'] == "insert" OR $_GET['action'] == "update"): ?>
                            <?php require_once 'contents/form_paket.php'; ?>
                          <?php elseif ($_GET['action'] == "delete"): ?>
                            <?php require_once '../model/delete.php'; ?>
                          <?php endif; ?>
                          <?php else: ?>
                          <?php require_once 'contents/paket.php'; ?>
                        <?php endif; ?>

                      <?php endif; ?>



                      <?php else: ?>
                        <?php require_once 'partials/content.php'; ?>
                    <?php endif; ?>
                    <!-- End of Content Section -->
                  </div>
                    <!-- Footer Section -->
                    <?php require_once 'partials/footer.php'; ?>
                    <!-- End of Footer Section -->
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.datatable').DataTable();
  } );
</script>

<?php if (!isset($_GET['action'])): ?>
  <?php if (isset($_SESSION['flash'])): ?>
    <div id="toast-container" class="toast-top-center">
      <div class="toast toast-info" aria-live="polite" style="opacity:100%;">
        <div class="toast-progress" style="width: 100%;"></div>
        <div class="toast-title"><?=$_SESSION['flash'];?></div>
        <div class="toast-message"><?=$_SESSION['flash_message'];?></div>
      </div>
    </div>

    <?php if (isset($_SESSION['timer'])) {
      $now = time();
      if ($now - $_SESSION['timer'] == 360) {
        $_SESSION['timer'] = null;$now=null;
        // $_SESSION['flash'] = null;$_SESSION['flash_message'] = null;
      }
    }
    if (isset($_SESSION['timer'])) {
      $_SESSION['flash'] = null;$_SESSION['flash_message'] = null;
    }
  endif; ?>
<?php endif; ?>

<script type="text/javascript">
  $(document).ready(function() {
    if ($('#toast-container').length) {
      setTimeout(function() {
        $('#toast-container').remove();
      }, 3000);
    }
  });
</script>
</body>
</html>
