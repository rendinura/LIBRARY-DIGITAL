<div class="container-xxl container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">E-Perpus📚 || </span> Riwayat Peminjaman
    </h4>
    <div id="ngilang">
        <?= $this->session->flashdata('alert', true); ?>
    </div>

    <div class="row">
        <!-- Vertical Scrollbar -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-sm custom-btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
                        <i class="bx bx-printer"></i>
                    </button>
                    <!-- Modal Single -->
                    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <form class="modal-content custom-block" action="<?= base_url('Peminjaman/laporan') ?>" method="post">
                                <div class="modal-header">
                                    <h5 class="card-title col d-flex justify-content-center">Buat Laporan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="stok" value="1">

                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="start_date" class="form-label">Tanggal Awal</label>
                                            <input type="date" name="start_date" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="end_date" class="form-label">Tanggal Akhir</label>
                                            <input type="date" name="end_date" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="col mb-2">
                                                <label for="status" class="form-label">Status Peminjaman</label>
                                                <select class="form-control" name="status">
                                                    <option value="*" selected>All Status</option>
                                                    <option value="Ditinjau">Ditinjau</option>
                                                    <option value="Dipinjam">Dipinjam</option>
                                                    <option value="Dikembalikan">Dikembalikan</option>
                                                    <option value="Ditolak">Ditolak</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="col mb-0">
                                                <label for="user" class="form-label">User</label>
                                                <select class="form-control" name="user">
                                                    <option value="*" selected>All User</option>
                                                    <?php foreach ($user as $us) { ?>
                                                        <option value="<?= $us['id_user'] ?>"><?= $us['username'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-primary">Cetak<i class="bx bx-printer"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end modal -->
                    <h5 class="card-title" style="text-align: center;">Peminjaman</h5>
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="datatable" style="margin-left: auto; margin-right: auto; margin-top: 2%; width: 100%; text-align: center;">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status</th>
                                        <!-- <th>Laporan</th> -->
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $no = 1;
                                    foreach ($detail_peminjaman as $pe) { ?>
                                        <?php if ($pe['status'] == 'Dikembalikan') { ?>
                                            <tr>
                                                <td> <?= $no++ ?></td>
                                                <td><?= $pe['username'] ?></td>
                                                <td><?= $pe['tanggal_peminjaman'] ?></td>
                                                <td><?= $pe['tanggal_pengembalian'] ?></td>
                                                <td>

                                                    <?php
                                                    if ($pe['status'] == 'Ditinjau') { ?>
                                                        <a onclick="return confirm('Anda yakin memperbarui status peminjaman..?')" type="submit" class="btn btn-sm btn-success" href="<?= base_url('Peminjaman/updatestatus/' . $pe['id_detail_peminjaman']) ?>"> <?= $pe['status'] ?> </a>
                                                    <?php } elseif ($pe['status'] == 'Dipinjam') { ?>
                                                        <a onclick="return confirm('Anda yakin memperbarui status peminjaman..?')" type="submit" class="btn btn-sm btn-warning" href="<?= base_url('Peminjaman/updatestatusselesai/' . $pe['id_detail_peminjaman']) ?>"> <?= $pe['status'] ?> </a>
                                                    <?php } elseif ($pe['status'] == 'Dikembalikan') { ?>
                                                        <a onclick="return confirm('Anda yakin memperbarui status peminjaman..?')" type="submit" class="btn btn-sm btn-secondary" href="<?= base_url('Peminjaman/updatestatuse/' . $pe['id_detail_peminjaman']) ?>"> <?= $pe['status'] ?> </a>
                                                    <?php } else { ?>
                                                        <a onclick="return confirm('Anda yakin memperbarui status peminjaman..?')" type="submit" class="btn btn-sm btn-danger" href="<?= base_url('Peminjaman/updatestatuse/' . $pe['id_detail_peminjaman']) ?>"> <?= $pe['status'] ?> </a>
                                                    <?php } ?>

                                                    <?php if ($pe['status'] != 'Ditolak') { ?>
                                                        <a onclick="return confirm('Anda yakin memperbarui status peminjaman..?')" type="submit" class="btn btn-sm btn-danger" href="<?= base_url('Peminjaman/tolakstatus/' . $pe['id_detail_peminjaman']) ?>"> Ditolak </a>
                                                    <?php } ?>
                                                </td>
                                                <!-- <td>
                                  <a class="btn btn-sm btn-outline-primary" target="_blank" href="<?= base_url('Beranda/print/' . $pe['id_detail_peminjaman']) ?>"><i class="bx bx-printer"></i></a>
                                </td> -->
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Vertical Scrollbar -->

    </div>
</div>