<!-- Munculkan peta -->
<div class="content-wrapper">
    <!--/. container-fluid -->


    <div class="container">

        <div class="row">
            <div class="col-lg-6">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-6">

                <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                    Tambah Data Fasilitas Pendidikan
                </button>

                <br><br>
                <h3>Daftar Fasilitas Pendidikan</h3>

                <ul class="list-group">
                    <?php foreach ($bangunan as $bg) : ?>
                        <li class="list-group-item">

                            <?= $bg['bangunan_nama']; ?>
                            <a href="<?= base_url(); ?>bangunan/hapus/<?= $bg['bangunan_id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin?');">hapus</a>

                            <a href="<?= base_url(); ?>bangunan/ubah/<?= $bg['bangunan_id']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $bg['bangunan_id']; ?>">ubah</a>

                            <a href="<?= base_url(); //arahkan ke controller mahasiswa 
                                        ?>bangunan/detail/<?= $bg['bangunan_id']; ?>" class="badge badge-primary float-right ml-1">detail</a>

                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Fasilitas Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- penting untuk form -->
                <form action="<?= base_url(); ?>/mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama Bangunan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                    </div>

                    <div class="form-group">
                        <label for="lat">Latitud</label>
                        <input type="text" class="form-control" id="lat" name="lat" placeholder="Masukkan Koordinat Latitude">
                    </div>

                    <div class="form-group">
                        <label for="long">Longitude</label>
                        <input type="text" class="form-control" id="long" name="long" placeholder="Masukkan Koordinat Longitude">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>