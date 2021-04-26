<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?= base_url('uploads/') . $mhs_tif['foto']; ?>" class="card-img">
        </div>
        <div class=" col-md-8">
            <div class="card-body">
                <div class="card-header">
                    Detail data mahasiswa
                </div>
                <label><b></b>NIM Mahasiswa</label>
                <h5 class="card-text"><?= $mhs_tif['nim']; ?></h5>
                <hr>
                <label>Nama Mahasiswa</label>
                <h6 class="card-subtitle mb-2 text-muted"><?= $mhs_tif['nama_mahasiswa']; ?></h6>
                <hr>
                <label>File</label>
                <!-- <p class="card-text"><?= $mhs_tif['nama_file']; ?></p> -->
                <p class="card-text">
                    <a class="float-left" target="_blank" href="<?php echo base_url('uploads/' . $mhs_tif['nama_file']) ?>"><?php echo $mhs_tif['nama_file'] ?></a>
                </p>


            </div>
            <a href="<?= base_url('TIF/'); ?>" class="btn btn-primary float-right">kembali</a>
        </div>
    </div>
</div>






<!-- <div class="container">
    <div class="row mt-6">
        <div class="col-md-6">

            <div class="card mb-3" style="max-width: 540px;">
                <div class="card-header">
                    Detail data mahasiswa
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('uploads/') . $mhs_tif['foto']; ?>" class="card-img">
                </div>
                <div class="card-body">
                    <label><b></b>NIM Mahasiswa</label>
                    <h5 class="card-text"><?= $mhs_tif['nim']; ?></h5>
                    <hr>
                    <label>Nama Mahasiswa</label>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $mhs_tif['nama_mahasiswa']; ?></h6>
                    <hr>
                    <label>File</label>
                    <p class="card-text"><?= $mhs_tif['nama_file']; ?></p>
                    <a href="<?= base_url('TIF/'); ?>" class="btn btn-primary">kembali</a>
                </div>
            </div>


        </div>
    </div>

</div>
</div> -->