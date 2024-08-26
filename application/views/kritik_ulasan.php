<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0"> Ulasan : <?= $user->username ?></h2>
            </div>
        </div>
    </div>
</header>


<section class="about-section section-padding">
    <div class="container">

        <div class="col-10 mx-auto">
            <div class="row">
                <!-- Basic Modal -->
                <h5 class="card-title col d-flex justify-content-center">Berikan Rating dan Ulasan</h5>
                <form action="<?= base_url('Buku/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <!-- General Form Elements -->

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" placeholder="Judul" autofocus />
                            </div>
                            
                            <div class="mb-3">
                                <label for="judul" class="form-label">Ulasan</label>
                                <textarea class="form-control" name="ulasan" id="ulasan"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                            </div>


                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Basic Modal-->
</section>
</main>