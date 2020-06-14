<!-- Munculkan peta -->
<div class="content-wrapper">
    <!--/. container-fluid -->

    <section class="content-header">

        <div class="container">


            <div class="row">
                <div class="col-md-8">
                    <?php if ($this->session->flashdata('category_success')) : ?>
                        <div class="alert alert-success" role="alert"> <?= $this->session->flashdata('category_success') ?> </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('category_error')) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $this->session->flashdata('category_error') ?> </div>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('username') <> "") : ?>
                        <a class="btn btn-primary" href="<?= base_url('bangunan/tambah') ?>" role="button">
                            Tambah Data Fasilitas Pendidikan
                        </a>
                    <?php endif; ?>
                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DAFTAR SEKOLAH</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 10px">#</th>
                                        <th>Nama Sekolah</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = $loop + 1; ?>
                                    <?php foreach ($bangunan as $bg) : ?>

                                        <tr>
                                            <td><?= $i ?>.</td>
                                            <td><?= $bg['bangunan_nama']; ?></td>
                                            <td>
                                                <a> <?= $bg['kategori_nama']; ?></a>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($this->session->userdata('username') <> "") : ?>

                                                    <a href="<?= base_url(); ?>bangunan/hapus/<?= $bg['bangunan_id']; ?>" class="badge badge-danger float-center ml-1 mb-1" onclick="return confirm('Yakin?');">hapus</a>

                                                    <a href="<?= base_url(); ?>bangunan/ubah/<?= $bg['bangunan_id']; ?>" class="badge badge-success float-center ml-1 mb-1">ubah</a>
                                                <?php endif; ?>

                                                <a href="<?= base_url(); //arahkan ke controller mahasiswa 
                                                            ?>bangunan/detail/<?= $bg['bangunan_id']; ?>" class="badge badge-primary float-center mb-1 ml-1">detail</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <?= $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

    </section>
</div>