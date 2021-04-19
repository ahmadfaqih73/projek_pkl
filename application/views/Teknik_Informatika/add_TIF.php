<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah file</h1>

    <form class="col-md-6" method="post" action="<?php echo base_url('TIF/add') ?>">
        <div class="form-group">
            <label>Nim</label>
            <input type="text" class="form-control" name="Nim" required="">
        </div>

        <div class="form-group">
            <label>Nama_mhs</label>
            <input type="text" class="form-control" name="Nama_mhs" required="">
        </div>
        <div class="form-group">
            <label for="varchar">Nama file</label>
            <input type="file" class="form-control" name="filename">

        </div>
        <button type="button" class="btn btn-warning float-left" onclick="window.history.back(-1)">Kembali</button>
        <button type="submit" class="btn btn-success float-right">Tambah data</button>
    </form>

</div>