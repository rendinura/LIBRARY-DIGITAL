        <section class="hero-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="text-white">E-Perpus📚</h1>

                            <p class="text-white">Temukan berbagai macam Judul Buku yang anda sukai</p>

                            <!-- <a href="<?= base_url('assets/podtalk/') ?>#section_2" class="btn custom-btn smoothscroll mt-3">Start Your Journey</a> -->
                        </div>

                        <div class="owl-carousel owl-theme">
                            <?php foreach ($buku as $bu) { ?>
                                <div class="owl-carousel-info-wrap item">
                                    <div class="card h-100">
                                        <img src="<?= base_url('assets/upload/buku/' . $bu['foto']) ?>" class="owl-carousel-image img-fluid" alt="">
                                    </div>

                                    <div class="owl-carousel-info">
                                        <h4 class="mb-2">
                                            <a href="<?= base_url('Beranda/detail/' . $bu['id_buku']) ?>">
                                                <?= $bu['judul'] ?>
                                                <img src="<?= base_url('assets/podtalk/') ?>images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                                            </a>
                                        </h4>

                                        <span><?= $bu['kategori'] ?></span>

                                    </div>

                                    <!-- <div class="social-share">
                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="<?= base_url('assets/podtalk/') ?>" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="<?= base_url('assets/podtalk/') ?>" class="social-icon-link bi-facebook"></a>
                                            </li>
                                        </ul>
                                    </div> -->

                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="latest-podcast-section section-padding pb-0" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Daftar Buku</h4>
                            <div id="ngilang">
                                <?= $this->session->flashdata('alert', true); ?>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($buku as $bu) { ?>
                        <div class="col-lg-6 col-12 mb-4">
                            <div class="custom-block d-flex h-100">

                                <div class="mx-auto d-block">
                                    <div>
                                        <img class="img-fluid rounded" src="<?= base_url('assets/upload/buku/' . $bu['foto']) ?>">
                                    </div>


                                    <!-- <p class="d-flex border-bottom pb-3 mb-4">
                                    </p> -->
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
                                        <p style="color: red; margin-top: 5px;">MAAF SEDANG TIDAK TERSEDIA</p>
                                    <?php } ?>
                                    </p>

                                    </div>
                                </div>

                                <div class="d-flex flex-column ms-auto">

                                    <?php if ($this->session->userdata('id_user') != NULL) { ?>
                                        <a href="<?= base_url('Beranda/koleksi/' . $bu['id_buku']) ?>" class="badge ms-auto">
                                            <i class="bi-bookmark"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Single -->
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
                                                <input type="date" name="tanggal_peminjaman" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+14 Days')) ?>" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                                <input type="date" name="tanggal_pengembalian" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+14 Days')) ?>" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button onclick="return confirm('Anda menyetujui peraturan ini')" type="submit" class="btn btn-outline-primary">Pinjam</button>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#backDropModalBanyak<?= $bu['id_buku'] ?>">
                                            Pinjam Beberapa
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end modal -->

                        <!-- Modal Many -->
                        <div class="modal fade" id="backDropModalBanyak<?= $bu['id_buku'] ?>" data-bs-backdrop="static" tabindex="1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <form class="modal-content custom-block" action="<?= base_url('Beranda/pinjambanyak') ?>" method="post">
                                    <div class="modal-header">
                                        <h5 class="card-title col d-flex justify-content-center">Form Peminjaman Buku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-mb-3">
                                                <label for="buku" class="form-label">Pilih Buku</label>
                                                <div class="form-control" style="max-height: 150px; overflow-y: auto;">
                                                    <?php foreach ($buku as $buk) { ?>
                                                        <div class="form-check">
                                                            <?php if ($buk['stok'] == 0) { ?>
                                                                <label class="text-decoration-line-through" for="buku<?= $buk['id_buku'] ?>"><?= $buk['judul'] ?> || Stok : <?= $buk['stok'] ?></label>
                                                            <?php } else { ?>
                                                                <input class="form-check-input" type="checkbox" name="id_buku[]" value="<?= $buk['id_buku'] ?>" id="buku<?= $buk['id_buku'] ?>">
                                                                <label class="form-check-label" for="buku<?= $buk['id_buku'] ?>"><?= $buk['judul'] ?> || Stok : <?= $buk['stok'] ?></label>
                                                                <input type="number" name="jumlah[]" min="1" max="<?php echo $buk['stok']; ?>"><br>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-3 mt-3">
                                                <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                                                <input type="date" name="tanggal_peminjaman" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+14 Days')) ?>" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-1">
                                                <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                                <input type="date" name="tanggal_pengembalian" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+14 Days')) ?>" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-outline-primary">Pinjam</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end modal -->
                    <?php } ?>
                    <!-- Modal Login -->
                    <div class="modal fade" id="backDropModalLogin" data-bs-backdrop="static" tabindex="1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <form class="modal-content custom-block" action="<?= base_url('Auth/login') ?>" class="mb-3" method="post">
                                <div class="modal-header">
                                    <h5 class="card-title col d-flex justify-content-center">Login <?= $namaform ?></h5>
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