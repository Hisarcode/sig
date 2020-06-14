<div class="content-wrapper">
    <section class="content-header">
        <div class="container">
            <div class="card mb-3">
                <div class="card-header">
                    <a href="<?php echo site_url('bangunan/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <!-- penting untuk form -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="<?= $bangunan['bangunan_id'] ?>">
                        <div class="form-group">
                            <label for="nama">Nama Fasilitas Pendidikan</label>
                            <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $bangunan['bangunan_nama']; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('nama') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="text" class="form-control <?php echo form_error('lat') ? 'is-invalid' : '' ?>" id="lat" name="lat" placeholder="Masukkan Koordinat Latitude" value="<?= $bangunan['bangunan_lat']; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('lat') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="long">Longitude</label>
                            <input type="text" class="form-control <?php echo form_error('long') ? 'is-invalid' : '' ?>" id="long" name="long" placeholder="Masukkan Koordinat Longitude" value="<?= $bangunan['bangunan_long']; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('long') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="npsn">NPSN</label>
                            <input type="text" class="form-control  <?php echo form_error('npsn') ? 'is-invalid' : '' ?>" id="npsn" name="npsn" placeholder="Masukkan NPSN Sekolah" value="<?= $bangunan['npsn']; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('npsn') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kategori_id">Kategori Fasilitas Pendidikan</label>
                            <select name="kategori_id" id="kategori_id" class="form-control <?php echo form_error('kategori_id') ? 'is-invalid' : '' ?>">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat['kategori_id']; ?>" <?php if ($kat['kategori_id'] == $bangunan['kategori_id']) echo "selected"; ?>><?= $kat['kategori_nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error('kategori_id') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="long">Alamat</label>
                            <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="Masukkan Alamat Sekolah" value="<?= $bangunan['bangunan_alamat'] ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('alamat') ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="kecamatan_id">Kecamatan Fasilitas Pendidikan</label>
                            <select name="kecamatan_id" id="kecamatan_id" class="form-control <?php echo form_error('kecamatan_id') ? 'is-invalid' : '' ?>">
                                <option value="">Pilih Kecamatan</option>
                                <?php foreach ($kecamatan as $kec) : ?>
                                    <option value="<?= $kec['id']; ?>" <?php if ($kec['id'] == $bangunan['kecamatan_id']) echo "selected"; ?>><?= $kec['nama_kecamatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error('kecamatan_id') ?>
                            </div>
                        </div>

                        <div class="form-group" id="gambarBangunan">
                            <label for="name">Gambar Bangunan</label>
                            <input class="form-control-file" type="file" name="gambar" id="gambar" />
                            <div class="invalid-feedback">
                                <?php echo form_error('gambar') ?>
                            </div>
                            <input type="hidden" id="old_image" name="old_image" value="<?php if (empty($bangunan["bangunan_gambar"])) {
                                                                                            echo "default.jpg";
                                                                                        } else {
                                                                                            echo $bangunan["bangunan_gambar"];
                                                                                        } ?>" />
                        </div>

                        <div class="form-group">
                            <label for="status">Status Fasilitas Pendidikan</label>
                            <select name="status" id="status" class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>">
                                <option value="">Pilih Status</option>
                                <option value="0" <?php if ($bangunan['status'] == 0) echo "selected" ?>>Negeri</option>
                                <option value="1" <?php if ($bangunan['status'] == 1) echo "selected" ?>>Swasta</option>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error('status') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_guru">Jumlah Guru</label>
                            <input type="text" class="form-control <?php echo form_error('jumlah_guru') ? 'is-invalid' : '' ?>" id="jumlah_guru" name="jumlah_guru" placeholder="Jumlah Guru" value="<?= $bangunan['jumlah_guru'] ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('jumlah_guru') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_siswa">Jumlah Siswa</label>
                            <input type="text" class="form-control <?php echo form_error('jumlah_siswa') ? 'is-invalid' : '' ?>" id="jumlah_siswa" name="jumlah_siswa" placeholder="Jumlah Siswa" value="<?= $bangunan['jumlah_siswa'] ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('jumlah_siswa') ?>
                            </div>
                        </div>



                        <a class="btn btn-secondary" href="<?= base_url('bangunan') ?>">Close</a>
                        <button type=" submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
                <div class="card-footer small text-muted">
                    * required fields
                </div>
            </div>
        </div>
    </section>
</div>