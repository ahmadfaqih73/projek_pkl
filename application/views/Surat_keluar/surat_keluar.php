<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1><!-- apakah -->
    <!-- //tampilan data user -->
    <!-- <a href="<?php echo base_url('TIF/viewAdd') ?>" class="btn btn-primary">Add file</a> -->
    <br><br>
    <?php
    echo $this->session->flashdata('message');
    ?>
    <table class="table table-bordered text-center table-hover table-striped" id="tableTIF">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jenis_surat</th>
                <th>Nama Surat</th>
                <th>Diskripsi</th>
                <th>Tanggal</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            foreach ($Surat_keluar as $value) {
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value['jenis_surat'] ?></td>
                    <td><?php echo $value['file_surat'] ?></td>
                    <td><?php echo $value['deskripsi_surat'] ?></td>
                    <td><?php echo $value['tanggal_surat_keluar'] ?></td>






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