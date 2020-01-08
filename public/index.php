<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php session_start();
$base_url = $_SERVER['DOCUMENT_ROOT'] . '/wepeak/';
$base_url_admin = 'localhost/wepeak/view/';
$base_url_user = 'localhost/wepeak/public/';
// var_dump($_SESSION);die;
 ?>
  <?php require_once 'view/partials/head.php'; ?>
  <body class="goto-here" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">
    <?php require_once 'view/partials/header.php'; ?>

    <?php if (isset($_GET['page'])): ?>
      <!-- Halaman Belanja -->
      <?php if ($_GET['page'] == "shop"): ?>
        <?php require_once 'view/contents/toko.php'; ?>

      <!-- Halaman Tentang WEPEAK -->
      <?php elseif ($_GET['page'] == "about"): ?>
        <?php require_once 'view/contents/tentang.php'; ?>

      <!-- Halaman Kontak -->
      <?php elseif ($_GET['page'] == "contact"): ?>
        <?php require_once 'view/contents/kontak.php'; ?>

      <!-- Halaman Keranjang -->
      <?php elseif ($_GET['page'] == "cart"): ?>
        <?php if (!isset($_SESSION['status'])): ?>
            <?="<script>alert('Anda Harus Login terlebih dahulu');</script>";?>
            <?="<script>window.location = '?page=login';</script>";?>
          <?php else: ?>
            <?php require_once 'view/contents/keranjang.php'; ?>
        <?php endif; ?>

      <!-- Halaman History -->
      <?php elseif ($_GET['page'] == "history"): ?>
          <?php if (!isset($_SESSION['status'])): ?>
              <?="<script>window.location = '?page=login';</script>";?>
            <?php else: ?>
              <?php require_once 'view/contents/histori.php'; ?>
          <?php endif; ?>

      <?php elseif ($_GET['page'] == "login"): ?>
        <?php if (isset($_SESSION['status'])): ?>
          <?php echo "<script>var time = setTimeout(function()
                {window.location = '.'}, 0);</script>"; ?>
          <?php else: ?>
            <?php require_once 'view/contents/login.php'; ?>
        <?php endif; ?>

      <?php elseif ($_GET['page'] == "register"): ?>
          <?php require_once 'view/contents/register.php'; ?>
      <?php endif; ?>


    <?php elseif(isset($_GET['reset'])): ?>
      <?php require_once 'view/contents/forget.php'; ?>
    <?php else: ?>
      <?php require_once 'view/contents/home.php'; ?>
    <?php endif; ?>

    <?php require_once 'view/partials/footer.php'; ?>
    <?php require_once 'view/partials/foot.php'; ?>
  </body>
</html>
