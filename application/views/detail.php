<div class="container mt-4">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $bangunan['bangunan_nama']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $bangunan['bangunan_lat']; ?></h6>
            <p class="card-text"><?= $bangunan['bangunan_long']; ?></p>
            <p class="card-text"><?= $bangunan['bangunan_lat']; ?></p>
            <a href="<?= base_url(); ?>/bangunan" class="card-link">kembali</a>
        </div>
    </div>

</div>