<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" da<?= base_url('assets/sneat/') ?>assets-path="<?= base_url('assets/sneat/') ?>assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $judul ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/sneat/') ?>assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('assets/sneat/') ?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat/') ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/') ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/') ?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/') ?>assets/vendor/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url('assets/sneat/') ?>assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/sneat/') ?>assets/js/config.js"></script>
</head>

<body>

    <div class="col-xl-12 col-md-8 col-12 mt-5">

        <div class="table-responsive">
            <table border="1" class="table border-top">
                <thead>
                    <tr>
                        <td colspan="6" class="text-center">
                            <h3><strong>LAPORAN PEMINJAMN BUKU</strong></h3>
                            <h6><strong><?= $laporan; ?></strong></h6>
                        </td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Tanggal Peminjaman</td>
                        <td>Tanggal Pengembalian</td>
                        <td>Buku</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($peminjaman as $lap) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $lap['username'] ?></td>
                            <td><?= $lap['tanggal_peminjaman'] ?></td>
                            <td><?= $lap['tanggal_pengembalian'] ?></td>
                            <td><?= $lap['judul'] ?></td>
                            <td><?= $lap['status'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <!-- <p style="text-align:center;">Barang yang sudah dibeli tidak dapat di kembalikan kecuali ada perjanjian</p> -->
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:<?= base_url('assets/sneat/') ?>assets/vendor/js/core.js -->

    <script src="<?= base_url('assets/sneat/') ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/sneat/') ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets/sneat/') ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets/sneat/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('assets/sneat/') ?>assets/vendor/js/menu.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>


    <!-- Vendors JS -->
    <script src="<?= base_url('assets/sneat/') ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/sneat/') ?>assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/sneat/') ?>assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>