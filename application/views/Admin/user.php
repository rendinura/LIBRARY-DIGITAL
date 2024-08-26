<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">E-Perpus📚 || </span> User
    </h4>
    <div id="ngilang">
        <?= $this->session->flashdata('alert', true); ?>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-header">
                <a class="btn btn-outline-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    <i class="bx bx-user-plus"></i>Add User
                </a>
            </h5>
            <!-- Basic Modal -->
            <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5 class="card-title col d-flex justify-content-center">Add User</h5>
                            <form action="<?= base_url('User/add') ?>" method="post">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- General Form Elements -->

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username" placeholder="Enter your username" autofocus />
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_lengkap" class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Enter your fullname" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">alamat</label>
                                            <input type="text" class="form-control" name="alamat" placeholder="Enter your address" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="Enter your email" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="Telepon" class="form-label">Telepon</label>
                                            <input type="text" class="form-control" name="telepon" placeholder="Enter your Telepon" />
                                        </div>
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label class="col-form-label">Level</label>
                                            <div class="col-sm">
                                                <div class="form-check">
                                                    <input type="radio" name="level" class="form-check-input" value="Admin">
                                                    <label class="form-check-label">Admin</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="level" class="form-check-input" value="petugas">
                                                    <label class="form-check-label">petugas</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="level" class="form-check-input" value="peminjam">
                                                    <label class="form-check-label">peminjam</label>
                                                </div>
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
            <h5 class="card-title" style="text-align: center;">TABLE USER</h5>
            <!-- End Basic Modal-->
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                <div class="table-responsive text-nowrap">
                    <table class="table" id="datatable" style="margin-left: auto; margin-right: auto; margin-top: 2%; width: 100%; text-align: center;">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1;
                            foreach ($user as $us) { ?>
                                <tr>
                                    <td> <?= $no++ ?></td>
                                    <td> <?= $us['nama_lengkap'] ?></td>
                                    <td> <?= $us['username'] ?></td>
                                    <td> <?= $us['email'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#basicModalDetail<?= $us['id_user'] ?>">
                                            <i class="bx bx-info-circle"></i>
                                        </a>
                                        <div class="col-lg-6" style="text-align: left;">
                                            <!-- Basic Modal -->
                                            <div class="modal fade" id="basicModalDetail<?= $us['id_user'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5 class="card-title col d-flex justify-content-center">Detail User</h5>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <!-- General Form Elements -->
                                                                    <input type="hidden" class="form-control" value="<?= $us['id_user'] ?>" name="id_user">

                                                                    <div class="row mb-2 mt-2">
                                                                        <label class="col-form-label">Alamat</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" class="form-control" type="text" value="<?= $us['alamat'] ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2 mt-2">
                                                                        <label class="col-form-label">Nomor Telepon</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" class="form-control" type="text" value="<?= $us['telepon'] ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2 mt-2">
                                                                        <label class="col-form-label">Level</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" class="form-control" type="text" value="<?= $us['level'] ?>" readonly>
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
                                        <a class="btn btn-sm btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#basicModaledit<?= $us['id_user'] ?>">
                                            <i class="bx bx-pencil"></i>
                                        </a>

                                        <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-outline-danger" href="<?= base_url('User/delete/' . $us['id_user']) ?>">
                                            <i class="bx bx-trash"></i>
                                        </a>

                                        <div class="col-lg-6" style="text-align: left;">
                                            <!-- Basic Modal -->
                                            <div class="modal fade" id="basicModaledit<?= $us['id_user'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5 class="card-title col d-flex justify-content-center">Update Data User</h5>
                                                            <form action="<?= site_url('User/update') ?>" method="post">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <!-- General Form Elements -->
                                                                        <input type="hidden" class="form-control" value="<?= $us['id_user'] ?>" name="id_user">

                                                                        <div class="row mb-2 mt-2">
                                                                            <label class="col-form-label">Nama</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="nama" type="text" value="<?= $us['nama_lengkap'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Username</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="username" value="<?= $us['username'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Nama Lengkap</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="nama_lengkap" value="<?= $us['nama_lengkap'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Email</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="email" value="<?= $us['email'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Alamat</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="alamat" value="<?= $us['alamat'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Nomor Telepon</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="telepon" value="<?= $us['telepon'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <label class="col-form-label">Level</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" name="level" value="<?= $us['level'] ?>" readonly>
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