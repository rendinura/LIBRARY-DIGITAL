<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">E-Perpus📚</h5>
                        <p class="mb-4">
                            Selamat datang di aplikasi E-Perpus, lakukan pinjaman melalui aplikasi dan datang ke Perpustakaan untuk mengambil buku
                        </p>

                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="<?= base_url('assets/sneat/') ?>/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3" style="position: relative;">
                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                                <a href="<?= base_url('Buku') ?>">
                                    <h5 class="text-primary text-nowrap mb-2">Buku <i class="bx bxs-book-bookmark"></i></h5>
                                </a>
                            </div>
                            <div class="">
                                <h3 class="mb-0"><?= $buku ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3" style="position: relative;">
                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                                <a href="<?= base_url('User') ?>">
                                    <h5 class="text-primary text-nowrap mb-2">User <i class="bx bx-user"></i></h5>
                                </a>
                            </div>
                            <div class="">
                                <h3 class="mb-0"><?= $user ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3" style="position: relative;">
                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                                <a href="<?= base_url('Category') ?>">
                                    <h5 class="text-primary text-nowrap mb-2">Kategori <i class="bx bx-category"></i></h5>
                                </a>
                            </div>
                            <div class="">
                                <h3 class="mb-0"><?= $kategori_buku ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3" style="position: relative;">
                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                                <a href="<?= base_url('Laporan') ?>">
                                    <h5 class="text-primary text-nowrap mb-2">Peminjaman <i class="bx bxs-report"></i></h5>
                                </a>
                            </div>
                            <div class="">
                                <h3 class="mb-0"><?= $peminjaman ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>