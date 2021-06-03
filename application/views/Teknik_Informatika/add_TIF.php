<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah file</h1>

    <?php echo form_open_multipart('TIF/add') ?>

    <div class="form-group">
        <label>Nim</label>
        <input type="text" class="form-control" name="Nim" required="">
    </div>

    <div class="form-group">
        <label>Nama_mhs</label>
        <input type="text" class="form-control" name="Nama_mhs" required="">
    </div>
    <!-- <div class="form-group"> -->
    <!-- <div>
        <label for="varchar">Nama file</label>
        <input type="file" name="filename" required="">
    </div> -->

    <div>

        <label for="varchar">foto</label>
        <input type="file" name="foto_mhs" required="">

    </div>
    <!-- </div> -->
    <button type="button" class="btn btn-warning float-left" onclick="window.history.back(-1)">Kembali</button>
    <button type="submit" class="btn btn-success float-right">Tambah data</button>

    <?php echo form_close() ?>

</div>