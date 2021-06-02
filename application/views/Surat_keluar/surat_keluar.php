<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1><!-- apakah -->
    <!-- //tampilan data user -->



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
            foreach ($surat_keluar as $value) {
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value['jenis_surat'] ?></td>
                    <td><?php echo $value['file_surat'] ?></td>
                    <td><?php echo $value['deskripsi_surat'] ?></td>
                    <td><?php echo $value['tanggal_surat_keluar'] ?></td>

                    <!-- Modal -->
                    <!-- <div class="modal fade" id="updateTIF<?= $value['Id_mhs_tif'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <!--                                     <?php echo form_open_multipart('TIF/update_mhs_tif') ?> -->

                    <form class="col-md-6" enctype="multipart/form-data" method="post" action="<?php echo base_url('TIF/update_mhs_tif') ?>">

                        <!-- Id Pelanggan
                        <input type="hidden" name="id" value="<?php echo $value['Id_mhs_tif'] ?>"> -->

                        <div class="form-group">
                            <label>Jenis Surat</label>
                            <input type="text" class="form-control" name="jenis surat" required="" value="<?php echo $value['jenis_surat'] ?>">
                        </div>
                        <div>
                            <label for="varchar">Nama file</label>
                            <input class="float-right" type="file" name="filename" value="<?php echo $value['file_surat'] ?>">
                            <a class="float-left" target="_blank" href="<?php echo base_url('uploads/' . $value['file_surat']) ?>"><?php echo $value['file_surat'] ?></a>
                            <input type="hidden" name="oldFiles" value="<?php echo $value['file_surat'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" required="" value="<?php echo $value['deskripsi'] ?>">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success float-right">Update data</button>
                        </div>
                    </form>
                    <!-- <?php echo form_close(); ?> -->
</div>
</div>
</div>
</div> -->


<!-- <td>
                        <a href="<?= base_url(); ?>TIF/lihat_TIF/<?= $value['Id_mhs_tif']; ?> " class=" fas fa-eye badge badge-primary"> detail</a>

                        <a href="" class="fas fa-edit badge badge-pill badge-success" data-toggle="modal" data-target="#updateTIF<?= $value['Id_mhs_tif'] ?>"> edit</a>

                        <a href="<?= base_url('TIF/hapus_mahasiswa_tif/' . $value['Id_mhs_tif']) ?> " class="fas fa-trash badge badge-pill badge-danger"> delete</a>
                    </td> -->

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