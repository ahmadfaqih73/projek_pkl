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


                    <!-- Modal -->
                    <div class="modal fade" id="updateTIF<?= $value['Id_mhs_tif'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="col-md-6" method="post" action="<?php echo base_url('TIF/update_mhs_tif') ?>">

                                        <!-- Id Pelanggan -->
                                        <input type="hidden" name="id" value="<?php echo $value['Id_mhs_tif'] ?>">

                                        <div class="form-group">
                                            <label>Nim</label>
                                            <input type="text" class="form-control" name="nim" required="" value="<?php echo $value['nim'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama mahasiswa</label>
                                            <input type="text" class="form-control" name="nama_mahasiswa" required="" value="<?php echo $value['nama_mahasiswa'] ?>">
                                        </div>
                                        <div?>
                                            <label for="varchar">Nama file</label>
                                            <input type="file" name="filename" required="" value="<?php echo $value['nama_file'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success float-right">Update data</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
</div>


<td>
    <a href="<?= base_url(); ?>TIF/lihat_TIF/<?= $value['Id_mhs_tif']; ?> " class=" fas fa-eye badge badge-primary float-right">detail</a>
    <a href="" class="fas fa-edit badge badge-pill badge-success" data-toggle="modal" data-target="#updateTIF<?= $value['Id_mhs_tif'] ?>">edit</a>
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