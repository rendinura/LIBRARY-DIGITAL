<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">E-Perpus📚 || </span> Buku
    </h4>
    <div id="ngilang">
        <?= $this->session->flashdata('alert', true); ?>
    </div>

    <div class="card">
        <!-- End Basic Modal-->
        <div class="card-body">
            <h5 class="card-header">
                <a class="btn btn-outline-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    <i class="bx bx-plus"></i>Add Buku
                </a>
            </h5>
            <!-- Basic Modal -->
            <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5 class="card-title col d-flex justify-content-center">Add Buku</h5>
                            <form action="<?= base_url('Buku/add') ?>" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- General Form Elements -->

                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" name="judul" placeholder="Judul" autofocus />
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label">Foto</label>
                                            <div class="col-sm">
                                                <input type="file" class="form-control" name="foto" type="text" accept="image/png, image/jpeg , image/jpg, image/jfif">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="penulis" class="form-label">Penulis</label>
                                            <input type="text" class="form-control" name="penulis" placeholder="Penulis" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="penerbit" class="form-label">Penerbit</label>
                                            <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="Kategori" class="form-label">Kategori</label>
                                            <div class="form-control" style="max-height: 100px; overflow-y: auto;">
                                                <?php foreach ($kategori as $ka) { ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="id_kategori[]" value="<?= $ka['id_kategori'] ?>" id="kategori<?= $ka['id_kategori'] ?>">
                                                        <label class="form-check-label" for="kategori<?= $ka['id_kategori'] ?>">
                                                            <?= $ka['nama_kategori'] ?>
                                                        </label>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="stok" class="form-label">Stok</label>
                                            <input type="number" class="form-control" name="stok" placeholder="Stok" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="tahun terbit" class="form-label">Tahun Terbit</label>
                                            <input type="text" class="form-control" name="tahun terbit" placeholder="Tahun Terbit" />
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
            <h5 class="card-title" style="text-align: center;">TABLE BUKU</h5>
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                <div class="table-responsive text-nowrap">
                    <table class="table" id="datatable" style="margin-left: auto; margin-right: auto; margin-top: 2%; width: 100%; text-align: center;">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th>Penulis</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1;
                            foreach ($buku as $bu) { ?>
                                <tr>
                                    <td> <?= $no++ ?></td>
                                    <td> <?= $bu['judul'] ?></td>
                                    <td>
                                        <a href="<?= base_url('assets/upload/buku/' . $bu['foto']) ?>">
                                            <img style="border-radius: 25%; background-color: aliceblue; height: 50px; width: 50px;" class="img-fluid" src="<?= base_url('assets/upload/buku/' . $bu['foto']) ?>" alt="Card image cap">
                                        </a>
                                    </td>
                                    <td> <?= $bu['penulis'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#basicModalDetail<?= $bu['id_buku'] ?>">
                                            <i class="bx bx-info-circle"></i>
                                        </a>
                                        <div class="col-lg-6" style="text-align: left;">
                                            <!-- Basic Modal -->
                                            <div class="modal fade" id="basicModalDetail<?= $bu['id_buku'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5 class="card-title col d-flex justify-content-center">Detail Buku</h5>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <!-- General Form Elements -->
                                                                    <div class="row mb-2 mt-2">
                                                                        <label class="col-form-label">penerbit</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" class="form-control" type="text" value="<?= $bu['penerbit'] ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2 mt-2">
                                                                        <label class="col-form-label">tahun terbit</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" class="form-control" type="text" value="<?= $bu['tahun_terbit'] ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2 mt-2">
                                                                        <label class="col-form-label">kategori</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" class="form-control" type="text" value="<?= $bu['kategori'] ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2 mt-2">
                                                                        <label class="col-form-label">stok</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" class="form-control" type="text" value="<?= $bu['stok'] ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Basic Modal-->
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#basicModaledit<?= $bu['id_buku'] ?>">
                                            <i class="bx bx-pencil"></i>
                                        </a>

                                        <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-outline-danger" href="<?= base_url('Buku/delete/' . $bu['id_buku']) ?>">
                                            <i class="bx bx-trash"></i>
                                        </a>

                                        <div class="col-lg-6" style="text-align: left;">
                                            <!-- Basic Modal -->
                                            <div class="modal fade" id="basicModaledit<?= $bu['id_buku'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5 class="card-title col d-flex justify-content-center">Update Data Buku</h5>
                                                            <form action="<?= site_url('Buku/update') ?>" method="post" enctype="multipart/form-data">

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <input type="hidden" value="<?= $bu['foto'] ?>" name="nama_foto">
                                                                        <input type="hidden" value="<?= $bu['id_buku'] ?>" name="id_buku">

                                                                        <div class="row mb-2 mt-2">
                                                                            <label class="col-form-label">Judul</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="judul" value="<?= $bu['judul'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Foto</label>
                                                                            <div class="col-sm">
                                                                                <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg, image/jpg, image/jfif, image/gif">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2 mt-2">
                                                                            <label class="col-form-label">Penulis</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="penulis" value="<?= $bu['penulis'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Penerbit</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="penerbit" value="<?= $bu['penerbit'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="Kategori" class="form-label">Kategori</label>
                                                                            <div class="form-control" style="max-height: 100px; overflow-y: auto;">
                                                                                <?php foreach ($kategori as $ka) { ?>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" type="checkbox" name="id_kategori[]" value="<?= $ka['id_kategori'] ?>" id="kategori<?= $ka['id_kategori'] ?>">
                                                                                        <label class="form-check-label" for="kategori<?= $ka['id_kategori'] ?>"><?= $ka['nama_kategori'] ?></label>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Stok</label>
                                                                            <div class="col-sm">
                                                                                <input type="number" class="form-control" name="stok" value="<?= $bu['stok'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Tahun terbit</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="tahun_terbit" value="<?= $bu['tahun_terbit'] ?>" required>
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