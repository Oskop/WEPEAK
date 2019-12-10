<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href=<?="index.php";?> <?php if (!isset($_GET['menu'])): ?>
                      class="mm-active"
                    <?php endif; ?>>
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Master Data</li>
                <li>
                    <a href="#"
                      <?php if (isset($_GET['menu'])):
                      if ($_GET['menu'] == "jenis_air" OR $_GET['menu'] == "satuan" OR $_GET['menu'] == "paket"): ?>
                        class="mm-active"
                      <?php endif;endif; ?>
                    >
                        <i class="metismenu-icon pe-7s-drop"></i>
                        Air
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="index.php?menu=jenis_air"
                              <?php if (isset($_GET['menu'])):
                              if ($_GET['menu'] == "jenis_air"): ?>
                                class="mm-active"
                              <?php endif;endif; ?>
                            >
                                <i class="metismenu-icon"></i>
                                Jenis Air
                            </a>
                        </li>
                        <li>
                            <a href="index.php?menu=satuan"
                            <?php if (isset($_GET['menu'])):
                            if ($_GET['menu'] == "satuan"): ?>
                              class="mm-active"
                            <?php endif;endif; ?>
                            >
                                <i class="metismenu-icon">
                                </i>Satuan
                            </a>
                        </li>
                        <li>
                            <a href="index.php?menu=paket"
                            <?php if (isset($_GET['menu'])):
                            if ($_GET['menu'] == "paket"): ?>
                              class="mm-active"
                            <?php endif;endif; ?>
                            >
                                <i class="metismenu-icon">
                                </i>Paket
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"
                    <?php if (isset($_GET['menu'])):
                    if ($_GET['menu'] == "wadah" OR $_GET['menu'] == "stok"): ?>
                      class="mm-active"
                    <?php endif;endif; ?>
                    >
                        <i class="metismenu-icon pe-7s-paint-bucket"></i>
                        Wadah
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="index.php?menu=wadah"
                            <?php if (isset($_GET['menu'])):
                            if ($_GET['menu'] == "wadah"): ?>
                              class="mm-active"
                            <?php endif;endif; ?>
                            >
                                <i class="metismenu-icon">
                                </i>Jenis Wadah
                            </a>
                        </li>
                        <li>
                            <a href="components-tabs.html">
                                <i class="metismenu-icon">
                                </i>Stok
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Statistik</li>
                <li>
                    <a href="dashboard-boxes.html">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Penjualan Air
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
