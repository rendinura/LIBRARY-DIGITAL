<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0"> Detail Peminjaman : <?= $user->username ?></h2>
            </div>
        </div>
    </div>
</header>


<section class="about-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-12 mx-auto">
                <a href="<?= base_url('Beranda/pinjaman') ?>" class="btn btn-sm btn-outline-secondary">
                    Peminjaman
                </a>

                <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                    <div class="table-responsive text-nowrap">
                        <table class="table" id="datatable" style="margin-left: auto; margin-right: auto; margin-top: 2%; width: 100%; text-align: center;">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Buku</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $n = 1;
                                foreach ($peminjaman as $pe) { ?>
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $pe['judul'] ?></td>
                                        <td><?= $pe['jumlah'] ?></td>
                                        <td><?= $pe['tanggal_pengembalian'] ?></td>
                                        <!-- <td>
                                            <?php if ($pe['status'] == 'Dikembalikan') { ?>
                                                <?= $pe['status'] ?>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#backDropModal<?= $pe['id_detail_peminjaman'] ?>">
                                                    <i class="bi-send"></i>
                                                </button>
                                            <?php } ?>

                                            <div class="modal fade" id="backDropModal<?= $pe['id_detail_peminjaman'] ?>" data-bs-backdrop="static" tabindex="1" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <form class="modal-content custom-block" action="<?= base_url('Beranda/pengembalian/' . $pe['id_peminjaman']) ?>" method="post">
                                                        <div class="modal-header">
                                                            <h5 class="card-title col d-flex justify-content-center">Form Pengembalian Buku</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="tanggal_pengembalian" class="form-control" required>

                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <label for="id_detail_peminjaman" class="form-label">Kembalikan</label></label>
                                                                    <input type="text" name="id_detail_peminjaman" value="<?= $pe['id_detail_peminjaman'] ?>" class="form-control" readonly>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-outline-primary">Kembalikan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        
                                        </td> -->
                                        <td>
                                            <?php if ($pe['status'] != 'Dikembalikan') { ?>
                                                <button class="btn btn-sm btn-outline-success"><?= $pe['status'] ?> </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#backDropModal<?= $pe['id_buku'] ?>">
                                                    <i class="bi-star"></i>
                                                </button>
                                            <?php } ?>

                                            <div class="modal fade" id="backDropModal<?= $pe['id_buku'] ?>" data-bs-backdrop="static" tabindex="1" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <form class="modal-content custom-block" action="<?= base_url('Beranda/kritik_ulasan/' . $pe['id_buku']) ?>" method="post">
                                                        <div class="modal-header">
                                                            <h5 class="card-title col d-flex justify-content-center">Beri Ulasan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_buku" value="<?= $pe['id_buku'] ?>" class="form-control" required>

                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <div class="rating">
                                                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">&#9733;</label>
                                                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">&#9733;</label>
                                                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">&#9733;</label>
                                                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">&#9733;</label>
                                                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">&#9733;</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <label class="form-label">Ulasan</label>
                                                                    <textarea class="form-control" name="ulasan" id="ulasan"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <style>
                                                            .rating {
                                                                direction: rtl;
                                                                unicode-bidi: bidi-override;
                                                                display: inline-flex;
                                                            }

                                                            .rating input {
                                                                display: none;
                                                            }

                                                            .rating label {
                                                                font-size: 2em;
                                                                color: #ddd;
                                                                cursor: pointer;
                                                                padding: 0 5px;
                                                            }

                                                            .rating input:checked~label {
                                                                color: #f5b301;
                                                            }

                                                            .rating label:hover,
                                                            .rating label:hover~label {
                                                                color: #f5b301;
                                                            }
                                                        </style>
                                                        <script>
                                                            // Example if you want to handle something when a rating is clicked
                                                            document.querySelectorAll('.rating input').forEach((input) => {
                                                                input.addEventListener('change', function() {
                                                                    console.log(`Rating selected: ${this.value}`);
                                                                });
                                                            });
                                                        </script>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="submit" class="btn btn-outline-primary">Kirim Ulasan</button>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
</main>