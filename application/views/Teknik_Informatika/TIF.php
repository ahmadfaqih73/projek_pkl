<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- //tampilan data user -->
    <a href="<?php echo base_url('TIF/viewAdd') ?>" class="btn btn-primary">Add file</a>
    <br><br>
    <?php
    echo $this->session->flashdata('message');
    ?>
    <table class="table table-bordered text-center table-hover table-striped" id="tableTIF">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nim</th>
                <th>Nama Mahasiswa</th>
                <th>Nama file</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            foreach ($mhs_tif as $value) {
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value['nim'] ?></td>
                    <td><?php echo $value['nama_mahasiswa'] ?></td>
                    <td><?php echo $value['nama_file'] ?></td>
                    <td>
                        <a href="<?= base_url(); ?>TIF/lihat_TIF/<?= $value['Id_mhs_tif']; ?> " class=" fas fa-eye badge badge-primary float-right">detail</a>
                        <!-- <a href="<?= base_url(); ?>menu/editmenu/<?= $m['id']; ?> " class="fas fa-edit badge badge-pill badge-success">edit</a> -->
                        <a href="<?= base_url('TIF/hapus_mahasiswa_tif/' . $value['Id_mhs_tif']) ?> " class="fas fa-trash badge badge-pill badge-danger">delete</a>
                    </td>

                    <!-- <td><a href="<?php echo base_url('pelanggan/hapus/' . $value['id_pelanggan']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data pelanggan <?php echo $value['nama_pelanggan'] ?> ?')">Remove</a></td> -->
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>







</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableTIF').DataTable();
    });
</script>