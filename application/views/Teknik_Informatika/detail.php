<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail data mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-text"><?= $mhs_tif['nim']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $mhs_tif['nama_mahasiswa']; ?></h6>
                    <p class="card-text"><?= $mhs_tif['nama_file']; ?></p>
                    <a href="<?= base_url('TIF/'); ?>" class="btn btn-primary">kembali</a>
                </div>
            </div>


        </div>
    </div>

</div>