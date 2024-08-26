<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0"> Koleksi pribadi : <?= $user->username ?></h2>
            </div>
        </div>
    </div>
</header>


<section class="about-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-12 mx-auto">
                <div class="pb-5 mb-5">
                    <div class="section-title-wrap mb-4">
                        <h4 class="section-title"> <?= $user->username ?></h4>
                    </div>
                    <div class="row">

                        <!-- Koleksi Buku -->

                        <?php if ($koleksi > 0) { ?>
                            <?php foreach ($koleksi as $bu) { ?>
                                <div class="col-lg-6 col-12 mb-4">
                                    <div class="custom-block d-flex h-100">

                                        <div class="row">
                                            <div>
                                                <img class="img-fluid" style="border-radius: 8%;" src="<?= base_url('assets/upload/buku/' . $bu['foto']) ?>" alt="">
                                            </div>

                                            <div class="mt-2">
                                                <?php if ($bu['stok'] > 0) { ?>
                                                    <?php if ($this->session->userdata('id_user') == NULL) { ?>
                                                        <button type="button" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#backDropModalLogin">
                                                            Pinjam
                                                        </button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#backDropModal<?= $bu['id_buku'] ?>">
                                                            Pinjam
                                                        </button>
                                                    <?php } ?>
                                                    <a href="<?= base_url('Beranda/detail/' . $bu['id_buku']) ?>" class="btn custom-btn">
                                                        About
                                                    </a>
                                                <?php } else { ?>
                                                    <button class="btn custom-btn btn btn-secondary">
                                                        Pinjam
                                                    </button>
                                                    <a href="<?= base_url('Beranda/detail/' . $bu['id_buku']) ?>" class="btn custom-btn">
                                                        About
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="custom-block-info">

                                            <h5 class="mb-2">
                                                <a href="<?= base_url('Beranda/detail/' . $bu['id_buku']) ?>">
                                                    <?= $bu['judul'] ?>
                                                </a>
                                            </h5>

                                            <div class="profile-block d-flex">
                                                <p> <?= $bu['penulis'] ?>
                                                    <strong><?= $bu['penerbit'] ?>/<?= $bu['tahun_terbit'] ?></strong>
                                                </p>
                                            </div>

                                            <p class="mb-0">
                                                <?= $bu['kategori'] ?>
                                            </p>

                                            <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                                <p class=" me-1">
                                                    <?php if ($bu['stok'] > 0) { ?>
                                                        <span>TERSEDIA || <?= $bu['stok'] ?></span>
                                                    <?php } else { ?>
                                                <p style="color: red; margin-top: 5px;">MAAF STOK HABIS</p>
                                            <?php } ?>
                                            </p>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="backDropModal<?= $bu['id_buku'] ?>" data-bs-backdrop="static" tabindex="1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <form class="modal-content custom-block" action="<?= base_url('Beranda/pinjam/' . $bu['id_buku']) ?>" method="post">
                                            <div class="modal-header">
                                                <h5 class="card-title col d-flex justify-content-center">Form Peminjaman Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="stok" value="1">

                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                                                        <input type="date" name="tanggal_peminjaman" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                                        <input type="date" name="tanggal_pengembalian" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button onclick="return confirm('Anda menyetujui peraturan ini')" type="submit" class="btn btn-outline-primary">Pinjam</button>
                                                <!-- <a href="<?= base_url('Beranda/addcart/' . $bu['id_buku']) ?>" class="btn btn-outline-warning">Tambah Keranjang</a> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end modal -->

                            <?php } ?>
                        <?php } else { ?>
                            <td>Belum ada koleksi</td>
                        <?php } ?>

                        <!-- End Koleksi -->
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
</main>