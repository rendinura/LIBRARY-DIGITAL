<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="row">
        <div class="col-lg-12 col-12 text-center">
            <h2 class="mb-0"> Peminjaman : <?= $user->username ?></h2>
        </div>
    </div>
</header>

<section class="about-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <button type="button btn-sm" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
                    Riwayat
                </button>
                <!-- large modal -->
                <div class="modal fade" id="exLargeModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel4">Riwayat Peminjaman</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table" style="margin-left: auto; margin-right: auto; margin-top: 2%; width: 100%; text-align: center;">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Tanggal Pengembalian</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php $n = 1;
                                            if (count($peminjaman) > 0 && $detailpeminjaman['status'] == 'Dikembalikan') { ?>
                                                <?php foreach ($peminjaman as $pe) { ?>

                                                    <tr>
                                                        <td> <?= $n++ ?></td>
                                                        <td><?= $pe['username'] ?></td>
                                                        <td><?= $pe['tanggal_peminjaman'] ?></td>
                                                        <td><?= $pe['tanggal_pengembalian'] ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-outline-secondary" href="<?= base_url('Beranda/detail_pinjaman/' . $pe['id_peminjaman']) ?>">Detail</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            <?php } else { ?>
                                                <tr>
                                                    <td colspan="5">BELUM ADA RIWAYAT</td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
                <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                    <div class="table-responsive text-nowrap">
                        <table class="table" id="datatable" style="margin-left: auto; margin-right: auto; margin-top: 2%; width: 100%; text-align: center;">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1;
                                if (count($peminjaman) > 0) { ?>

                                    <?php foreach ($peminjaman as $pe) { ?>

                                        <?php if ($pe['id_user'] > 0 && $detailpeminjaman['status'] != 'Dikembalikan') { ?>

                                            <tr>
                                                <td> <?= $no++ ?></td>
                                                <td><?= $pe['username'] ?></td>
                                                <td><?= $pe['tanggal_peminjaman'] ?></td>
                                                <td><?= $pe['tanggal_pengembalian'] ?></td>


                                                <td>
                                                    <a class="btn btn-sm btn-outline-secondary" href="<?= base_url('Beranda/detail_pinjaman/' . $pe['id_peminjaman']) ?>">Detail</a>

                                                    <?php
                                                    $hariini = date('Y-m-d');
                                                    $tanggal_pengembalian = $pe['tanggal_pengembalian'];

                                                    if ($hariini > $tanggal_pengembalian) {
                                                        $datetime1 = new DateTime($tanggal_pengembalian);
                                                        $datetime2 = new DateTime($hariini);
                                                        $interval = $datetime1->diff($datetime2);
                                                        $days_late = $interval->days;
                                                        $denda = $days_late * 1000;
                                                    ?>
                                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#backDropModal<?= $pe['id_peminjaman'] ?>">
                                                            Terlambat
                                                        </button>
                                                    <?php } ?>

                                                    <div class="modal fade" id="backDropModal<?= $pe['id_peminjaman'] ?>" data-bs-backdrop="static" tabindex="1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <form class="modal-content custom-block" action="<?= base_url('Beranda/') ?>" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="card-title col d-flex justify-content-center">Denda</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id_peminjaman" value="<?= $pe['id_peminjaman'] ?>" class="form-control" required>

                                                                    <div class="row">
                                                                        <strong>
                                                                            <p>( Terlambat <?= $days_late ?> Hari ) Denda: Rp <?= number_format($denda, 0, ',', '.') ?></p>
                                                                        </strong>
                                                                    </div>

                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>


                                            </tr>

                                        <?php } ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5">BELUM ADA PEMINJAMAN</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"><a class="btn btn-warning" href="<?= base_url('Beranda') ?>">PINJAM BUKU</a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
</section>
</main>

<script src="<?= base_url('assets/sneat') ?>/assets/js/dashboards-analytics.js"></script>
<script src="<?= base_url('assets/sneat/') ?>assets/js/extended-ui-perfect-scrollbar.js"></script>

<!-- <div class="col-12">
    <div class="card mb-4">
        <h5 class="card-header">Basic</h5>
        <div class="card-body">
            <p class="demo-inline-spacing">
                <a class="btn btn-primary me-1 collapsed" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="d-grid d-sm-flex p-3 border">
                    <img src="../assets/img/elements/1.jpg" height="125" class="me-4 mb-sm-0 mb-2">
                    <span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div> -->