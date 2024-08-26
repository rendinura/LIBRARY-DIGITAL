<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" da<?= base_url('assets/sneat') ?>/assets-path="<?= base_url('assets/sneat') ?>/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $judul ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/sneat') ?>/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/vendor/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url('assets/sneat') ?>/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/sneat') ?>/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="<?= base_url('Beranda') ?>" class="app-brand-link">
                        <h3 class="fw-bold">E-Perpus📚</h3>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <?php $menu = $this->uri->segment(1); ?>
                    <?php $menu2 = $this->uri->segment(2); ?>
                    <!-- Apps -->
                    <li class="menu-item <?php if ($menu == 'Admin') {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">
                        <a href="<?= base_url('Admin') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>

                    <li class="ms-4 menu-header small text-uppercase">
                        <span class="menu-header-text"></span>
                    </li>

                    <li class="menu-item  <?php if ($menu == 'Buku') {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">
                        <a href="<?= base_url('Buku') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-book-bookmark"></i>
                            <div data-i18n="Buku">Buku</div>
                        </a>
                    </li>

                    <li class="menu-item <?php if ($menu == 'Category') {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">
                        <a href="<?= base_url('Category') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-category"></i>
                            <div data-i18n="Category">Category</div>
                        </a>
                    </li>


                    <li class="ms-4 menu-header small text-uppercase">
                        <span class="menu-header-text"></span>
                    </li>
                    <li class="menu-item  <?php if ($menu == 'User') {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">
                        <a href="<?= base_url('User') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="User">User</div>
                        </a>
                    </li>

                    <li class="menu-item <?php if ($menu == 'Peminjaman') {
                                                echo "open";
                                            } else {
                                                echo "";
                                            } ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-list-ul"></i>
                            <div data-i18n="Peminjaman">Peminjaman</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item  <?php if ($menu == 'Peminjaman') {
                                                        echo "active";
                                                    } else {
                                                        echo "";
                                                    } ?>">
                                <a href="<?= base_url('Peminjaman') ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bxs-report"></i>

                                    <div data-i18n="Peminjaman">Peminjaman</div>
                                </a>
                            </li>

                            <li class="menu-item  <?php if ($menu2 == 'RiwayatPeminjaman') {
                                                        echo "active";
                                                    } else {
                                                        echo "";
                                                    } ?>">
                                <a href="<?= base_url('Peminjaman/RiwayatPeminjaman') ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-revision"></i>

                                    <div data-i18n="RiwayatPeminjaman">Riwayat Peminjaman</div>
                                </a>
                            </li>

                            <!-- <li class="menu-item  <?php if ($menu2 == 'PengembalianTerlambat') {
                                                            echo "active";
                                                        } else {
                                                            echo "";
                                                        } ?>">
                                <a href="<?= base_url('Peminjaman/PengembalianTerlambat') ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-revision"></i>

                                    <div data-i18n="PengembalianTerlambat">Pengembalian Terlambat</div>
                                </a>
                            </li>
                             -->
                        </ul>
                    </li>

                    <li class="menu-item  <?php if ($menu == 'Ulasan') {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">
                        <a href="<?= base_url('Ulasan') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Ulasan">Ulasan</div>
                        </a>
                    </li>


                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <marquee>Selamat datang <strong><?= $this->session->userdata('username') ?></strong> di aplikasi E-perpus📚</marquee>

                        <ul class="navbar-nav flex-row align-items-center ms-auto" style="z-index: 1;">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= base_url('assets/sneat') ?>/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= base_url('assets/sneat') ?>/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block"><?= $this->session->userdata('username') ?></span>
                                                    <small class="text-muted"><?= $this->session->userdata('level') ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a onClick="return confirm('Apakah anda yakin ingin logout..👋')" class="dropdown-item" href="<?= base_url('Auth/logout') ?>">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- content -->
                    <main id="main" class="main">
                        <?= $contents; ?>
                    </main>
                    <!-- /content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="" target="_blank" class="footer-link fw-medium">Rndi</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:<?= base_url('assets/sneat') ?>/assets/vendor/js/core.js -->

    <script src="<?= base_url('assets/sneat') ?>/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/sneat') ?>/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets/sneat') ?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets/sneat') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('assets/sneat') ?>/assets/vendor/js/menu.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- Pastikan jQuery sudah dimasukkan -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

    <script>
        $('#ngilang').delay('slow').slideDown('slow').delay(1500).slideUp(600);
    </script>

    <script>
        new DataTable('#datatable', {
            order: [
                [3, 'desc']
            ]
        });
    </script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('assets/sneat') ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/sneat') ?>/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/sneat') ?>/assets/js/dashboards-analytics.js"></script>
    <script src="<?= base_url('assets/sneat/') ?>assets/js/extended-ui-perfect-scrollbar.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>