<div class="container mt-1">
    <a href="<?= base_url(); ?>bangunan" class="btn btn-primary my-1">Daftar Bangunan </a>
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"><?= $bangunan['bangunan_nama']; ?></h3>
                    <div class="col-12">
                        <?php if ($bangunan['bangunan_gambar'] == "") $bangunan['bangunan_gambar'] = "default.jpg"; ?>
                        <img src="<?= base_url('upload/bangunan/') . $bangunan['bangunan_gambar']; ?>" class="product-image" alt="Gambar Bangunan Sekolah">
                    </div>
                    <!-- <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>    
                    </div> -->
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-1"><?= $bangunan['bangunan_nama']; ?></h3>
                    <p><?= $bangunan['bangunan_alamat']; ?></p>

                    <h4>NPSN</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-default text-center active">
                            <h5 class="font-weight-bold"><?php if (empty($bangunan['npsn'])) {
                                                                echo "-";
                                                            } else {
                                                                echo $bangunan['npsn'];
                                                            } ?></h5>
                        </label>
                    </div>

                    <h4>Kategori Sekolah</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-default text-center active">
                            <h5 class="font-weight-bold"><?= $bangunan['kategori_nama']; ?></h5>
                        </label>
                    </div>

                    <h4 class="mt-1">Kecamatan</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-default text-center active">
                            <h5 class="font-weight-bold"><?= $bangunan['nama_kecamatan']; ?></h5>
                        </label>
                    </div>

                    <h4 class="mt-1">Status</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-default text-center active">
                            <h5 class="font-weight-bold"><?php if ($bangunan['status'] == "0") {
                                                                echo "Negeri";
                                                            } else {
                                                                echo "Swasta";
                                                            } ?>
                            </h5>
                        </label>
                    </div>

                    <div class="row">
                        <div class="bg-gray py-1 mr-3 px-3 mt-1">
                            <h2 class="mb-0">
                                <?php if ($bangunan['jumlah_guru'] == "0") {
                                    echo "-";
                                } else {
                                    echo $bangunan['jumlah_guru'];
                                } ?>
                            </h2>
                            <h4 class="mt-0">
                                <small>Jumlah Guru</small>
                            </h4>
                        </div>

                        <div class="bg-gray py-1 px-3 mt-1">
                            <h2 class="mb-0">
                                <?php if ($bangunan['jumlah_siswa'] == "0") {
                                    echo "-";
                                } else {
                                    echo $bangunan['jumlah_siswa'];
                                } ?>
                            </h2>
                            <h4 class="mt-0">
                                <small>Jumlah Siswa</small>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>