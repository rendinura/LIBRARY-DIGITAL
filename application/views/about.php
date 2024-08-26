        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0"> <?= $buku->judul ?></h2>
                    </div>
                </div>
            </div>
        </header>

        <link rel="stylesheet" href="<?= base_url('assets/sneat/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="<?= base_url('assets/sneat/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 mx-auto">
                        <div class="mb-5">
                            <div class="section-title-wrap mb-4">
                                <h4 class="section-title"> <?= $buku->judul ?></h4>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <img src="<?= base_url('assets/upload/buku/' . $buku->foto) ?>" class="about-image mt-5 img-fluid" alt="">
                                </div>
                                <!-- Detail Buku -->
                                <div class="col-md-7">
                                    <?php if ($buku->stok > 0) { ?>
                                        <form action="<?= base_url('Beranda/addcart/' . $buku->id_buku) ?>" method="post">

                                            <h2 class="my-4 text-success"><?= $buku->penulis ?></h2>
                                            <div class="description">
                                                <p><strong>Penerbit : </strong><?= $buku->penerbit ?></p>

                                                <p><strong>Tahun Terbit : </strong><?= $buku->tahun_terbit ?></p>
                                            </div>
                                            <div class="stock mt-3">
                                                <p><strong>Kategori : </strong><?= $buku->kategori ?></p>
                                            </div>
                                            <div class="stock mt-3">
                                                <p><strong>Stok : </strong><?= $buku->stok ?></p>
                                            </div>
                                            <?php if ($rating->rata_rating > 0) { ?>
                                                <div class="stock mt-3">
                                                    <strong><i class="bi-star-fill"> <?= round($rating->rata_rating, 1) ?> / 5</i></strong>
                                                </div>
                                            <?php } else { ?>
                                                <div class="stock mt-3">
                                                    <strong><i class="bi-star-fill"> 0 / 5</i></strong>
                                                </div>
                                            <?php } ?>
                                            <div class="buttons mt-4">
                                                <?php if ($this->session->userdata('id_user') == NULL) { ?>
                                                    <button type="button" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#backDropModalLogin">
                                                        Pinjam
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                                        Pinjam
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </form>
                                    <?php } else { ?>
                                        <form action="<?= base_url('Beranda/addcart/' . $buku->id_buku) ?>" method="post">

                                            <h2 class="my-4 text-success"><?= $buku->penulis ?></h2>
                                            <div class="description">
                                                <p><strong>Penerbit : </strong><?= $buku->penerbit ?></p>

                                                <p><strong>Tahun Terbit : </strong><?= $buku->tahun_terbit ?></p>
                                            </div>
                                            <div class="stock mt-3">
                                                <p><strong>Kategori : </strong><?= $buku->kategori ?></p>
                                            </div>
                                            <div class="stock mt-3">
                                                <p><strong>Stok : </strong><?= $buku->stok ?></p>
                                            </div>
                                            <div class="stock mt-3">
                                                <strong><i class="bi-star-fill"> <?= round($rating->rata_rating, 1) ?> / 5</i></strong>
                                            </div>
                                            <div class="buttons mt-4">
                                                <h4 style="color: red; margin-top: 5px;">MAAF STOK HABIS</h4>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                                <!-- End Detail -->
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card overflow-hidden mb-4" style="height: 500px">
                            <?php if ($countulasan > 0) { ?>
                                <h5 class="card-header"><?= $countulasan ?> Ulasan </h5>
                            <?php } else { ?>
                                <h5 class="card-header">Belum ada ulasan </h5>
                            <?php } ?>
                            <div class="card-body ps ps--active-y" id="vertical-example">
                                <?php foreach ($ulasan as $ul) { ?>
                                    <div class="card mb-2">
                                        <div class="card-header">
                                            <strong><?= $ul['username'] ?></strong>
                                        </div>
                                        <div class="card-body">
                                            <p><?= $ul['ulasan'] ?></p>
                                            <p> <i class="bi-star-fill"> <strong><?= $ul['rating'] ?> / 5</strong></i></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="ps__rail-x" style="left: 0px; bottom: -148px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 148px; height: 232px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 23px; height: 37px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            </div>
            <section class="trending-podcast-section section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title">Lainnya...</h4>
                            </div>
                        </div>
                        <?php foreach ($bukulop as $blp) { ?>
                            <div class="col-lg-4 col-12 mb-4">
                                <div class="custom-block custom-block-full">
                                    <div class="custom-block-image-wrap">
                                        <a href="<?= base_url('Beranda/detail/' . $blp['id_buku']) ?>">
                                            <img src="<?= base_url('assets/upload/buku/' . $blp['foto']) ?>" class="custom-block-image img-fluid">
                                        </a>
                                    </div>

                                    <div class="custom-block-info">
                                        <h5 class="mb-2">
                                            <a href="<?= base_url('Beranda/detail/' . $blp['id_buku']) ?>">
                                                <?= $blp['judul'] ?>
                                            </a>
                                        </h5>

                                        <div class="profile-block d-flex">

                                        </div>
                                        <h4 class="mb-2">
                                            <p>
                                                <strong><?= $blp['penulis'] ?></strong> <img src="<?= base_url('assets/podtalk/') ?>images/verified.png" class="verified-image img-fluid" alt="">
                                            </p>
                                            <p><?= $blp['penerbit'] ?> | <?= $blp['tahun_terbit'] ?> </p>
                                        </h4>
                                        <span class="badge"><?= $blp['kategori'] ?></span>
                                    </div>

                                    <div class="social-share d-flex flex-column ms-auto">

                                        <?php if ($this->session->userdata('id_user') != NULL) { ?>

                                            <a href="<?= base_url('Beranda/koleksi/' . $blp['id_buku']) ?>" class="badge ms-auto">
                                                <i class="bi-bookmark"></i>
                                            </a>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Modal Login -->
                        <div class="modal fade" id="backDropModalLogin" data-bs-backdrop="static" tabindex="1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <form class="modal-content custom-block" action="<?= base_url('Auth/login') ?>" class="mb-3" method="post">
                                    <div class="modal-header">
                                        <h5 class="card-title col d-flex justify-content-center">Login E-Perpus📚</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email or Username</label>
                                            <input type="text" class="form-control" id="email" name="username" placeholder="Enter your email or username" autofocus autocomplete="off" />
                                        </div>
                                        <div class="mb-3 form-password-toggle">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="off" />
                                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                        </div>
                                </form>

                                <p class="text-center">
                                    <span>New on our platform?</span>
                                    <a href="<?= base_url('Auth/regist') ?>">
                                        <span>Create an account</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- end modal login -->

                    </div>
                </div>
            </section>

            </div>
        </section>
        </main>

        <!-- Modal -->
        <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <form class="modal-content custom-block" action="<?= base_url('Beranda/pinjam/' . $buku->id_buku) ?>" method="post">
                    <div class="modal-header">
                        <h5 class="card-title col d-flex justify-content-center">Form Peminjaman Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-outline-primary">Pinjam</button>
                        <a href="<?= base_url('Beranda/addcart/' . $buku->id_buku) ?>" class="btn btn-outline-warning">Tambah Keranjang</a>

                    </div>
                </form>
            </div>
        </div>
        <script src="<?= base_url('assets/sneat/') ?>assets/vendor/libs/jquery/jquery.js"></script>
        <script src="<?= base_url('assets/sneat/') ?>assets/vendor/libs/popper/popper.js"></script>
        <script src="<?= base_url('assets/sneat/') ?>assets/vendor/js/bootstrap.js"></script>
        <script src="<?= base_url('assets/sneat/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="<?= base_url('assets/sneat/') ?>assets/vendor/js/menu.js"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="<?= base_url('assets/sneat/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <!-- Main JS -->
        <script src="<?= base_url('assets/sneat/') ?>assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="<?= base_url('assets/sneat/') ?>assets/js/extended-ui-perfect-scrollbar.js"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- end modal -->