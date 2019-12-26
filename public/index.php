<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php session_start();
$base_url = $_SERVER['DOCUMENT_ROOT'] . '/wepeak/';
$base_url_admin = 'localhost/wepeak/view/';
$base_url_user = 'localhost/wepeak/public/';
 ?>
  <?php require_once 'view/partials/head.php'; ?>
  <body class="goto-here" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">
    <?php require_once 'view/partials/header.php'; ?>

    <?php if (isset($_GET['page'])): ?>
      <?php if ($_GET['page'] == "shop"): ?>
        <?php require_once 'view/contents/toko.php'; ?>
      <?php elseif ($_GET['page'] == "about"): ?>
        <?php require_once 'view/contents/tentang.php'; ?>
      <?php elseif ($_GET['page'] == "contact"): ?>
        <?php require_once 'view/contents/kontak.php'; ?>
      <?php elseif ($_GET['page'] == "cart"): ?>
        <?php if (!isset($_SESSION['status'])): ?>
            <?="<script>window.location = '?page=login';</script>";?>
          <?php else: ?>
            <?php require_once 'view/contents/keranjang.php'; ?>
        <?php endif; ?>
      <?php elseif ($_GET['page'] == "checkout"): ?>
        <?php if (!isset($_SESSION['status'])): ?>
            <?="<script>window.location = '?page=login';</script>";?>
          <?php else: ?>
            <?php require_once 'view/contents/checkout.php'; ?>
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
    <?php else: ?>
      <?php require_once 'view/contents/home.php'; ?>
    <?php endif; ?>

    <?php require_once 'view/partials/footer.php'; ?>
    <?php require_once 'view/partials/foot.php'; ?>
  </body>
</html>
