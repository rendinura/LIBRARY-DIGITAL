<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0"> <?= $kategori_detail['nama_kategori'] ?></h2>
            </div>
        </div>
    </div>
</header>

<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 mx-auto">
                <div class="pb-5 mb-5">
                    <div class="section-title-wrap mb-4">
                        <h4 class="section-title">Buku dengan kategori: <?= $kategori_detail['nama_kategori'] ?></h4>
                    </div>
                    <div class="row">
                        <?php foreach ($buku as $bu) { ?>
                            <div class="col-lg-6 col-12 mb-4">
                                <div class="custom-block d-flex h-100">

                                    <div class="row">
                                        <div>
                                            <img class="img-fluid" style="border-radius: 8%;" src="<?= base_url('assets/upload/buku/' . $bu['foto']) ?>" alt="">
                                        </div>

                                        <div class="mt-2">
                                            <?php if ($bu['stok'] > 0) { ?>
                                                <button type="button" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                                    Pinjam
                                                </button>
                                                <a href="<?= base_url('Beranda/detail/' . $bu['id_buku']) ?>" class="btn custom-btn">
                                                    About
                                                </a>
                                            <?php } else { ?> <?php } ?>
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

                                    <div class="d-flex flex-column ms-auto">

                                        <a href="<?= base_url('Beranda/koleksi/' . $bu['id_buku']) ?>" class="badge ms-auto">
                                            <i class="bi-bookmark"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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
                            <div class="col-lg-4 col-12 mb-1">
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

                                        <a href="<?= base_url('Beranda/koleksi/' . $bu['id_buku']) ?>" class="badge ms-auto">
                                            <i class="bi-bookmark"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </section>

        </div>
    </div>
</section>
</main>
<!-- Modal -->
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form class="modal-content custom-block" action="<?= base_url('Beranda/pinjam/' . $bu['id_buku']) ?>" method="post">
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
                <a href="<?= base_url('Beranda/addcart/' . $bu['id_buku']) ?>" class="btn btn-outline-warning">Tambah Keranjang</a>
            </div>
        </form>
    </div>
</div>
<!-- end modal -->