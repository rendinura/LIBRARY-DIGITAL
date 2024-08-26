<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">E-Perpus📚 || </span> Category
    </h4>
    <div id="ngilang">
        <?= $this->session->flashdata('alert', true); ?>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-header">
                <a class="btn btn-outline-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    <i class="bx bx-plus"></i>Add Category
                </a>
            </h5>
            <!-- Basic Modal -->
            <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5 class="card-title col d-flex justify-content-center">Add Category</h5>
                            <form action="<?= base_url('Category/add') ?>" method="post">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="mb-3">
                                            <label for="nama_kategori" class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama_kategori" placeholder="Enter your nama kategori" autofocus />
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Basic Modal-->
            <h5 class="card-title" style="text-align: center;">TABLE CATEGORY</h5>
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                <div class="table-responsive text-nowrap">
                    <table class="table" id="datatable" style="margin-left: auto; margin-right: auto; margin-top: 2%; width: 100%;">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1;
                            foreach ($kategori as $us) { ?>
                                <tr>
                                    <td> <?= $no++ ?></td>
                                    <td> <?= $us['nama_kategori'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#basicModaledit<?= $us['id_kategori'] ?>">
                                            <i class="bx bx-pencil"></i>
                                        </a>

                                        <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-outline-danger" href="<?= base_url('Category/delete/' . $us['id_kategori']) ?>">
                                            <i class="bx bx-trash"></i>
                                        </a>

                                        <div class="col-lg-6" style="text-align: left;">
                                            <!-- Basic Modal -->
                                            <div class="modal fade" id="basicModaledit<?= $us['id_kategori'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5 class="card-title col d-flex justify-content-center">Update Data Kategori</h5>
                                                            <form action="<?= site_url('Category/update') ?>" method="post">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <!-- General Form Elements -->
                                                                        <input type="hidden" class="form-control" value="<?= $us['id_kategori'] ?>" name="id_kategori">

                                                                        <div class="row mb-2 mt-2">
                                                                            <label class="col-form-label">Nama</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="nama_kategori" type="text" value="<?= $us['nama_kategori'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Basic Modal-->
                                        </div>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table with stripped rows -->

        </div>
    </div>
</div>