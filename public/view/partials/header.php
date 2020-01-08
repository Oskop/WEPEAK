<!-- Header Info -->
<div class="py-1 bg-primary">
	<div class="container">
		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
  		<div class="col-lg-12 d-block">
    		<div class="row d-flex">
    			<div class="col-md pr-4 d-flex topper align-items-center">
			    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
				    <span class="text">+62858-1055-5362</span>
			    </div>
			    <div class="col-md pr-4 d-flex topper align-items-center">
			    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
				    <span class="text">oskop17@gmail.com</span>
			    </div>
			    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
				    <span class="text">Untuk Daerah Tegal Kota &amp; Sekitarnya</span>
			    </div>
		    </div>
	    </div>
    </div>
  </div>
</div>
<!-- End of Header Info -->

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.html">WEPEAK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item
				<?php if (!isset($_GET['page'])): ?>
					<?="active";?>
				<?php endif; ?>
				"><a href="." class="nav-link">Beranda</a></li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Belanja</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
          	<a class="dropdown-item" href="<?//='?page=shop';?>">Belanja</a>
            <a class="dropdown-item" href="<?//='?page=cart';?>">Keranjang</a>
          </div>
        </li> -->
        <li class="nav-item
				<?php if ($_GET['page'] == "shop"): ?>
					<?="active";?>
				<?php endif; ?>
				"><a href="<?='?page=shop';?>" class="nav-link">Belanja</a></li>
        <li class="nav-item
				<?php if ($_GET['page'] == "about"): ?>
					<?="active";?>
				<?php endif; ?>
				"><a href="<?='?page=about';?>" class="nav-link">Tentang</a></li>
        <li class="nav-item
				<?php if ($_GET['page'] == "contact"): ?>
					<?="active";?>
				<?php endif; ?>
				"><a href="<?='?page=contact';?>" class="nav-link">Kontak</a></li>
        <li class="nav-item
				<?php if ($_GET['page'] == "cart"): ?>
					<?="active";?>
				<?php endif; ?>
				cta cta-colored"><a href="<?='?page=cart';?>" id="countItem" class="nav-link"><span class="icon-shopping_cart"></span>[Rp. <span class="keranjangHargaTotal"><?php if(isset($_SESSION['total'])){echo
					number_format($_SESSION['total'], 0, ',', '.')
					;} else {echo "0";};?></span>]</a></li>
				<li class="nav-item dropdown">
					<a href="<?php if (isset($_SESSION['status'])) {
						echo '?page=profile&id=' . $_SESSION['id'];
					} else {
						echo "?page=login";
					}?>" class="nav-link">Akun</a>
						<?php if (!isset($_SESSION['status'])): ?>
							<div class="dropdown-menu" aria-labelledby="dropdown05">
								<a class="dropdown-item" href="<?='?page=login';?>">Masuk</a>
								<a class="dropdown-item" href="<?='?page=register';?>">Daftar</a>
							</div>
							<?php else: ?>
								<div class="dropdown-menu" aria-labelledby="dropdown05">
									<a class="dropdown-item" href="<?='?page=profile&id=' . $_SESSION['id'];?>">Profil</a>
									<a class="dropdown-item" href="<?='?page=history';?>">Riwayat</a>
									<a class="dropdown-item" href="<?='?page=logout';?>">Logout</a>
								</div>
						<?php endif; ?>
				</li>

      </ul>
    </div>
  </div>
</nav>
<!-- End of NAVBAR -->
