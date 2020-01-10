<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>
  <?php if (isset($_GET['menu'])): ?>
    <?php if ($_GET['menu'] == "jenis_air"): ?>
      Jenis Air
    <?php elseif ($_GET['menu'] == "wadah"): ?>
      Wadah
    <?php elseif ($_GET['menu'] == "satuan"): ?>
      Satuan
    <?php elseif ($_GET['menu'] == "Paket"): ?>
      Paket
    <?php elseif ($_GET['menu'] == "stokwadah"): ?>
      Stok Wadah
    <?php elseif ($_GET['menu'] == "transaksi"): ?>
      Transaksi
    <?php endif; ?>
  <?php else: ?>
    Dasbor Wepeak
  <?php endif; ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="description" content="This is an example dashboard created using build-in elements and components.">
<meta name="msapplication-tap-highlight" content="no">
<!--
=========================================================
* ArchitectUI HTML Theme Dashboard - v1.0.0
=========================================================
* Product Page: https://dashboardpack.com
* Copyright 2019 DashboardPack (https://dashboardpack.com)
* Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<link href="./main.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
