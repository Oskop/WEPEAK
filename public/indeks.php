<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once './views/head.php'; ?>
  </head>
  <body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <!-- Header Section -->
      <?php require_once './views/header.php'; ?>
      <!-- End of Header Section -->
      <div class="app-main">
        <!-- Sidebar Section -->
        <?php require_once './views/sidebar.php'; ?>
        <!-- End of Sidebar -->
      </div>
      <div class="app-main-outer">
        <div class="app-main__inner">
            <!-- Main Content Here! -->

            <!-- End of Main Content -->
        </div>
        <!-- Footer Section -->
        <?php require_once './views/footer.php'; ?>
        <!-- End of Footer Section -->
      </div>
        <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
      </div>
    <script src="assets/scripts/main.js" type="text/javascript"></script>
  </body>
</html>
