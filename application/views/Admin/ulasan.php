<div class="container-xxl container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">E-Perpus📚 || </span> Ulasan
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
                            <form class="modal-content custom-block" action="<?= base_url('Ulasan/laporan') ?>" method="post">
                                <div class="modal-header">
                                    <h5 class="card-title col d-flex justify-content-center">Buat Laporan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">

                                        <div class="col">
                                            <div class="col mb-0">
                                                <label for="judul" class="form-label">Judul Buku</label>
                                                <select class="form-control" name="judul">
                                                    <option value="*" selected>All Book</option>
                                                    <?php foreach ($buku as $us) { ?>
                                                        <option value="<?= $us['judul'] ?>"><?= $us['judul'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="col mb-2">
                                                <label for="rating" class="form-label">Rating</label>
                                                <select class="form-control" name="rating">
                                                    <option value="*" selected>All Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
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

                    <h5 class="card-title" style="text-align: center;">Ulasan</h5>
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="datatable" style="margin-left: auto; margin-right: auto; margin-top: 2%; width: 100%; text-align: center;">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Ulasan</th>
                                        <th>Buku</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $no = 1;
                                    foreach ($ulasan as $ulas) { ?>
                                        <tr>
                                            <td> <?= $no++ ?></td>
                                            <td><?= $ulas['username'] ?></td>
                                            <td><?= $ulas['ulasan'] ?></td>
                                            <td><?= $ulas['judul'] ?></td>
                                            <td><?= round($ulas['rating'], 1) ?> / 5</td>
                                        </tr>
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